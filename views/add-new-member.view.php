<?php 
require_once("../partials/header.php");
?>

<style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
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


<h3>Dodavanje novog člana</h3>

<form action="obrada_forme.php" method="post" class="col-xl-4">
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

    <div class="form-group">
      <label for="telefon">Trening plan:</label>
      <select name="training_plan_id" class="form-select">
        <option selected >Bez plana</option>
        <?php foreach($allTrainingPlans as $training_plan): ?>
            <option value="<?= $training_plan['plan_id']?>"><?= $training_plan['name']. " - ". $training_plan['price']." €"  ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="telefon">Dodijeli trenera:</label>
      <select name="training_plan_id" class="form-select">
        <option selected >Bez trenera</option>
        <?php foreach($allTrainers as $trainer): ?>
            <option value="<?= $trainer['trainer_id']?>"><?= $trainer['first_name']. " ". $trainer['last_name']  ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit">Dodaj</button>
  </form>


<?php require_once("../partials/footer.php");
 ?>