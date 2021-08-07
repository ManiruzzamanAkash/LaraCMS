<?php

namespace Modules\Article\Entities;

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
        'title', 'slug', 'banner_image', 'image', 'description', 'meta_description', 'category_id', 'article_type_id',  'status', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

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
            'pages' => []
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

        $args['article_type_id'] = ($args['type'] === 'article') ? 1 : (($args['type'] === 'blog') ? 3 : 2);

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

        if ($args['single']) {
            $page = count($query->get()) > 0 ? $query->get()[0] : null;
            $data['pages'] = $page;
        } else {
            $data['pages'] = $query->get();
        }

        return $data;
    }
}
