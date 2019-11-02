<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col">
      <?php if (isset($data['ownedTickets']))
      {
        $tickets = $data['ownedTickets'];
        echo "<h2>My tickets</h2>";

      } else {
        $tickets = $data['handlerTickets'];
        echo "<h2>My work</h2>";
      }
      ?>
      <?php

      if (count($tickets) == 0) {
        echo "<p>There are no tickets to view in this list, you are all set</p>";
      } else {
        echo "<ul>";
        foreach ($tickets as $ticket) {
          echo "<li><a href='?action=ticket&id=" . $ticket->id . "'>" . $ticket->title . "</a></li>";
        }
        echo "</ul>";
      }
      ?>      
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
