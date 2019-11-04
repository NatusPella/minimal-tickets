<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col mx-3">
      <h2>Login</h2>
      <?php
      if ($data['showSuccess']) {
      ?>
      <p>Please check your e-mail for your login link (it includes an one-time-password).</p>
      <?php
      } else {
      ?>
      <p>Please use your e-mail address to login.</p>
      <form method='POST' action='?action=login'>
        <div class="form-group">
        <label for="email"><b>E-mail address</b></label>
        <input class="form-control" type='email' name='email' id="email" placeholder="name@example.com" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <input type='submit' class='btn btn-outline-primary' value='Login / Register'>
      </form>
      <?php
      }
      ?>
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
