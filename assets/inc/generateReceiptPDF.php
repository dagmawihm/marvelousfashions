<?php
require('fpdf186/fpdf.php');

function generateReceiptPDF($receiptData, $orderID) {
    // Create a new FPDF object
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('Arial', 'B', 16);

    // Add logo at the top left corner
    $pdf->Image('https://marvelousfashions.com/assets/images/icons/favicon_io/android-chrome-512x512.png', 10, 10, 40);

    $pdf->SetTextColor(213, 87, 144); // Set text color to #d53790 (RGB)
    // Add header with company information
    $pdf->Cell(0, 30, 'Marvelous Fashions', 0, 1, 'C');
    $pdf->SetTextColor(0); // Reset text color to black (default)
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(0, 5, 'Contact: +251949075847', 0, 1, 'R');
    $pdf->Cell(0, 5, 'Address: Megenagna 3M Building first floor No. FR-05', 0, 1, 'R');
    $pdf->Cell(0, 5, 'Invoice Date: ' . date('Y-m-d'), 0, 1, 'R');
    $pdf->Cell(0, 5, 'Order ID: ' .   substr(($orderID), -5), 0, 1, 'R');
    $pdf->Cell(0, 5, 'Payment method: Cash on delivery', 0, 1, 'R');
    $pdf->Cell(0, 5, 'Online Purchase Address: marvelousfashions.com', 0, 1, 'R');
    $pdf->Ln(10);
  
    // Set font for main content
    $pdf->SetFont('Arial', 'B', 12);

    // Add header for item list
    $pdf->Cell(80, 10, 'Item', 1, 0, 'C');
    $pdf->Cell(80, 10, 'Size', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Price', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 12);

    // Output receipt data
    $total = 0;
    foreach ($receiptData as $item) {
        $pdf->Cell(80, 10, $item['name'], 1);
        $pdf->Cell(80, 10, $item['size'], 1, 0, 'C');
        $pdf->Cell(30, 10, '$'.$item['price'], 1, 1, 'C');
        $total += (float)$item['price'];
    }

    $pdf->SetFont('Arial', 'B', 12);
    // Add total row
    $pdf->Cell(160, 10, 'Total', 1, 0, 'R');
    $pdf->Cell(30, 10, '$'.$total, 1, 1, 'C');

    // Add thank you message
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 25, 'If you have any question with your order please call us on  +251949075847', 0, 1, 'C');
    $pdf->Cell(0, 10, 'Thank you for your Order!', 0, 1, 'C');

    // Output PDF as a file (you can also use 'I' to output it directly to the browser)
    $pdf->Output('../../receipts/receipt('.substr(($orderID), -5).').pdf', 'F');
}
?>
