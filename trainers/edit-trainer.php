<?php 
require_once '../../gym/config.php';

if (isset($_GET['did']) && is_numeric($_GET['did'])) {

    $member_id = $_GET['did'];
    $sql = "SELECT * FROM trainers WHERE trainer_id = $member_id";

    $result = $conn->query($sql);

    if ($result) {
        $trainer = $result->fetch_assoc(); // Fetch rezultata u asocijativni niz
    } else {
        // Greška prilikom izvršavanja upita
        die("Greška prilikom izvršavanja upita: " . $conn->error);
    }

}


require '../../gym/views/edit-trainer.view.php';