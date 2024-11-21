<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\EmployeeModel;

class EmployeeController extends ResourceController
{
    protected $modelName = 'App\Models\EmployeeModel';
    protected $format = 'json';

    protected $employeeModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->employeeModel = new EmployeeModel();
    }

    // Method to retrieve all employees
    public function index()
    {
        $employees = $this->model->findAll();
        return $this->respond($employees);
    }

    public function create()
    {
        // Mengambil data dari body permintaan
        $data = $this->request->getJSON(); // Ganti getPost dengan getJSON

        // Debug: Tampilkan data yang diterima
        log_message('info', 'Received data: ' . print_r($data, true));

        // Memeriksa apakah data tidak kosong
        if (!$data) {
            return $this->fail('No data to insert.'); // Pesan kesalahan
        }

        // Mengonversi objek menjadi array
        $dataArray = (array)$data;

        // Menggunakan model untuk memasukkan data
        if ($this->employeeModel->insert($dataArray)) {
            return $this->respondCreated('Employee created successfully');
        } else {
            return $this->fail('Failed to create employee.');
        }
    }

    public function bulkInsert()
    {
        $json = $this->request->getJSON();

        if (!$json) {
            return $this->fail('No data received', 400);
        }

        $data = [];
        foreach ($json as $employee) {
            // Validasi data di sini jika diperlukan
            $data[] = [
                'username' => $employee->username,
                'email' => $employee->email,
                'jobdesk' => $employee->jobdesk
            ];
        }

        $employeeModel = new EmployeeModel();

        if ($employeeModel->insertBatch($data)) {
            return $this->respondCreated('Employees added successfully.');
        } else {
            return $this->fail('Error adding employees', 500);
        }
    }


    public function show($id = null)
    {
        // Implementasi untuk mengambil data employee berdasarkan ID
        $employee = $this->model->find($id);

        if (!$employee) {
            return $this->failNotFound('Employee not found');
        }

        return $this->respond($employee);
    }



    // Method to update employees
    public function update($id = null)
    {
        $employeeModel = new \App\Models\EmployeeModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'jobdesk' => $this->request->getVar('jobdesk'),
        ];

        $employeeModel->update($id, $data);

        return $this->respond(['status' => 'success', 'message' => 'Employee updated successfully']);
    }




    // Method untuk menghapus karyawan
    public function delete($id = null)
    {
        if ($id === null) {
            return $this->fail('ID is required');
        }

        if (!$this->employeeModel->find($id)) {
            return $this->failNotFound('Employee not found');
        }

        $this->employeeModel->delete($id);
        return $this->respondDeleted(['message' => 'Employee deleted successfully']);
    }
}
