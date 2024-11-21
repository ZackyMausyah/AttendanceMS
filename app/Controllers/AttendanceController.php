<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AttendanceModel;


class AttendanceController extends ResourceController
{

    protected $modelName = AttendanceModel::class;
    protected $format = 'json';



    public function index()
    {
        $model = new AttendanceModel();

        // Ambil data attendance beserta nama karyawan
        $attendanceRecords = $model->getAttendanceWithEmployeeNames();

        // Jika data tidak ditemukan, kembalikan pesan error
        if (empty($attendanceRecords)) {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 404,
                'error' => 404,
                'messages' => [
                    'error' => 'Attendance not found'
                ]
            ]);
        }

        // Kembalikan data dalam format JSON
        return $this->response->setJSON([
            'status' => 200,
            'data' => $attendanceRecords
        ]);
    }


    public function attendance()
    {
        // Ambil data attendance dari database
        $attendanceModel = new AttendanceModel();
        $totalRecords = $attendanceModel->countAll(); // Total record
        $limit = 10; // Jumlah record per halaman
        $currentPage = $this->request->getGet('page') ?? 1; // Halaman saat ini
        $offset = ($currentPage - 1) * $limit; // Offset untuk query

        // Ambil data berdasarkan limit dan offset
        $attendanceRecords = $attendanceModel->findAll($limit, $offset);

        // Menghitung total halaman
        $totalPages = ceil($totalRecords / $limit);

        // Kirim data ke view
        return view('attendance_view', [
            'attendance_records' => $attendanceRecords,
            'current_page' => $currentPage,
            'total_pages' => $totalPages
        ]);
    }


    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Attendance not found');
        }
        return $this->respond($data);
    }

    public function create()
    {
        // Mengambil data dari request JSON
        $data = $this->request->getJSON(true); // true untuk mengonversi JSON menjadi array

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_employee' => 'required|integer',
            'date'        => 'required|valid_date',
            'attendance_status' => 'required|string'
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->fail($validation->getErrors());
        }

        // Menyimpan data ke model
        $this->model->insert($data);

        return $this->respondCreated(['message' => 'Attendance record created successfully.']);
    }

    public function createBulk()
    {
        // Mengambil data dari request JSON
        $data = $this->request->getJSON(true); // true untuk mengonversi JSON menjadi array

        if (empty($data)) {
            return $this->fail('No data provided.');
        }

        // Menyimpan data ke model
        foreach ($data as $entry) {
            // Menggunakan insert() dari model untuk menyimpan data
            $this->model->insert($entry);
        }

        return $this->respondCreated(['message' => 'Attendance records created successfully.']);
    }



    public function update($id = null)
    {
        $input = $this->request->getRawInput();

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_employee' => 'required|integer',
            'date'        => 'required|valid_date',
            'attendance_status' => 'required|string'
        ]);

        if (!$this->validate($validation->getRules())) {
            return $this->fail($validation->getErrors());
        }

        // Mengupdate data
        $this->model->update($id, $input);
        return $this->respondUpdated($input);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }

    public function getAttendanceByMonthYear($month, $year)
    {
        // Mengambil data dari tabel `tb_attendance` berdasarkan bulan dan tahun
        $attendanceData = $this->model->where('MONTH(date)', $month)
            ->where('YEAR(date)', $year)
            ->findAll();

        if (empty($attendanceData)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan untuk bulan dan tahun yang dipilih'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $attendanceData
        ]);
    }

    public function getMonthlyAttendanceStatus()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Hitung jumlah berdasarkan status untuk bulan ini
        $db = \Config\Database::connect();
        $builder = $db->table('tb_attendance');

        $statuses = ['Present', 'Without Explanation', 'Sick', 'Permission'];
        $data = [];

        foreach ($statuses as $status) {
            $count = $builder->where('MONTH(date)', $currentMonth)
                ->where('YEAR(date)', $currentYear)
                ->where('attendance_status', $status)
                ->countAllResults();
            $data[$status] = $count;
        }

        return $this->response->setJSON($data);
    }
}
