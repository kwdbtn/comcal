<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class UserGroup extends Model {
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'teamlead', 'active'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function teamleader() {
        return User::find($this->teamlead);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('user');
    }
}
