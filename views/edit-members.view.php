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


<h3>Izmjena podataka člana</h3>

<?php if (isset($_SESSION['msg'])):?>
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <?php
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  ?>
  </div>
  
<?php endif; ?>


<form action="../../gym/services/edit-member.service.php" method="POST" class="col-xl-4">
    <input type="hidden" value="<?= $member['member_id'] ?>" name="member_id">
    <div class="form-group">
      <label for="ime">Ime:</label>
      <input type="text" id="ime" name="first_name" value="<?= $member['first_name'] ?>" required>
    </div>

    <div class="form-group">
      <label for="prezime">Prezime:</label>
      <input type="text" id="prezime" name="last_name" value="<?= $member['last_name'] ?>" required>
    </div>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="<?= $member['email'] ?>" required>
    </div>

    <div class="form-group">
      <label for="telefon">Telefon:</label>
      <input type="tel" id="telefon" name="phone_number" value="<?= $member['phone_number'] ?>" required>
    </div>

    
    <div class="form-group">

    <label for="telefon">Trenutni trener: <?php if(!$member['training_plan_name']){echo "Nema plana";}else{echo $member['training_plan_name'];} ?></label>
      <label for="telefon">Izmjeni plan:</label>
      <select name="training_plan_id" class="form-select">
      <option value>Bez plana</option>
        <?php foreach($allPlans as $training_plan): ?>
            <option value="<?= $training_plan['plan_id']?>"><?= $training_plan['name']. " - ". $training_plan['price']." €"  ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <div class="form-group">
      
      <label for="telefon">Trenutni trener: <?php if(!$member['trainer_fName']){echo "Nema trenera";}else{echo $member['trainer_fName']." ".$member['trainer_lName'];} ?></label>
      <label for="telefon">Izmjeni trenera:</label>
      <select name="trainer_id" class="form-select">
        <option value sellected >Bez trenera</option>
        <?php foreach($allTrainers as $trainer): ?>
            <option value="<?= $trainer['trainer_id']?>"><?= $trainer['first_name']. " ". $trainer['last_name'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    
          <br>
    <button type="submit" class="mt-3 btn btn-warning">Sačuvaj podatke</button>
  </form>



<?php require_once("partials/footer.php");
 ?>

