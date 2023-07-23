<?php
require_once('../../gym/config.php');
require('../fpdf/fpdf.php');

if (isset($_GET['did'])) {
    $member_id = $_GET['did'];

    $sql = "SELECT * FROM members WHERE member_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();

    if ($member) {
        $pdf = new FPDF();
        
        $pdf->SetFont('Helvetica', '', 12);
        
        $pdf->AddPage('P', array(100, 100));

        $pdf->Cell(0, 10, 'Detalji o clanu', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->Cell(40, 10, 'Ime:', 0);
        $pdf->Cell(0, 10, $member['first_name'], 0, 1);

        $pdf->Cell(40, 10, 'Prezime:', 0);
        $pdf->Cell(0, 10, $member['last_name'], 0, 1);

        $pdf->Cell(40, 10, 'Email:', 0);
        $pdf->Cell(0, 10, $member['email'], 0, 1);

        $pdf->Cell(40, 10, 'Telefon:', 0);
        $pdf->Cell(0, 10, $member['phone_number'], 0, 1);

        $pdf->Output();
    } else {
        echo "Član s ID-jem $member_id nije pronađen.";
    }
} else {
    echo "Nije pronađen ID člana.";
}
?>
