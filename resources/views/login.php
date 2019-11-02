<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2>Login</h2>
      <p>Please use your e-mail address to login.</p>
      <form method='POST'>
        <div class="form-group">
        <label for="email"><b>E-mail address</b></label>
        <input class="form-control" type='email' name='email' id="email" placeholder="name@example.com" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <input type='submit' class='btn btn-primary' value='Login / Register'>
      </form>
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
