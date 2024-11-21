<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends ResourceController
{
    use ResponseTrait;

    protected $attendanceModel;

    public function __construct()
    {
        $this->attendanceModel = new AttendanceModel();
    }

    public function generateReport()
    {
        $format = $this->request->getPost('format');
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');

        if (!in_array($format, ['pdf', 'excel'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['status' => 400, 'error' => 400, 'messages' => ['error' => 'Invalid format specified.']]);
        }

        // Ambil data kehadiran berdasarkan bulan dan tahun
        $attendanceData = $this->attendanceModel->getAttendanceData($month, $year);

        // Cek apakah ada data kehadiran
        if (empty($attendanceData)) {
            return $this->response->setStatusCode(404)
                ->setJSON(['status' => 404, 'error' => 404, 'messages' => ['error' => "No attendance data found for $month/$year."]]);
        }

        // Proses laporan berdasarkan format yang dipilih
        if ($format === 'pdf') {
            return $this->generatePDF($attendanceData, $month, $year);
        } elseif ($format === 'excel') {
            return $this->generateExcel($attendanceData, $month, $year);
        }
    }


    private function generatePDF($data, $month, $year)
    {
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Create HTML for the PDF
        $html = '<h1 style="text-align: center;">Attendance Report for ' . $month . '/' . $year . '</h1>';
        $html .= '<table style="width: 100%; border-collapse: collapse;">';
        $html .= '<thead>';
        $html .= '<tr style="background-color: #4F81BD; color: white;">';
        $html .= '<th style="border: 1px solid #ddd; padding: 8px;">ID Employee</th>';
        $html .= '<th style="border: 1px solid #ddd; padding: 8px;">Name</th>';
        $html .= '<th style="border: 1px solid #ddd; padding: 8px;">Attendance Date</th>';
        $html .= '<th style="border: 1px solid #ddd; padding: 8px;">Status</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        foreach ($data as $attendance) {
            $html .= '<tr>';
            $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $attendance['id_employee'] . '</td>';
            $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $attendance['employee_name'] . '</td>';
            $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $attendance['date'] . '</td>';
            $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $attendance['attendance_status'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('attendance_report_' . $month . '_' . $year . '.pdf', ['Attachment' => true]);
    }

    private function generateExcel($data, $month, $year)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers with styling
        $headers = ['ID Employee', 'Name', 'Attendance Date', 'Status'];
        $sheet->fromArray($headers, NULL, 'A1');
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:D1')->getFill()->getStartColor()->setARGB('4F81BD');
        $sheet->getStyle('A1:D1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('A1:D1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        // Fill data with borders and alternating row colors
        $row = 2;
        foreach ($data as $attendance) {
            $sheet->setCellValue('A' . $row, $attendance['id_employee']);
            $sheet->setCellValue('B' . $row, $attendance['employee_name']);
            $sheet->setCellValue('C' . $row, $attendance['date']);
            $sheet->setCellValue('D' . $row, $attendance['attendance_status']);

            // Apply borders
            foreach (range('A', 'D') as $columnID) {
                $sheet->getStyle($columnID . $row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            }

            // Alternating row color
            if ($row % 2 == 0) {
                $sheet->getStyle("A{$row}:D{$row}")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle("A{$row}:D{$row}")->getFill()->getStartColor()->setARGB('D9EAD3'); // Light green
            }

            $row++;
        }

        // Set auto width for columns
        foreach (range('A', 'D') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);

        // Set the file name
        $fileName = 'attendance_report_' . $month . '_' . $year . '.xlsx';

        // Send headers to prompt download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function getMonthlyAttendanceData()
    {
        // Ambil data dari model sesuai dengan kebutuhan
        $data = [
            'labels' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'datasets' => [
                [
                    'label' => 'Daily attendance',
                    'data' => [300, 400, 350, 420, 380],
                ],
                [
                    'label' => 'Weekly attendance',
                    'data' => [250, 350, 320, 370, 340],
                ],
                [
                    'label' => 'Monthly attendance',
                    'data' => [200, 330, 300, 340, 310],
                ],
            ]
        ];
        return $this->response->setJSON($data);
    }
}
