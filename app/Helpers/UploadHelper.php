<?php

namespace App\Helpers;

use Image;
use Request;
use File;

class UploadHelper
{

  /**
   * upload Upload Any Types of File. It's not checking the file type which may be checked before pass here in validation
   * @param  [type] $f               [request for file or not]
   * @param  [type] $file            [pdf file]
   * @param  [type] $name            [filename]
   * @param  [type] $target_location [location where file will store]
   * @return [type]                  [filename]
   */
  public static function upload($f, $file, $name, $target_location)
  {

    if (Request::hasFile($f)) {
      $filename = $name . '.' . $file->getClientOriginalExtension();
      $extension = $file->getClientOriginalExtension();
      $file->move($target_location, $filename);
      return $filename;
    } else {
      return NULL;
    }
  }


  /**
   * [update file]
   * @param  [type] $f               [request for file or not]
   * @param  [type] $file            [pdf file]
   * @param  [type] $name            [filename]
   * @param  [type] $target_location [location where file will store]
   * @param  [type] $old_location    [file location which will delete]
   * @return [type]                  [filename]
   */
  public static function update($f, $file, $name, $target_location, $old_location)
  {
    //delete the old notice file
    $target_location = $target_location . '/';
    if (File::exists($target_location . $old_location)) {
      File::delete($target_location . $old_location);
    }

    $filename = $name . '.' . $file->getClientOriginalExtension();
    $file->move($target_location, $filename);
    return $filename;
  }


  /**
   * [delete file]
   * @param  [type] $location [file location that will delete]
   * @return [type]                  [null]
   */
  public static function deleteFile($location)
  {
    if (File::exists($location)) {
      File::delete($location);
    }
  }
}
