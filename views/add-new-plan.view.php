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
  </style>


<h3>Dodavanje novog plana</h3> 

<?php if (isset($_SESSION['msg'])):?>
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <?php
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  ?>
  </div>
  
<?php endif; ?>




<form action="../../gym/services/add-new-plan.service.php" method="POST" class="col-xl-4">
    <div class="form-group">
      <label for="ime">Name:</label>
      <input type="text" name="name" required>
    </div>

    <div class="form-group">
      <label for="prezime">Sessions:</label>
      <input type="number" name="sessions" min="5" max="30" required>
    </div>

    <div class="form-group">
      <label for="email">Price:</label>
      <input type="price" name="price" required>
    </div>

    


   
    
          <br>
    <button type="submit" class="mt-3">Dodaj novi plan</button>
  </form>



<?php require_once("../partials/footer.php");
 ?>

