<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use stdClass;

class StringHelper
{
    //For Generating Unique Slug
    public static function createSlug($title, $model, $field, $separator = "-", $isModule = false)
    {
        $model = ! $isModule ? 'App\Models\\' . $model : $model;
        $id = 0;

        $slug =  preg_replace('/\s+/', $separator, (trim(strtolower($title))));
        $slug =  preg_replace('/\?+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\#+/', $separator, (trim(strtolower($slug))));
        $slug =  preg_replace('/\/+/', $separator, (trim(strtolower($slug))));

        // $slug = preg_replace('!['.preg_quote($separator).']+!u', $separator, $title);

        // // Remove all characters that are not the separator, letters, numbers, or whitespace.
        // $slug = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($slug));

        // // Replace all separator characters and whitespace by a single separator
        $slug = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $slug);


        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = StringHelper::getRelatedSlugs($slug, $id, $model, $field);
        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains("$field", $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . $separator . $i;
            if (!$allSlugs->contains("$field", $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected static function getRelatedSlugs($slug, $id = 0, $model, $field)
    {
        return $model::select("$field")->where("$field", 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
    }



    public static function advanceUTFStrSlug($title, $separator = '-')
    {
        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title));

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

        return trim($title, $separator);
    }

    public static function modelToArray($model_objects)
    {
        $array = [];
        foreach ($model_objects as $obj) {
            $name = $obj->name;
            $title = ucwords(str_replace('_', ' ', $name));
            $title = ucwords(str_replace('.', ' ', $title));
            $permission = new stdClass();
            $permission->name = $name;
            $permission->title = $title;
            array_push($array, $permission);
        }
        return $array;
    }

    /**
     * stripTags()
     *
     * Strip any html text and returns string upto a specific characters
     *
     * @param string $text
     * @param integer $startLength
     * @param integer $length
     * @return void
     */
    public static function stripTags($text, $startLength = 0, $length = 100)
    {
        $mainText = strip_tags($text);
        $shortString = substr($mainText, $startLength, $length);
        return $shortString;
    }

    /**
     * Remove HTML from HTML type data
     *
     * @param string $text
     * @param integer $max_length
     *
     * @return string, removing all HTML element
     */
    public static function removeHTML($text, $max_length = -1)
    {
        $final_string = strip_tags($text);

        if( $max_length === -1 )
            return $final_string;

        $final_string = substr($final_string, 0, $max_length);

        return $final_string;
        // $tags   = array();
        // $result = "";

        // $is_open   = false;
        // $grab_open = false;
        // $is_close  = false;
        // $in_double_quotes = false;
        // $in_single_quotes = false;
        // $tag = "";

        // $i = 0;
        // $stripped = 0;

        // $stripped_text = strip_tags($text);

        // while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length) {
        //     $symbol  = $text{$i};
        //     $result .= $symbol;

        //     switch ($symbol) {
        //         case '<':
        //             $is_open   = true;
        //             $grab_open = true;
        //             break;

        //         case '"':
        //             if ($in_double_quotes)
        //                 $in_double_quotes = false;
        //             else
        //                 $in_double_quotes = true;

        //             break;

        //         case "'":
        //             if ($in_single_quotes)
        //                 $in_single_quotes = false;
        //             else
        //                 $in_single_quotes = true;

        //             break;

        //         case '/':
        //             if ($is_open && !$in_double_quotes && !$in_single_quotes) {
        //                 $is_close  = true;
        //                 $is_open   = false;
        //                 $grab_open = false;
        //             }

        //             break;

        //         case ' ':
        //             if ($is_open)
        //                 $grab_open = false;
        //             else
        //                 $stripped++;

        //             break;

        //         case '>':
        //             if ($is_open) {
        //                 $is_open   = false;
        //                 $grab_open = false;
        //                 array_push($tags, $tag);
        //                 $tag = "";
        //             } else if ($is_close) {
        //                 $is_close = false;
        //                 array_pop($tags);
        //                 $tag = "";
        //             }

        //             break;

        //         default:
        //             if ($grab_open || $is_close)
        //                 $tag .= $symbol;

        //             if (!$is_open && !$is_close)
        //                 $stripped++;
        //     }

        //     $i++;
        // }

        // while ($tags)
        //     $result .= "</" . array_pop($tags) . ">";

        // return $result;
    }
}
