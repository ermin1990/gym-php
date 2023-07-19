<?php 
require_once 'partials/header.php';
?>

<style>
    .card {
      text-align: center;
      padding-top:20px;
      margin: 10px;
      padding: 5px; /* Dodajte padding da bi kockice bile manje */
    }
    .card a{
        text-decoration: none;
        color: #000;
    }
    .card-img-top {
      max-width: 50px; /* Prilagodite željenu veličinu ikonica */
      max-height: 50px; /* Prilagodite željenu veličinu ikonica */
    }
    .card-title {
      font-size: 16px; /* Prilagodite željenu veličinu naslova */
      margin-top: 10px;
    }
  </style>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card pt-3">
          <a href="../gym/members">
            <img src="../../gym/icon/members.svg" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Članovi</h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card pt-3">
          <a href="../gym/trainers">
            <img src="../../gym/icon/trainers.svg" class="card-img-top" alt="Dodavanje trenera">
            <div class="card-body">
              <h5 class="card-title">Treneri</h5>
            </div>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card pt-3">
          <a href="../gym/plans">
            <img src="../../gym/icon/add-training-plan.svg" class="card-img-top" alt="Dodavanje trening planova">
            <div class="card-body">
              <h5 class="card-title">Trening planovi</h5>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>


<?php  
require_once 'partials/footer.php';
?>






    
