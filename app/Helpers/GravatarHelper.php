<?php

namespace App\Helpers;

class GravatarHelper
{

  /**
   * validate_gravatar
   *
   * Check if the email has any gravatar image or not
   *
   * @param  string $email Email of the User
   * @return boolean true, if there is an image. false otherwise
   */
  public static function validate_gravatar($email)
  {
    try {
      $hash = md5($email);
      $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
      $headers = @get_headers($uri);
      if (!preg_match("|200|", $headers[0])) {
        $has_valid_avatar = FALSE;
      } else {
        $has_valid_avatar = TRUE;
      }
      return $has_valid_avatar;
    } catch (\Throwable $th) {
      return false;
    }
  }

  /**
   * gravatar_image
   *
   *  Get the Gravatar Image From An Email address
   *
   * @param  string $email User Email
   * @param  integer $size  size of image
   * @param  string $d     type of image if not gravatar image
   * @return string        gravatar image URL
   */
  public static function gravatar_image($email, $size = 0, $d = "")
  {
    $hash = md5($email);
    $image_url = 'http://www.gravatar.com/avatar/' . $hash . '?s=' . $size . '&d=' . $d;
    return $image_url;
  }
}
