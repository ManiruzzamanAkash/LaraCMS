<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ContactSettings extends Settings
{
    public ?string $contact_no;

    public ?string $phone;

    public ?string $email_primary;

    public ?string $email_secondary;

    public ?string $address;

    public ?string $working_day_hours;

    public ?string $map_lat;

    public ?string $map_long;

    public ?string $map_zoom;

    public static function group(): string
    {
        return 'contact';
    }
}
