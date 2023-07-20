<?php 
require_once("../partials/header.php");
?>

<h3>Planovi treniranja</h3>  <a href="../../gym/plans/add-new-plan.php" class="btn btn-warning m-3">Dodaj novi plan</a>


<?php if (isset($_SESSION['msg'])):?>
  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <?php
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  ?>
  </div>
  
<?php endif; ?>

<div class="container mt-5">
        <h2>Trening planovi</h2>
        <div class="row">
        
            <?php foreach($allPlans as $plan): ?>
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $plan['name'] ?></h5>
                        <p class="card-text">Broj sesija: <?= $plan['sessions'] ?></p>
                        <p class="card-text">Cijena: <?= $plan['price'] ?> €</p>
                        <a href="#" class="btn btn-primary btn-sm disabled">Detalji</a>
                        <a href="../../gym/services/delete-plan.service.php?did=<?= $plan['plan_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div><?php endforeach; ?>
        </div>
    </div>
    


<?php require_once("../partials/footer.php");
 ?>