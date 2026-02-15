<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class AuthController extends Controller {
    
    public function login() {
        return $this->view('auth/login', ['title' => 'Login']);
    }

    public function register() {
        return $this->view('auth/register', ['title' => 'Register']);
    }

    public function processLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
            
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }

        return $this->view('auth/login', [
            'title' => 'Login', 
            'error' => 'Email atau password salah'
        ]);
    }

    public function processRegister() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            return $this->view('auth/register', [
                'title' => 'Register',
                'error' => 'Semua kolom wajib diisi'
            ]);
        }

        $db = Database::getInstance()->getConnection();
        
        // Check if email exists
        $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            return $this->view('auth/register', [
                'title' => 'Register',
                'error' => 'Email sudah terdaftar'
            ]);
        }

        // Insert user
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        
        if ($stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword])) {
            header('Location: ' . BASE_URL . '/login?success=1');
            exit;
        }

        return $this->view('auth/register', [
            'title' => 'Register',
            'error' => 'Gagal mendaftar, coba lagi'
        ]);
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
