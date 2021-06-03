<?php require_once 'includes/header.php' ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
    <h4>Register to Hamzastore</h4>
      <form action="includes/register.inc.php" method="POST">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="john@gmail.com" name="email">
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" name="firstname">
        <span class="input-group-text">|</span>
        <input type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" name="lastname">
     </div>
     <div class="mb-3">
     <label for="exampleFormControlInput1" class="form-label">Gender</label>
     <select class="form-select" aria-label="Default select example" name="gender">
            <option selected>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    </select>
    </div>
    <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Country</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Country" name="country">
      </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password">
      </div>
      <button name="submit" type="submit" class="btn btn-primary mb-3">Register</button>
      <p>Have an account? <a href="login.php">Log in here</a></p>
       </form>
    </div>
  </div>
</div>

<?php 
require_once 'includes/footer.php';
?>