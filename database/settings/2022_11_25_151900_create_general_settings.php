<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.name', config('app.name'));
        $this->migrator->add('general.logo', 'logo.png');
        $this->migrator->add('general.favicon', 'favicon.ico');
        $this->migrator->add('general.description', '');
        $this->migrator->add('general.copyright_text', '&copy;2022 all rights reserved.');
        $this->migrator->add('general.meta_keywords', '');
        $this->migrator->add('general.meta_description', '');
        $this->migrator->add('general.meta_author', '');
    }
}
