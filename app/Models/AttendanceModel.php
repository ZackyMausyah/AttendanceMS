<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'tb_attendance';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_employee', 'date', 'attendance_status'];

    public function getAttendanceWithEmployee()
    {
        return $this->findAll();
    }

    public function getAttendanceWithEmployeeNames()
    {
        return $this->select('tb_attendance.*, tb_employee.username as employee_name')
            ->join('tb_employee', 'tb_attendance.id_employee = tb_employee.id_employee')
            ->findAll();
    }

    public function getAttendanceData($month, $year)
    {
        $builder = $this->db->table($this->table)
            ->select('tb_attendance.*, tb_employee.username as employee_name')
            ->join('tb_employee', 'tb_attendance.id_employee = tb_employee.id_employee', 'left')
            ->where('MONTH(tb_attendance.date)', $month)
            ->where('YEAR(tb_attendance.date)', $year);

        return $builder->get()->getResultArray();
    }
}
