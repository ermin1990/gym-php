<?php 
require_once("partials/header.php");
?>

<style>
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .upload-container {
    display: inline-block;
    position: relative;
    
}

.file-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.file-label {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #FFF;
    cursor: pointer;
    border-radius: 5px;
}

.image-preview {
    width: 200px;
    height: 200px;
    border: 1px solid #ccc;
    background-size: cover;
    background-position: center;
    border-radius:5px;
    transition: transform .2s;
}

.file-input:hover {
  transform: scale(1.1);
}

  </style>


<h3>Izmjeni podatke za trenera</h3>

<?php if (isset($_SESSION['msg'])):?>
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <?php
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  ?>
  </div>
  
<?php endif; ?>




<form action="../../gym/services/edit-trainer.service.php" method="POST" class="col-xl-4" enctype="multipart/form-data">
<input type="hidden" value="<?= $trainer['trainer_id'] ?>" name="trainer_id">

    <div class="form-group">
      <label for="ime">Ime:</label>
      <input type="text" id="ime" value="<?= $trainer['first_name'] ?>" name="first_name" required>
    </div>

    <div class="form-group">
      <label for="prezime">Prezime:</label>
      <input type="text" id="prezime" value="<?= $trainer['last_name'] ?>" name="last_name" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" id="email" value="<?= $trainer['email'] ?>" name="email" required>
    </div>

    <div class="form-group">
      <label for="telefon">Telefon:</label>
      <input type="tel" id="telefon" value="<?= $trainer['phone_number'] ?>" name="phone_number" required>
    </div>


    
          <br>
    <button type="submit" class="mt-3">Spremi podatke trenera</button>
  </form>



<?php require_once("partials/footer.php");
 ?>

