<?php
require '../../vendor/autoload.php'; // For Excel and PDF libs
include '../../config/db_connect.php';

$student_id = $_POST['student_id'];
$exam_id = $_POST['exam_id'];
$export_type = $_POST['export'];

$query = $conn->query("SELECT subject, marks FROM marks WHERE student_id = '$student_id' AND exam_id = '$exam_id'");

$data = [];
$total = 0;
$count = 0;
while ($row = $query->fetch_assoc()) {
  $data[] = $row;
  $total += $row['marks'];
  $count++;
}
$percentage = $count ? round($total / $count, 2) : 0;

if ($export_type == 'excel') {
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'Subject');
  $sheet->setCellValue('B1', 'Marks');

  $rowNum = 2;
  foreach ($data as $row) {
    $sheet->setCellValue("A{$rowNum}", $row['subject']);
    $sheet->setCellValue("B{$rowNum}", $row['marks']);
    $rowNum++;
  }

  $sheet->setCellValue("A{$rowNum}", 'Total');
  $sheet->setCellValue("B{$rowNum}", $total);
  $sheet->setCellValue("A" . ($rowNum + 1), 'Percentage');
  $sheet->setCellValue("B" . ($rowNum + 1), $percentage . '%');

  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header("Content-Disposition: attachment; filename=report_card.xlsx");
  $writer = new Xlsx($spreadsheet);
  $writer->save("php://output");
  exit;

} elseif ($export_type == 'pdf') {
  use Dompdf\Dompdf;

  $html = "<h3>Report Card for Student ID: $student_id</h3>
          <table border='1' cellpadding='5'>
          <tr><th>Subject</th><th>Marks</th></tr>";

  foreach ($data as $row) {
    $html .= "<tr><td>{$row['subject']}</td><td>{$row['marks']}</td></tr>";
  }
  $html .= "<tr><td><b>Total</b></td><td><b>$total</b></td></tr>";
  $html .= "<tr><td><b>Percentage</b></td><td><b>$percentage%</b></td></tr>";
  $html .= "</table>";

  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);
  $dompdf->render();
  $dompdf->stream("report_card_$student_id.pdf");
  exit;
}
?>
