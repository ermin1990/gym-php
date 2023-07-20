<?php 
require_once '../../gym/config.php';


if($_SERVER['REQUEST_METHOD']== "POST"){

    
    $photo_path = ""; // Postavite početnu vrijednost na null

    if ($_FILES["image"]["tmp_name"] !== "" && is_uploaded_file($_FILES["image"]["tmp_name"])) {
        // Provjera i upload slike samo ako je korisnik odabrao sliku
    
        $target_dir = "../images/members/"; 
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Provjera da li je slika stvarno slika
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "Datoteka je slika - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Datoteka nije slika.";
            $uploadOk = 0;
        }
    
        // Provjera da li datoteka već postoji
        if (file_exists($target_file)) {
            echo "Datoteka već postoji.";
            $uploadOk = 0;
        }
    
        if ($_FILES["image"]["size"] > 10000000) {
            echo "Datoteka je prevelika.";
            $uploadOk = 0;
        }
    
        // Dozvoljeni formati slika (možete dodati više formata po potrebi)
        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Dozvoljeni su samo JPG, JPEG, PNG i GIF formati.";
            $uploadOk = 0;
        }
    
        // Provjera da li je upload u redu
        if ($uploadOk == 0) {
            echo "Slika nije uploadovana.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "Slika " . basename($_FILES["image"]["name"]) . " je uploadovana.";
                $photo_path = $target_file; // Postavite putanju samo ako je upload uspješan
            } else {
                echo "Došlo je do greške pri uploadovanju slike.";
            }
        }
    }


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $training_plan_id = $_POST['training_plan_id'];
    if (empty($training_plan_id)) {
        $training_plan_id = null;
    }
    $trainer_id = $_POST['trainer_id'];
    if (empty($trainer_id)) {
        $trainer_id = null;
    }

    $sql = "INSERT INTO members (first_name,last_name,email,phone_number,photo_path,training_plan_id,trainer_id) VALUES(?,?,?,?,?,?,?)";

    $run = $conn->prepare($sql);
    $run->bind_param("sssssii",$first_name,$last_name,$email,$phone_number,$photo_path,$training_plan_id,$trainer_id);
    $run->execute();


    if($run){
        $_SESSION['msg'] = "Uspješno ste dodali novog korisnika";
        header('location: ../../../../gym/members');
    }else{
        $_SESSION['msg'] = "Dogodila se greška!";
        header('location: ../../../members/add-new.php');
    }
}


?>