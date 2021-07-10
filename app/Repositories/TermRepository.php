<?php

namespace App\Repositories;

use App\Models\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TermRepository
{

    /**
     * Get Terms List
     *
     * @return Array
     */
    public function get_terms_by_category()
    {
    }

    /**
     * Get Term List
     *
     * @param string $language_code1
     * @param string $language_code2
     *
     * @return void
     */
    public function get_term_list($language_code1, $language_code2)
    {
        $data = DB::table('terms')
            ->select(
                'id',
                'key',
                'en as default',
                "$language_code1 as name1",
                "$language_code2 as name2",
            )
            ->get();
        return $data;
    }


    /**
     * Get Term Detail By ID/Code/ Other SQL table's column
     *
     * @param string $column_name
     *
     * @param string $value
     *
     * @return Object $language Object
     */
    public function get_term_detail($column_name = 'id', $value)
    {

        if ($column_name === 'id') {
            $term = Term::find($value);
        } else {
            $term = Term::where($column_name, $value)->first();
        }

        return $term;
    }

    /**
     * Get term detail by key / column
     *
     * @param string $code1
     * @param string $code2
     * @param string $keyValue
     * @param string $column_name, default = key
     *
     * @return Object term object
     */
    public static function get_term_detail_by_key($code1, $code2, $keyValue, $column_name = 'key')
    {
        $term = DB::table('terms')
            ->where($column_name, $keyValue)
            ->select(
                "en as default",
                "$code1 as name1",
                "$code2 as name2",
            )
            ->limit(1)
            ->first();

        return $term;
    }

    /**
     * Insert Term
     *
     * Insert new term after model being created
     *
     * @param Object $data
     *
     * @return void
     */
    public static function insert_term_after_model_create($data)
    {
        $data['created_by'] = Auth::id();
        $term = Term::where('key', $data['key'])->first();
        if (!is_null($term)) {
            $term->update($data);
        } else {
            $term = Term::create($data);
        }

        return $term;
    }

    /**
     * Update terms
     *
     * @param string $code1
     * @param string $code2
     * @param object $data
     *
     * @return void
     */
    public function update_term($code1, $code2, $data)
    {
        try {
            foreach ($data as $id => $val) {
                if (!empty($val)) {
                    $id  = (int) $id;
                    $val = (string) $val;
                    Term::where('id', $id)->update([$code2 => $val]);
                }
            }
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
        return true;
    }

    /**
     * Update Term By Key
     *
     * @param string $key
     * @param string $column
     * @param string $value
     *
     * @return boolean
     */
    public static function update_term_by_key($check_by_column = 'id', $key, $column, $value)
    {
        $tr = new TermRepository();
        try {
            $term = $tr->get_term_detail($check_by_column, $key);
            if (!is_null($term)) {
                $term->update([
                    $column => $value
                ]);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function printTermByKey($key)
    {
    }
}
