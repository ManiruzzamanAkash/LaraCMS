<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSocialSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.facebook', 'https://facebook.com/example');
        $this->migrator->add('social.twitter', 'https://twitter.com/');
        $this->migrator->add('social.youtube', 'https://youtube.com/');
        $this->migrator->add('social.linkedin', 'https://linkedin.com/');
        $this->migrator->add('social.pinterest', 'https://pinterest.com/');
        $this->migrator->add('social.instagram', 'https://instagram.com/');
    }
}
