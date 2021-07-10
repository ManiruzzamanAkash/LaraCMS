<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;

class WordRepository
{

    /**
     * Get Words
     *
     * @param string $language_code1
     * @param string $language_code2
     * @param int $chapter_id
     *
     * @return array words list as array
     */
    public function get_word_list($language_code1, $language_code2, $chapter_id)
    {
        $data = DB::table('words')
            ->select(
                'id',
                'en as default',
                'is_section',
                "$language_code1 as name1",
                "$language_code2 as name2",
            )
            ->where('chapter_id', intval($chapter_id))
            ->orderBy('order_nr', 'asc')
            ->get();
        return $data;
    }

    /**
     * Update Word
     *
     * @param string $code1
     * @param string $code2
     * @param string $data
     *
     * @return boolean|exception
     */
    public function update_word($code1, $code2, $data)
    {
        try {
            foreach ($data as $id => $val) {
                if( ! empty( $val ) ) {
                    $id  = (int) $id;
                    $val = (string) $val;

                    DB::statement("UPDATE words SET $code2 = '$val' WHERE id = $id LIMIT 1");
                }
            }
        } catch (\Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        return true;
    }
}
