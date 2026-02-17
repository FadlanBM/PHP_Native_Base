<?php

use App\Core\Database;

class CreateBookingTables
{
    public function up()
    {
        $db = Database::getInstance()->getConnection();
        $driver = $db->getAttribute(\PDO::ATTR_DRIVER_NAME);

        // Define syntax based on driver
        $timestampDef = $driver === 'pgsql' ? 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP' : 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP';
        
        // Fix for ON UPDATE CURRENT_TIMESTAMP
        // MySQL supports ON UPDATE CURRENT_TIMESTAMP, Postgres requires a trigger.
        // For simplicity, we use DEFAULT CURRENT_TIMESTAMP for both on creation.
        // Updates will need to be handled by application logic or triggers if strict accuracy is needed.
        $updatedAtDef = $driver === 'pgsql' ? 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP' : 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';
        $deletedAtDef = $driver === 'pgsql' ? 'TIMESTAMP NULL' : 'TIMESTAMP NULL'; // deleted_at should be nullable
        
        // Enable UUID extension for Postgres
        if ($driver === 'pgsql') {
            $db->exec('CREATE EXTENSION IF NOT EXISTS "uuid-ossp"');
        }

        // Define UUID Types
        if ($driver === 'pgsql') {
            $uuidType = "UUID DEFAULT uuid_generate_v4()";
            $uuidDef = "UUID";
        } else {
            // MySQL: Use CHAR(36) with empty string default.
            // A trigger will be added to generate UUID() if the ID is empty.
            $uuidType = "CHAR(36) NOT NULL DEFAULT ''"; 
            $uuidDef = "CHAR(36)";
        }
        
        // --- 1. Roles ---
        $db->exec("CREATE TABLE IF NOT EXISTS roles(
            id $uuidType PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef
        )");
        
        // --- 2. Category Menu ---
        $db->exec("CREATE TABLE IF NOT EXISTS category_menu(
            id $uuidType PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef
        )");

        // --- 3. Users ---
        $db->exec("CREATE TABLE IF NOT EXISTS users(
            id $uuidType PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role_id $uuidDef NOT NULL,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef,
            FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
        )");

        // --- 4. Seats ---
        if ($driver === 'pgsql') {
            $statusSeats = "VARCHAR(20) CHECK (status IN ('available', 'reserved')) DEFAULT 'available'";
        } else {
            $statusSeats = "ENUM('available', 'reserved') DEFAULT 'available'";
        }

        $db->exec("CREATE TABLE IF NOT EXISTS seats(
            id $uuidType PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            user_id $uuidDef NOT NULL,
            nomor_table INTEGER NOT NULL,
            status $statusSeats,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");

        $db->exec("CREATE TABLE IF NOT EXISTS menu(
            id $uuidType PRIMARY KEY,
            user_id $uuidDef NOT NULL,
            category_id $uuidDef NOT NULL,
            name VARCHAR(50) NOT NULL,
            stock INTEGER NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            status BOOLEAN DEFAULT true,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES category_menu(id) ON DELETE CASCADE
        )");

        $db->exec("CREATE TABLE IF NOT EXISTS transactions(
            id $uuidType PRIMARY KEY,
            user_id $uuidDef NOT NULL,
            external_id VARCHAR(50) NOT NULL UNIQUE,
            gross_amount DECIMAL(15,2) NOT NULL,
            payment_type VARCHAR(30),
            transaction_status VARCHAR(30),
            midtrans_transaction_id $uuidDef, 
            snap_token VARCHAR(255),
            payment_code VARCHAR(50),
            pdf_url TEXT,
            settlement_time TIMESTAMP,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )");


        if ($driver === 'pgsql') {
            $statusOrder = "VARCHAR(20) CHECK (status IN ('pending', 'processing', 'completed', 'cancelled')) DEFAULT 'pending'";
        } else {
            $statusOrder = "ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending'";
        }

        $db->exec("CREATE TABLE IF NOT EXISTS orders(
            id $uuidType PRIMARY KEY,
            seats_id $uuidDef NOT NULL,
            transaction_id $uuidDef NOT NULL,
            status $statusOrder,
            price DECIMAL(10, 2) NOT NULL,
            note TEXT,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef,
            FOREIGN KEY (seats_id) REFERENCES seats(id) ON DELETE CASCADE,
            FOREIGN KEY (transaction_id) REFERENCES transactions(id) ON DELETE CASCADE
        )");

        $db->exec("CREATE TABLE IF NOT EXISTS order_items(
            id $uuidType PRIMARY KEY,
            menu_id $uuidDef NOT NULL,
            order_id $uuidDef NOT NULL,
            quantity INTEGER NOT NULL,
            note TEXT,
            created_at $timestampDef,
            updated_at $updatedAtDef,
            deleted_at $deletedAtDef,
            FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE,
            FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
        )");

        if ($driver !== 'pgsql') {
            $tables = ['roles', 'category_menu', 'users', 'seats', 'menu', 'orders', 'order_items', 'transactions'];
            foreach ($tables as $table) {
                // Drop trigger if exists (to be safe during re-runs if table exists)
                $db->exec("DROP TRIGGER IF EXISTS before_insert_{$table}");
                
                // Create Trigger
                // Use IFNULL check on NEW.id
                // Note: We use a single statement body for PDO compatibility without DELIMITER issues
                $db->exec("
                    CREATE TRIGGER before_insert_{$table}
                    BEFORE INSERT ON {$table}
                    FOR EACH ROW
                    SET NEW.id = IF(NEW.id = '', UUID(), NEW.id)
                ");
            }
            echo "MySQL Triggers for UUID generation created.\n";
        }

        echo "Tables 'roles', 'category_menu', 'users', 'seats', 'menu', 'orders', 'order_items', 'transactions' created successfully.\n";
    }

    public function down()
    {
        $db = Database::getInstance()->getConnection();
        $db->exec("DROP TABLE IF EXISTS transactions");
        $db->exec("DROP TABLE IF EXISTS order_items");
        $db->exec("DROP TABLE IF EXISTS orders");
        $db->exec("DROP TABLE IF EXISTS menu");
        $db->exec("DROP TABLE IF EXISTS seats");
        $db->exec("DROP TABLE IF EXISTS users");
        $db->exec("DROP TABLE IF EXISTS category_menu");
        $db->exec("DROP TABLE IF EXISTS roles");
        
        echo "Tables dropped.\n";
    }
}
