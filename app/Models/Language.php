<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;


class Language extends Model
{
    
    use HasFactory , LogsActivity, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'code',
        'app_language_code',
        'rtl',
        'auth_id', 
    ];

    protected static $recordEvents = ['created','updated','deleted'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Language') // Set custom log name
        ->logOnly(['uuid','name','code','app_language_code','rtl','auth_id','created_at','updated_at','deleted_at'])
        ->setDescriptionForEvent(fn(string $eventName) => "Language {$eventName} successfully"); 
    }

}
