<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class ApiController extends ResourceController
{
    public function login()
    {
        $model = new UserModel();
        $session = session(); // Mengakses session

        // Ambil data dari request (email dan password)
        $input = $this->request->getJSON();

        // Validasi input
        if (!$input) {
            return $this->respond([
                'status' => ResponseInterface::HTTP_BAD_REQUEST,
                'error' => 'No input received'
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }

        $email = filter_var($input->email ?? null, FILTER_VALIDATE_EMAIL);
        $password = $input->password ?? null;

        // Validasi email dan password tidak kosong
        if (!$email || !$password) {
            return $this->respond([
                'status' => ResponseInterface::HTTP_BAD_REQUEST,
                'error' => 'Email and password are required'
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Cek apakah email ada di database
        $user = $model->where('email', $email)->first();

        if (!$user) {
            // Menjaga informasi agar tidak memberi tahu apakah email yang salah atau password
            return $this->respond([
                'status' => ResponseInterface::HTTP_UNAUTHORIZED,
                'error' => 'Invalid login credentials'
            ], ResponseInterface::HTTP_UNAUTHORIZED);
        }

        // Verifikasi password
        if (!password_verify($password, $user['password'])) {
            return $this->respond([
                'status' => ResponseInterface::HTTP_UNAUTHORIZED,
                'error' => 'Invalid login credentials'
            ], ResponseInterface::HTTP_UNAUTHORIZED);
        }

        // Jika login berhasil, simpan informasi pengguna ke dalam session
        $session->set([
            'username' => $user['username'],
            'user_id' => $user['id_admin'],  // Menyimpan ID pengguna
            'email' => $user['email'],  // Menyimpan email pengguna
            'logged_in' => true          // Menyimpan status login
        ]);

        // Mengirimkan respons sukses tanpa token
        return $this->respond([
            'status' => ResponseInterface::HTTP_OK,
            'message' => 'Login successful'
        ], ResponseInterface::HTTP_OK);
    }


    public function register()
    {
        $model = new UserModel();
        $input = $this->request->getJSON();

        // Check if input is received
        if (!$input) {
            return $this->respond([
                'status' => 400,
                'messages' => ['error' => 'No input received']
            ], 400);
        }

        // Log the received input
        log_message('info', 'Received input: ' . json_encode($input));

        // Extracting username, email, and password
        $username = $input->username ?? null;
        $email = $input->email ?? null;
        $password = $input->password ?? null;

        // Validate required fields
        if (!$username || !$email || !$password) {
            return $this->respond([
                'status' => 400,
                'messages' => ['error' => 'Username, email, and password are required']
            ], 400);
        }

        // Username validation
        if (!preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
            return $this->respond([
                'status' => 400,
                'messages' => ['error' => 'Username must be at least 3 characters long and contain only letters and numbers']
            ], 400);
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->respond([
                'status' => 400,
                'messages' => ['error' => 'Invalid email format']
            ], 400);
        }

        // Check if username already exists
        if ($model->where('username', $username)->first()) {
            return $this->respond([
                'status' => 409,
                'messages' => ['error' => 'Username is already taken']
            ], 409);
        }

        // Check if email already exists
        if ($model->where('email', $email)->first()) {
            return $this->respond([
                'status' => 409,
                'messages' => ['error' => 'Email is already registered']
            ], 409);
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare data to save
        $newUser = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
        ];

        try {
            // Save user to the database
            $model->insert($newUser);
            return $this->respond([
                'status' => 201,
                'messages' => ['success' => 'User registered successfully']
            ], 201);
        } catch (\Exception $e) {
            log_message('error', 'Error while registering user: ' . $e->getMessage());
            return $this->respond([
                'status' => 500,
                'messages' => ['error' => 'An error occurred while registering the user.']
            ], 500);
        }
    }
}
