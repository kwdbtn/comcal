<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Activity extends Model {
    use HasFactory, LogsActivity;

    protected $fillable = ['description', 'due_date', 'priority', 'status', 'delegate', 'user_group_id', 'remarks', 'attachment', 'created_by', 'due'];

    public function delegatex() {
        return UserGroup::find($this->delegate);
    }

    public function user_group() {
        return $this->belongsTo(UserGroup::class);
    }

    public function subactivities() {
        return $this->hasMany(SubActivity::class);
    }

    public function actions() {
        return $this->hasMany(ActivityAction::class);
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('user');
    }
}
