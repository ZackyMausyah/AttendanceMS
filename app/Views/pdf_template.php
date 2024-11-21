<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kehadiran</title>
    <style>
        /* Tambahkan style yang diperlukan di sini */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Laporan Kehadiran</h1>
    <table>
        <thead>
            <tr>
                <th>ID Employee</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $attendance): ?>
                    <tr>
                        <td><?= $attendance['id_employee']; ?></td>
                        <td><?= isset($attendance['employee_name']) ? $attendance['employee_name'] : 'N/A'; ?></td>
                        <td><?= $attendance['date']; ?></td>
                        <td><?= $attendance['attendance_status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>

    </table>
</body>

</html>