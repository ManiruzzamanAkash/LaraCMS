<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
{
    public ?string $facebook;

    public ?string $twitter;

    public ?string $youtube;

    public ?string $linkedin;

    public ?string $pinterest;

    public ?string $instagram;

    public static function group(): string
    {
        return 'social';
    }
}
