<?php

class Storage
{

 public function getCollection($type)
 {
   return json_decode(file_get_contents("storage/$type.json"));
 }

 public function getItem($type, $id)
 {
   $collection = json_decode(file_get_contents("storage/$type.json"))->$type;
   foreach ($collection as $item) {
     if ($item->id == $id) {
       return $item;
     }
   }
 }

 public function putItem($type, $id, $content)
 {
   $rawCollection = json_decode(file_get_contents("storage/$type.json"));
   $collection = $rawCollection->$type;

   $newItem = true;
   foreach ($collection as &$item) {
     if ($item->id == $id) {
       $item = $content;
       $newItem = false;
     }
   }

   if ($newItem) {
     $collection[] = $content;
   }

   $rawCollection->$type = $collection;

   file_put_contents("storage/$type.json", json_encode($rawCollection, JSON_PRETTY_PRINT));
 }

}
