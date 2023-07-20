<?php 
require_once("../partials/header.php");
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


<h3>Dodavanje novog trenera</h3>

<?php if (isset($_SESSION['msg'])):?>
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <?php
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  ?>
  </div>
  
<?php endif; ?>




<form action="../../gym/services/add-new-trainer.service.php" method="POST" class="col-xl-4" enctype="multipart/form-data">
    <div class="form-group">
      <label for="ime">Ime:</label>
      <input type="text" id="ime" name="first_name" required>
    </div>

    <div class="form-group">
      <label for="prezime">Prezime:</label>
      <input type="text" id="prezime" name="last_name" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
      <label for="telefon">Telefon:</label>
      <input type="tel" id="telefon" name="phone_number" required>
    </div>


    
    <div class="upload-container">
        <input type="file" name="image" id="image" class="file-input">
        <label for="image" class="file-label">Odaberi sliku</label>
        <div class="image-preview" id="image-preview"></div>
    </div>
    <script src="../js/script.js"></script>


    
          <br>
    <button type="submit" class="mt-3">Dodaj novog trenera</button>
  </form>



<?php require_once("../partials/footer.php");
 ?>

