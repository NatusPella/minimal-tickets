<?php
global $data;
require_once("resources/views/components/header.php");
?>
<div class="container">
  <div class="row">
    <div class="col">
      <h3>Create ticket</h3>
      <form method='POST' action='?action=createTicket'>
        <div class="form-group">
          <label for="title"><b>Title</b></label>
          <input id="title" class="form-control" required type='text' name='title'>
        </div>
        <div class="form-group">
          <label for="description"><b>Description</b></label>
          <textarea id="description" class="form-control" name='description'></textarea>
        </div>
        <p><b>Tags</b></p>
          <?php
          foreach ($data['defaultTags'] as $tagId => $tagValue) {
            echo "
            <div class='form-check form-group'>
              <input id='$tagId' class='form-check-input' type='checkbox' name='$tagId'>
              <label for='$tagId' class='form-check-label'>$tagValue</label>
            </div>";
          }
          //TODO Custom tags
          ?>
        <input type='submit' class="btn btn-primary" value='Submit'>
      </form>
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
