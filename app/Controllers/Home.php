<?php

namespace App\Controllers;

use App\Models\AttendanceModel;

class Home extends BaseController
{
    public function login()
    {
        $data = [
            'title' => ('Login Page')
        ];
        
        return view('login', $data);
    }

    public function signup()
    {
        $data = [
            'title' => ('Sign Up Page')
        ];
        
        return view('signup', $data);
    }

    public function forgot_password()
    {
        $data = [
            'title' => ('Forgot Password Page')
        ];

        return view('forgot_password', $data);
    }
 
    public function reset()
    {
        $data = [
            'title' => ('Reset Password Page')
        ];

        return view('reset', $data);
    } 

    public function dashboard()
    {
      
        // Jika sudah login, tampilkan dashboard
        return view('dashboard', ['title' => 'Dashboard']);
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Menghancurkan semua session

        return redirect()->to('/'); // Redirect ke halaman login
    }

    public function employee()
    {
        $data = [
            'title' => ('Employee Data')
        ];

        return view('employee', $data);
    }  

    public function addemployee()
    {
        $data = [
            'title' => ('Emloyee Data')
        ];

        return view('addemployee', $data);
    }  

    public function absensi()
    {
        $attendanceModel = new AttendanceModel();

        // Mengambil data attendance beserta nama karyawan
        $attendanceRecords = $attendanceModel->getAttendanceWithEmployeeNames();

        // Kirim data ke view
        $data = [
            'title' => 'Attendance Data',
            'attendance_records' => $attendanceRecords
        ];

        return view('absensi', $data);
    }  

    public function report()
    {
        $data = [
            'title' => ('Monthly Report')
        ];

        return view('report', $data);
    }  
}
