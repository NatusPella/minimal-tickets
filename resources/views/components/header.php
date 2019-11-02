<!doctype html>
<html>
<head>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <title>Minimal Tickets</title>
</head>
<body>
  <div style="margin-bottom: 16px;">
  <!--<div class="container" style="margin-bottom: 16px;">
    <div class="row">
      <div class="col">-->
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
          <a class="navbar-brand" href="?action=ownerList">Minimal Tickets</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <?php
              if (Core::isAuthenticated()) {
              ?>
                <li class="nav-item"><a href='?action=createTicket' class="nav-link">Create</a></li>
                <li class="nav-item"><a href='?action=ownerList' class="nav-link">My tickets</a></li>
                <li class="nav-item"><a href='?action=handlerList' class="nav-link">My work</a></li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item"><a href='?action=logout' class="nav-link">Logout</a></li>
              <?php
              } else {
              ?>

              <?php
              }
              ?>
            </ul>
          </div>
        </nav>
      </div>
      <!--</div>
    </div>
  </div>-->
