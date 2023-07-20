<?php 

require_once '../../gym/config.php';

if (isset($_GET['did']) && is_numeric($_GET['did'])) {
    $plan_id = $_GET['did'];
    $sql = "DELETE FROM training_plans WHERE `plan_id` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $plan_id);
        if ($stmt->execute()) {
            header("Location: ../plans ");
            exit();
        } else {
            echo "Greška pri brisanju plana.";
        }
    } else {
        echo "Greška pri pripremi upita.";
    }
} else {
    echo "Neispravan ID plana.";
}
