<?php

require_once("app/Renderer.php");

require_once("app/User.php");
require_once("app/Ticket.php");

require_once("app/Storage.php");
require_once("app/MemoryCache.php");

class Core
{
  public static $storageEngine = "Storage";

  public static $defaultTags = array(
    "tag-general" =>"General",
    "tag-technical" => "Technical",
    "tag-premium" => "Premium"
  );

  public function initialize()
  {
    session_start();

    switch ($_GET['action']) {
      case 'ticket':
        $this->ticket();
        break;

      case 'createTicket':
        $this->createTicket();
        break;

      case 'addComment':
        $this->addComment();
        break;

      case 'loginVerify':
        $this->loginVerify();
        break;

      case 'login':
        $this->login();
        break;

      case 'logout':
        $this->logout();
        break;

      case 'profile':
        $this->profile();
        break;

      case 'handlerList':
        $this->handlerList();
        break;

      case 'ownerList':
        $this->ownerList();
        break;

      default:
        $this->ownerList();
        break;
    }
  }

  public static function isAuthenticated()
  {
    return isset($_SESSION['currentUser']);
  }

  public function createTicket()
  {
    if (Core::isAuthenticated()) {
      if (isset($_POST['title']))
      {
        $tags = array();
        foreach ($_POST as $key => $value) {
          if(strpos($key, "tag-") > -1)
          {
            //TODO Filter value
            $tags[$key] = Core::$defaultTags[$key];
          }
        }

        //TODO Filter value
        $ticket = Ticket::createFromArray(array(
          "title" => $_POST['title'],
          "description" => $_POST['description'],
          "tags" => $tags
        ));

        $ticket->save();

        Header("Location: ?action=ticket&id=" . $ticket->id);

      } else {
        $render = new Renderer();
        $render->render("createticket", array(
          "defaultTags" => Core::$defaultTags
        ));
      }
    } else {
      $this->login();
    }
  }

  public function addComment()
  {
    if (Core::isAuthenticated()) {
      $ticket = Ticket::getByIdOrFail($_GET['id']);
      $ticket->addComment($_POST['content']);
      $ticket->save();

      Header("Location: ?action=ticket&");

    } else {
      $this->login();
    }
  }

  public function ownerList()
  {
    if (Core::isAuthenticated()) {
        $allTickets = Ticket::getCollection();

        $ownedTickets = array();
        foreach ($allTickets as $ticket) {
          if ($ticket->owner == $_SESSION['currentUser']->id) {
            $ownedTickets[] = $ticket;
          }
        }

        $renderer = new Renderer();
        $renderer->render("list", array(
          "ownedTickets" => $ownedTickets,
        ));
    } else {
      $this->login();
    }
  }

  public function handlerList()
  {
    if (Core::isAuthenticated()) {
      $allTickets = Ticket::getCollection();
      $handlerTickets = array();
      foreach ($allTickets as $ticket) {
        if ($ticket->handler == $_SESSION['currentUser']->id) {
          $handlerTickets[] = $ticket;
        }
      }

      $renderer = new Renderer();
      $renderer->render("list", array(
        "handlerTickets" => $handlerTickets,
      ));

    } else {
      $this->login();
    }
  }

  public function login()
  {
    if (isset($_POST['email'])) {
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = trim($_POST['email']);
        $user = User::getById(User::calculateId($email));

        if ($user->email != $email)
        {
          $user = User::createFromEmail($email);
          $user->otp = hash("sha1", rand(-999999, 999999));
          $user->save();
        } else {
          $user->updated = time();
          $user->otp = hash("sha1", rand(-999999, 999999));
          $user->save();
        }

        $render = new Renderer();
        $render->render("login", array(
          "showSuccess" => true
        ));

        //TODO mail();
      }
      else {
        //TODO Throw error
      }
    } else {
      $render = new Renderer();
      $render->render("login", array(
        "showSuccess" => false
      ));
    }
  }

  public function loginVerify()
  {
    $user = User::getByIdOrFail(User::calculateId($_GET['email']));
    if($user->otp === $_GET['otp'])
    {
      $user->otp = hash("sha1", rand(-999999, 999999));
      $user->save();

      $_SESSION['currentUser'] = $user;

      //Header("Location: ");
      $this->ownerList();
    } else {
      echo "Invalid one-time-password";

      //$renderer = new Renderer();
      //$renderer->render("login", array());
    }
  }

  public function logout()
  {
    unset($_SESSION['currentUser']);
    //TODO REFRESH?
    $this->login();
  }

  public function profile()
  {
    if (Core::isAuthenticated()) {
      if (isset($_POST['name'])) {
        //
      } else {
        $renderer = new Renderer();
        $renderer->render("profile", array(
          "user" => User::getByIdOrFail($_SESSION['currentUser'])
        ));
      }
    } else {
      $this->login();
    }
  }

  public function ticket()
  {
    if (Core::isAuthenticated()) {
      $renderer = new Renderer();
      $renderer->render("ticket", array(
        "ticket" => Ticket::getByIdOrFail($_GET['id'])
      ));
    } else {
      $this->login();
    }
  }

}
