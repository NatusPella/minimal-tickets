<?php

class Ticket
{
  public $id;

  public $owner;
  public $handler;

  public $title;
  public $tags;
  public $status;
  public $comments;

  public $created;
  public $updated;

  public function __construct($item)
  {
    $this->id = $item->id;

    $this->owner = $item->owner;

    $this->handler = $item->handler;
    $this->title = $item->title;
    $this->tags = $item->tags;
    $this->status = $item->status;
    $this->comments = $item->comments;

    $this->created = $item->created;
    $this->updated = $item->updated;
  }

  public function save()
  {
    Core::$storageEngine::putItem("tickets", $this->id, $this);
  }

  public function addComment($content)
  {
    $commentData = new stdClass();
    $commentData->owner = $_SESSION['currentUser']->id;
    $commentData->content = $content;
    $commentData->created = time();
    
    $this->comments = array_merge($this->comments, array($commentData));
  }

  public static function getCollection()
  {
    return Core::$storageEngine::getCollection("tickets")->tickets;
  }

  public static function getById($id)
  {
    return new Ticket(Core::$storageEngine::getItem("tickets", $id));
  }

  public static function getByIdOrFail($id){
    $ticket = Ticket::getById($id);
    if ($ticket->id == null){
      throw new Exception("Ticket was not found");
    }
    else {
      return $ticket;
    }
  }

  public static function createFromArray($data)
  {
    $ticketData = new stdClass();

    $ticketData->id = hash("sha1", time() + rand(0, 9999));

    $ticketData->owner = $_SESSION['currentUser']->id;
    $ticketData->handler = $_SESSION['currentUser']->id;

    $ticketData->title = $data['title'];
    $ticketData->tags = $data['tags'];

    $ticketData->status = "open";
    $ticketData->comments = array(
      array(
        "owner" => $ticketData->owner,
        //TODO Filter value
        "content" => $data['description'],
        "created" => time()
      )
    );

    $ticketData->created = time();
    $ticketData->updated = time();

    $ticket = new Ticket($ticketData);

    return $ticket;
  }

}
