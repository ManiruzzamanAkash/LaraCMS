<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateContactSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('contact.contact_no', '+00xxxxxx');
        $this->migrator->add('contact.phone', '+xxxx');
        $this->migrator->add('contact.email_primary', 'email@example.com');
        $this->migrator->add('contact.email_secondary', '');
        $this->migrator->add('contact.address', 'xxxx');
        $this->migrator->add('contact.working_day_hours', 'xxxx');
        $this->migrator->add('contact.map_lat', '');
        $this->migrator->add('contact.map_long', '');
        $this->migrator->add('contact.map_zoom', 11);
    }
}
