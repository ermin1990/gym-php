<?php 
require_once("partials/header.php");
?>


<h3>Stranica za trenere</h3> <a href="../../gym/trainers/add-new-trainer.php" class="btn btn-warning m-3">Dodaj novog trenera</a>
<a href="../../gym/services/export.service.php?exp=trainers" class="btn btn-info m-3">Export trenera u Excel</a>

<?php if (isset($_SESSION['msg'])):?>
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <?php
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  ?>
  </div>
  <?php endif; ?> 

<div class="container mt-5">
        <h2>Lista trenera</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ime</th>
                    <th scope="col">Prezime</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefon</th>
                    <th scope="col">Slika</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($allTrainers as $trainer): ?>

                <tr class="p-2">
                    <td><?= $trainer['first_name'] ?></td>
                    <td><?= $trainer['last_name'] ?></td>
                    <td><?= $trainer['email'] ?></td>
                    <td><?= $trainer['phone_number'] ?></td>
                    <td><img src="<?php if(!$trainer['photo_path']){
            echo "../../gym/icon/default-profile.svg";
          }else{
            echo $trainer['photo_path'];
          }  ?>
          
          "class="card-img-top profile-img" alt="Profilna fotografija" style="max-width: 40px;"></td>

          <td>
          <a href="../../gym/services/delete-trainer.service.php?did=<?= $trainer['trainer_id']; ?>" class="btn btn-danger btn-sm m-1">Delete</a>
          <a href="#" class="btn btn-warning btn-sm m-1">Edit</a></td>
          

            </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?php require_once("partials/footer.php");
 ?>