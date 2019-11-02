<?php

class Renderer
{
  public function render($view, $renderData)
  {
    global $data;
    $data = $renderData;
    require_once("resources/views/$view.php");
  }
}
