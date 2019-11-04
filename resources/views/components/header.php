<!doctype html>
<html>
<head>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <title>Minimal Tickets</title>
</head>
<body>
  <!--<div class="container">
    <div class="row">
      <div class="col py-1 mb-2">-->
        <nav class="navbar navbar-expand-md navbar-dark mb-4" style="background-color: #0094FF;">
          <a class="navbar-brand" href="?action=ownerList">Minimal Tickets</a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <?php
              if (Core::isAuthenticated()) {
              ?>
                <li class="nav-item"><a href='?action=index' class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ticket-alt"></i> Tickets
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href='?action=createTicket'><i class="fas fa-plus"></i> Create</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href='?action=handlerList'><i class="fas fa-inbox"></i> My work</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href='?action=ownerList'><i class="fas fa-user"></i> My tickets</a>
                  </div>
                </li>

                <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-user"></i> <?= $_SESSION['currentUser']->email ?>
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="?action=profile"><i class="fas fa-user"></i> My profile</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="?action=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                 </div>
                </li>
              <?php
              } else {
              ?>

              <?php
              }
              ?>
            </ul>
          </div>
        </nav>
      <!--</div>
    </div>
  </div>-=-->
