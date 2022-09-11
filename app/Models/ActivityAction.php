<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ActivityAction extends Model {
    use HasFactory, LogsActivity;

    protected $fillable = ['action_taken', 'challenge', 'actor'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function actorx() {
        return User::find($this->actor);
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('user');
    }
}
