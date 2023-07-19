<?php 
require_once("../partials/header.php");
?>

<style>
.profile-img{
  width: 100%;
  height: 320px;
  object-fit: cover;
}

</style>



<h3>Stranica sa članovima</h3>  <a href="../../gym/members/add-new.php" class="btn btn-warning m-3">Dodaj novog člana</a>

<div class="container">
    <div class="row">
        <?php foreach($allMembers as $member): ?>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="profile-card card p-2 m-1">
          <img src="<?php if(!$member['photo_path']){
            echo "../../gym/icon/default-profile.svg";
          }else{
            echo $member['photo_path'];
          }  ?>" class="card-img-top profile-img <?php if(!$member['photo_path']){echo "miniProfileImg";}?>" alt="Profilna fotografija">
          <div class="card-body">
            <h5 class="card-title"><?= $member['first_name'] ." ". $member['last_name'] ?></h5>
            <p class="card-text">
              <strong>Email:</strong> <?= $member['email'] ?> <br>
              <strong>Broj telefona:</strong> <?= $member['phone_number'] ?> <br>
              <strong>Plan: </strong>
              
              <?php
              if($member['training_plan_name']){
                echo $member['training_plan_name'];
              }else{
                echo "Nema plana";
              }
              
              ?>

              <br>
              <strong>Trener: </strong> 

              <?php
              if($member['trainer_fName'] && $member['trainer_lName']){
                echo $member['trainer_fName'] . " " . $member['trainer_lName'] ;
              }else{
                echo "Nema dodijeljenog trenera";
              }
              
              ?>
            

            </p>
          </div>
          <div class="card-footer">
            <a href="putanja/do/pdf_karte_pristupa1.pdf" class="btn btn-primary">PDF kartica</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>



<?php require_once("../partials/footer.php");
 ?>