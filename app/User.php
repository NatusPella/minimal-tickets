<?php

class User
{
  public $id;
  public $email;
  public $name;
  public $otp;

  public $role;

  public $created;
  public $updated;

  public function __construct($item)
  {
    $this->id = $item->id;
    $this->email = $item->email;
    $this->name = $item->name;
    $this->otp = $item->otp;

    $this->role = $item->role;

    $this->created = $item->created;
    $this->updated = $item->updated;
  }

  public function save()
  {
    Core::$settings->storageEngine::putItem("users", $this->id, $this);
  }

  public static function calculateId($email)
  {
    return hash("sha1", $email);
  }

  public static function getCollection()
  {
    return Core::$settings->storageEngine::getCollection("users")->users;
  }

  public static function getById($id)
  {
    return new User(Core::$settings->storageEngine::getItem("users", $id));
  }

  public static function getByIdOrFail($id)
  {
    $user = User::getById($id);
    if ($user->id == null){
      throw new Exception("User was not found");
    } else {
      return $user;
    }
  }

  public static function createFromEmail($email)
  {
    $userData = new stdClass();

    $userData->id = User::calculateId($email);
    $userData->email = $email;
    $userData->name = substr($email, 0, strpos($email, "@"));
    $userData->otp = "";

    $userData->role = "user";

    $userData->created = time();
    $userData->updated = time();

    $user = new User($userData);

    return $user;
  }

}
