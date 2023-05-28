<?php

namespace App\Listeners;

use App\Events\VideoViewer;

class IncreaseViewers
{
  /**
   * Create the event listener.
   */
  public function __construct()
  {

  }

  /**
   * Handle the event.
   */
  public function handle(VideoViewer $event): void
  {
    $this->UpdateViewer($event->video);
  }

  function UpdateViewer($video)
  {
    $video->view += 1;
    $video->save();
  }
}