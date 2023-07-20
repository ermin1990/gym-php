<?php 
require_once '../../gym/config.php';

if(isset($_GET['exp'])){
    if($_GET['exp'] == 'members'){
        $q = $_GET['exp'];
        $sql = "SELECT member_id,first_name,last_name,
        email,phone_number,training_plan_id,trainer_id FROM $q";
        $csv_cols = [
            "member_id",	
            "first_name",	
            "last_name",
            "email",	
            "phone_number",		
            "training_plan_id",	
            "trainer_id"];
    }else if($_GET['exp'] == 'trainers'){
        $q = $_GET['exp'];
        $sql = "SELECT trainer_id,first_name,last_name,email,phone_number FROM $q";
        $csv_cols = [
            "trainer_id",	
            "first_name",	
            "last_name",
            "email",	
            "phone_number"];
    }else{
        die("Nije dozvoljeno exportovati". $_GET['exp']);
    }

    // Postavljanje karakter seta za bazu podataka na UTF-8
    $conn->set_charset('utf8');

    $run = $conn->query($sql);
    $results = $run->fetch_all(MYSQLI_ASSOC);

    // Kreiranje CSV datoteke
$excel_file = $q . ".csv";
$output = fopen($excel_file, "w");

// Postavljanje karakter seta za izlaznu CSV datoteku na UTF-8
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

// Dodavanje naslova tabele
fputcsv($output, $csv_cols, ";"); // Koristimo tabulator kao separator

// Dodavanje podataka o članovima ili trenerima
foreach ($results as $result) {
    fputcsv($output, $result, ";"); // Koristimo tabulator kao separator
}

fclose($output);

// Slanje CSV datoteke na download
header('Content-Type: application/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.$excel_file.'"');
header('Cache-Control: max-age=0');
readfile($excel_file);
unlink($excel_file); // Brišemo privremenu datoteku nakon što je poslana na download
exit;
}
?>
