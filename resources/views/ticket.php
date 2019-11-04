<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 title="ID: <?= $data['ticket']->id ?>"> <?= $data['ticket']->title ?></h2>

      <p>
        <span class='badge badge-light'><i class="far fa-circle"></i> <?= ucfirst($data['ticket']->status) ?></span>

        <?php
        foreach ($data['ticket']->tags as $tagId => $tagValue) {
          echo "<span class='badge badge-light'><i class='fas fa-tag'></i> $tagValue</span>";
        }
        ?>

        <span class='badge badge-light'><i class="fas fa-user"></i> <?= User::getById($data['ticket']->owner)->name ?> (Owner)</span>
        <span class='badge badge-light'><i class="fas fa-user-tag"></i> <?= User::getById($data['ticket']->handler)->name ?> (Handler)</span>
        <span class='badge badge-light'><i class="fas fa-calendar-plus"></i> <?= date("Y-m-d H:i:s", $data['ticket']->updated) ?></span>
        <span class='badge badge-light'><i class="fas fa-calendar"></i> <?= date("Y-m-d H:i:s", $data['ticket']->created) ?></span>
      </p>

      <?php
      foreach ($data['ticket']->comments as $comment) {
      ?>
      <p>
        <b><i class="fas fa-user"></i> <?= User::getById($comment->owner)->name ?></b> <i class="fas fa-calendar"></i> <?= date("Y-m-d H:i:s", $comment->created) ?><br>
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
