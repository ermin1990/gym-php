<?php 

require_once '../../gym/config.php';

if (isset($_GET['did']) && is_numeric($_GET['did'])) {
    $trainer_id = $_GET['did'];
    $sql = "DELETE FROM trainers WHERE `trainer_id` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $trainer_id);
        if ($stmt->execute()) {
            header("Location: ../trainers ");
            exit();
        } else {
            echo "Greška pri brisanju člana.";
        }
    } else {
        echo "Greška pri pripremi upita.";
    }
} else {
    echo "Neispravan ID člana.";
}
