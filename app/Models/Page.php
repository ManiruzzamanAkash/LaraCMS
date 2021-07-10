<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'banner_image', 'image', 'description', 'meta_description', 'category_id', 'article_type_id', 'advertisement_ids',  'status', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

    protected $casts = [
        'advertisement_ids' => 'array'
    ];

    public static function checkHasAdvertisement($page_id, $advertisement_id)
    {
        $page = Page::find($page_id);
        if (!is_null($page)) {
            if (!is_null($page->advertisement_ids) && in_array($advertisement_id, $page->advertisement_ids)) {
                return true;
            }
        }
        return false;
    }

    /**
     * category
     *
     * @return object returns the category model as obejct
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function articleByCategory($category_id)
    {
        return Page::where('category_id', $category_id)->select('id', 'category_id', 'slug', 'title')->orderBy('id', 'desc')->get();
    }

    public static function articleByType($type_id)
    {
        return Page::where('article_type_id', $type_id)->select('id', 'category_id', 'slug', 'title')->orderBy('id', 'desc')->get();
    }

    public static function articleByTypeAndCategory($type_id, $category_id)
    {
        return Page::where('article_type_id', $type_id)
            ->where('category_id', $category_id)
            ->select('id', 'category_id', 'slug', 'title')
            ->orderBy('id', 'desc')->get();
    }

    public static function getPageData($args = [])
    {
        $data = [
            'pages' => [],
            'translation' => null
        ];

        $defaults = [
            'lang'            => 'en',
            'orderBy'         => 'desc',
            'orderByCol'      => 'id',
            'limit'           => 5,
            'type'            => 'page', // 1=article, 2=page, 3=blog
            'article_type_id' => 2,
            'paginate'        => false,
            'paginateNo'      => 20,
            'slug'            => null,
            'single'          => false,
            'single_column'   => 'pd' // pt=page_title, pd=page_description, pmd=page_meta_description
        ];

        $args = array_merge($defaults, $args);
        $lang = $args['lang'];

        $args['article_type_id'] = ($args['type'] === 'article') ? 1 : (($args['type'] === 'blog') ? 3 : 2);

        // // Find Language
        // $language = null;
        // if (!empty($args['language_code1'])) {
        //     $language = DB::table('languages')->select('id')->where('code', $args['language_code1'])->first();
        // }
        $query = DB::table('pages')->where('deleted_at', null)
            ->where('article_type_id', $args['article_type_id']);

        if (!empty($args['limit'])) {
            $query->limit($args['limit']);
        }

        if (!empty($args['orderByCol'])) {
            $query->orderBy($args['orderByCol'], $args['orderBy']);
        }

        if ($args['paginate']) {
            $query->paginate($args['paginateNo']);
        }

        if (!empty($args['slug'])) {
            $query->where('slug', $args['slug']);
        }

        // dd($args);
        if ($args['single']) {
            // if ($lang !== 'en') {
            $page = count($query->get()) > 0 ? $query->get()[0] : null;
            $data['pages'] = $page;

            if (!is_null($page)) {
                $data['translation'] = Page::getTranslationFromPage($page, $lang);
            }
        } else {
            $data['pages'] = $query->get();
            foreach ($data['pages'] as $key => $page) {
                $data['translation'][$page->id] = Page::getTranslationFromPage($page, $lang);
            }
        }
        return $data;
    }

    public static function getTranslationFromPage($page, $lang)
    {
        $data = [
            'title'            => '',
            'description'      => '',
            'meta_description' => ''
        ];

        if (!is_null($page)) {
            $page_translations = DB::table('terms')
                ->select($lang, 'key', 'page_id')
                ->where('page_id', $page->id)
                // ->where('key', $args['single_column'] . $page->id)
                ->get();

            foreach ($page_translations as $i => $trans) {
                $translated = $trans->$lang;
                $page_id    = $trans->page_id;
                $key        = $trans->key;

                if ($key ===  "pt$page_id") {
                    $data['title'] = $translated;
                }

                if ($key === "pd$page_id") {
                    $data['description'] = $translated;
                }

                if ($key === "pmd$page_id") {
                    $data['meta_description'] = $translated;
                }
            }

            if (empty($data['title'])) {
                $data['title'] = $page->title;
            }
            if (empty($data['description'])) {
                $data['description'] = $page->description;
            }
            if (empty($data['meta_description'])) {
                $data['meta_description'] = $page->meta_description;
            }

        }

        return $data;
    }
}
