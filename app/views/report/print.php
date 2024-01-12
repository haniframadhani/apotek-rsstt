<?php

require_once '../app/vendors/fpdf/fpdf.php';

$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(285, 7, 'APOTEK RSSTT', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(285, 7, 'LAPORAN PENGAMBILAN OBAT', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'NO', 1, 0);
$pdf->Cell(15, 6, 'id log', 1, 0);
$pdf->Cell(45, 6, 'waktu', 1, 0);
$pdf->Cell(25, 6, 'kode obat', 1, 0);
$pdf->Cell(35, 6, 'nama generik', 1, 0);
$pdf->Cell(35, 6, 'nama merek', 1, 0);
$pdf->Cell(17, 6, 'jumlah', 1, 0);
$pdf->Cell(17, 6, 'harga', 1, 0);
$pdf->Cell(17, 6, 'total', 1, 0);
$pdf->Cell(32, 6, 'kode apoteker', 1, 0);
$pdf->Cell(32, 6, 'nama apoteker', 1, 1);
$pdf->SetFont('Arial', '', 12);
$i = 1;
foreach ($data['logs'] as $log) {
  $pdf->Cell(10, 6, $i, 1, 0);
  $pdf->Cell(15, 6, $log['id'], 1, 0);
  $pdf->Cell(45, 6, date('m/d/Y H:i:s', $log['time']), 1, 0);
  $pdf->Cell(25, 6, $log['kode_obat'], 1, 0);
  $pdf->Cell(35, 6, $log['nama_generik'], 1, 0);
  $pdf->Cell(35, 6, $log['nama_merek'], 1, 0);
  $pdf->Cell(17, 6, $log['jumlah'], 1, 0);
  $pdf->Cell(17, 6, $log['harga'], 1, 0);
  $pdf->Cell(17, 6, $log['jumlah'] * $log['harga'], 1, 0);
  $pdf->Cell(32, 6, $log['kode_apoteker'], 1, 0);
  $pdf->Cell(32, 6, $log['nama_apoteker'], 1, 1);
  $i++;
}

$pdf->Output();
