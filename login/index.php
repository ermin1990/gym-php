<?php 
require_once("../partials/header.php");
require_once("../services/login.php");

?>

<div class="container col-xl-4">
<?php if(isset($_SESSION['error'])){
  echo "<div class='btn btn-danger d-flex text-center'>" . $_SESSION['error'] . "<br></div>";
  unset($_SESSION['error']);
} ?>
</div>


<div class="container col-xl-4">
<form action="../services/login.php" method="POST">
  <div class="form-group">
    <label for="username">Korisničko ime:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="password">Lozinka:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary mt-2">Prijavi se</button>
</form>

</div>

<?php require_once("../partials/footer.php");
 ?>


