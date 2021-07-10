<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'code',
        'flag',
        'banner',
        'banner_caption',
        'country',
        'country_id'
    ];

    public $timestamps = false;

    public function advertisements()
    {
        return $this->belongsToMany(Advertisement::class, 'language_advertisements', 'language_id', 'advertisement_id');
    }

    /**
     * Preffered Languages
     *
     * @param string $language_id
     *
     * @return void
     */
    public static function preferred_languages($language_id)
    {
        $preffered_languages = Language::where('languages.id', $language_id)
            ->join('language_preferreds', 'languages.id', '=', 'language_preferreds.preferred_language_id')
            ->select(
                'languages.id',
                'languages.code',
                'languages.name',
                'languages.flag'
            )
            ->get();

        return $preffered_languages;
    }

    public static function has_preferred_language($language_id, $preffered_language_id)
    {
        return LanguagePreferred::where('language_id', $language_id)
        ->where('preferred_language_id', $preffered_language_id)
        ->exists();
    }
}
