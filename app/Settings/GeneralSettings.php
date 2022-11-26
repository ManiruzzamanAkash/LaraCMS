<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $name;

    public ?string $logo;

    public ?string $favicon;

    public ?string $description;

    public ?string $copyright_text;

    public ?string $meta_keywords;

    public ?string $meta_description;

    public ?string $meta_author;

    public static function group(): string
    {
        return 'general';
    }
}
