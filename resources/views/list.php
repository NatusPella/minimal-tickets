<?php
global $data;
require_once("resources/views/components/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col mx-3">
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
        echo "
          <table class='table'>
           <thead>
            <tr>
              <th scope='col'>Ticket</th>
            </tr>
          </thead>
          <tbody>
        ";
        foreach ($tickets as $ticket) {
          echo "
            <tr>
              <td><a href='?action=ticket&id=" . $ticket->id . "'>" . $ticket->title . "</a></td>
            </tr>";
        }
        echo "
          </tbody>
          </table>";
      }
      ?>
    </div>
  </div>
</div>

<?php require_once("resources/views/components/footer.php"); ?>
