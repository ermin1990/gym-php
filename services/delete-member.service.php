<?php 

require_once '../../gym/config.php';

if (isset($_GET['did']) && is_numeric($_GET['did'])) {
    $member_id = $_GET['did'];
    $sql = "DELETE FROM members WHERE `member_id` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $member_id);
        if ($stmt->execute()) {
            header("Location: ../members ");
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
