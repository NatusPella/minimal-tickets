<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 title="ID: <?= $data['ticket']->id ?>"> <?= $data['ticket']->title ?></h2>

      <p><span class="badge badge-light"><?= implode(", ", $data['ticket']->tags) ?></span></p>
      <p><span class="badge badge-secondary"><?= ucfirst($data['ticket']->status) ?></span> <i class="fas fa-user"></i> <?= User::getById($data['ticket']->owner)->name ?> <i class="fas fa-user-tag"></i> <?= User::getById($data['ticket']->handler)->name ?> <i class="fas fa-calendar-plus"></i> <?= date("Y-m-d H:i:s", $data['ticket']->updated) ?> <i class="fas fa-calendar"></i> <?= date("Y-m-d H:i:s", $data['ticket']->created) ?></p>      

      <?php
      foreach ($data['ticket']->comments as $comment) {
      ?>
      <p>
        <b><?= User::getById($comment->owner)->name ?></b> - <?= date("Y-m-d H:i:s", $comment->created) ?><br>
        <?= $comment->content ?>
      </p>
      <?php
      }
      ?>
      </ul>
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
