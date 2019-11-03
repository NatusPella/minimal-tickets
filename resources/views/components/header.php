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
                    <!--<li class="nav-item"><a href='?action=createTicket' class="nav-link"><i class="fas fa-plus"></i> Create</a></li>
                    <li class="nav-item"><a href='?action=ownerList' class="nav-link"><i class="fas fa-user"></i> My tickets</a></li>
                    <li class="nav-item"><a href='?action=handlerList' class="nav-link"><i class="fas fa-inbox"></i> My work</a></li>-->
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav">

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
                <!--<li class="nav-item"><a href='?action=profile' class="nav-link"><?= $_SESSION['currentUser']->name ?></a></li>
                <li class="nav-item"><a href='?action=logout' class="nav-link">Logout</a></li>-->
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
