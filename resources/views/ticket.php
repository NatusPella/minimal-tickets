<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col mx-3">
      <h2 title="ID: <?= $data['ticket']->id ?>"> <?= $data['ticket']->title ?></h2>

      <p>
        <span class="text-warning">
            <i class="far fa-circle"></i> <?= ucfirst($data['ticket']->status) ?>
        </span>

        <span class="text-secondary">
            <i class="fas fa-calendar-plus"></i> <?= date("Y-m-d H:i", $data['ticket']->updated) ?>
            <i class="fas fa-calendar"></i> <?= date("Y-m-d H:i", $data['ticket']->created) ?>
        </span>

        <br>

        <span class="text-info">
            <i class="fas fa-user"></i> <?= User::getById($data['ticket']->owner)->name ?> (Owner)
            <i class="fas fa-user-tag"></i> <?= User::getById($data['ticket']->handler)->name ?> (Handler)
        </span>

        <span class="text-secondary">
        <?php
        foreach ($data['ticket']->tags as $tagId => $tagValue) {
          echo "<i class='fas fa-tag'></i> $tagValue ";
        }
        ?>
        </span>
      </p>

      <?php
      foreach ($data['ticket']->comments as $comment) {
      ?>
      <p>
        <b><i class="fas fa-user"></i> <?= User::getById($comment->owner)->name ?></b> <i class="fas fa-calendar"></i> <?= date("Y-m-d H:i", $comment->created) ?><br>
        <?= $comment->content ?>
      </p>
      <?php
      }
      ?>

      <form action="?action=addComment&id=<?= $data['ticket']->id ?>" method="POST">

      </form>
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
