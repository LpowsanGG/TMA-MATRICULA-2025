<?php
require 'vendor/autoload.php'; // Asegúrate de tener PHPSpreadsheet instalado
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Datos a exportar
$data = [
    ['Nombre', 'Apellido', 'Padre', 'Madre', 'Correo Matrícula', 'Correo Institucional', 'Tipo de Sangre', 'Número de Documento', 'Tipo de Documento'],
    ['Juan', 'Perez', 'Carlos Perez', 'Maria Perez', 'juan@mail.com', 'juan@institucional.com', 'O+', '12345678', 'DNI'],
    ['Ana', 'Lopez', 'Luis Lopez', 'Sara Lopez', 'ana@mail.com', 'ana@institucional.com', 'A+', '87654321', 'Carnet de extranjería']
];

// Insertar los datos
$row = 1;
foreach ($data as $entry) {
    $col = 0;
    foreach ($entry as $cell) {
        $sheet->setCellValueByColumnAndRow($col + 1, $row, $cell);
        $col++;
    }
    $row++;
}

// Estilo para las celdas
$sheet->getStyle('A1:I1')->getFont()->setBold(true)->getColor()->setRGB('FFFFFF');
$sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('4CAF50');

// Ajustar ancho de columnas
foreach (range('A', 'I') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

$writer = new Xlsx($spreadsheet);
$filename = 'alumnos_' . date('Y-m-d') . '.xlsx';

// Redirigir al navegador para descargar
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
exit();
