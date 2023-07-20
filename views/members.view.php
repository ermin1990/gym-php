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

<?php if (isset($_SESSION['msg'])) {
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>" . $_SESSION['msg'] . "</div>";
  unset($_SESSION['msg']);
} ?>

<h3>Stranica sa članovima</h3>  <a href="../../gym/members/add-new.php" class="btn btn-warning m-3">Dodaj novog člana</a>
<a href="../../gym/services/export.service.php?exp=members" class="btn btn-info m-3">Export članova u Excel</a>

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
          <div class="card-footer d-flex">
            <a href="putanja/do/pdf_karte_pristupa1.pdf" class="btn btn-primary m-1 disabled">PDF kartica</a>
            <a href="../../gym/services/delete-member.service.php?did=<?= $member['member_id']; ?>" class="btn btn-danger m-1">Delete</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>



<?php require_once("../partials/footer.php");
 ?>