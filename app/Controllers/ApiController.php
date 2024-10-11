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
            'user_id' => $user['id'],  // Menyimpan ID pengguna
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

        // Ambil data dari permintaan JSON
        $input = $this->request->getJSON();

        // Pastikan data ada
        if (!$input) {
            return $this->respond([
                'status' => 400,
                'messages' => [
                    'error' => 'No input received'
                ]
            ], 400);
        }

        // Ambil email dan password dari input
        $email = $input->email ?? null;
        $password = $input->password ?? null;

        // Validasi email dan password
        if (!$email || !$password) {
            return $this->respond([
                'status' => 400,
                'messages' => [
                    'error' => 'Email and password are required'
                ]
            ], 400);
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan pengguna baru ke database
        $model->insert([
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        return $this->respond([
            'status' => 201,
            'messages' => [
                'success' => 'User registered successfully'
            ]
        ], 201);
    }
}
