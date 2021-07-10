<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'country',
        'company',
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'admin_id',
        'deleted_at',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at'
    ];

    public static function subjects()
    {
        $subjects = [
            'Services',
            'Cooperation',
            'Advertisement',
            'Other questions'
        ];
        return $subjects;
    }
}
