<?php

namespace App\Traits;

trait StoreImage
{
  function saveImage($image, $path)
  {
    $image_extension = $image->getClientOriginalExtension();
    $image_name = time() . "." . $image_extension;
    $image->move($path, $image_name);
    return $image_name;
  }

}