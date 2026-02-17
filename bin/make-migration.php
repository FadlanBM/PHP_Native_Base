<?php

// Define paths
define('APP_ROOT', __DIR__ . '/../app');

// Check if migration name is provided
if ($argc < 2) {
    echo "Usage: php bin/make-migration.php [MigrationName]\n";
    echo "Example: php bin/make-migration.php CreateUsersTable\n";
    exit(1);
}

$migrationName = $argv[1];
$timestamp = date('Y_m_d_His');
$fileName = "{$timestamp}_{$migrationName}.php";
$filePath = APP_ROOT . "/database/migrations/{$fileName}";

// Template for the migration file
$template = <<<PHP
<?php

use App\Core\Database;

class {$migrationName}
{
    public function up()
    {
        \$db = Database::getInstance()->getConnection();
        \$driver = \$db->getAttribute(\PDO::ATTR_DRIVER_NAME);

        // Define common types based on driver
        \$autoIncrement = \$driver === 'pgsql' ? 'SERIAL PRIMARY KEY' : 'INT AUTO_INCREMENT PRIMARY KEY';
        \$timestampDef = \$driver === 'pgsql' ? 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP' : 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP';
        \$updatedAtDef = \$driver === 'pgsql' ? 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP' : 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP';
        
        // Create your table here
        // \$db->exec("CREATE TABLE IF NOT EXISTS table_name (
        //     id \$autoIncrement,
        //     name VARCHAR(255) NOT NULL,
        //     created_at \$timestampDef,
        //     updated_at \$updatedAtDef
        // )");

        echo "Migration '{$migrationName}' applied successfully.\\n";
    }

    public function down()
    {
        \$db = Database::getInstance()->getConnection();
        
        // Drop your table here
        // \$db->exec("DROP TABLE IF EXISTS table_name");

        echo "Migration '{$migrationName}' reverted successfully.\\n";
    }
}
PHP;

// Write the file
if (file_put_contents($filePath, $template)) {
    echo "Migration created successfully:\n";
    echo "File: app/database/migrations/{$fileName}\n";
} else {
    echo "Error: Failed to create migration file.\n";
    exit(1);
}
