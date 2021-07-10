<?php

namespace App\Helpers;

use Image;
use Request;
use File;

class ImageUploadHelper
{

  /**
  * [upload description]
  * @param  [type] $image           [description]
  * @param  [type] $file            [description]
  * @param  [type] $slug            [description]
  * @param  [type] $target_location [description]
  * @return [type]                  [description]
  */
  public static function upload($image, $file, $name, $target_location)
  {
    if(Request::hasFile($image)){
      $filename = $name . '.' . $file->getClientOriginalExtension();
      $location = ($target_location.'/'.$filename);
      Image::make($file)->save($location);
      return $filename;
    }
  }


  public static function update($image, $file, $name, $target_location, $old_location)
  {
    if(Request::hasFile($image)){
      $filename = $name. '.'.$file->getClientOriginalExtension();
      File::delete($target_location.'/'.$old_location);
      $location = ($target_location.'/'.$filename);
      Image::make($file)->save($location);
      return $filename;
    }
  }

  public static function delete($target_location)
  {
    if (File::exists($target_location)) {
      File::delete($target_location);
    }
  }

}
