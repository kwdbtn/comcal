<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SubActivity extends Activity {
    use HasFactory, LogsActivity;

    protected $fillable = ['activity_id', 'description', 'completed', 'remarks'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function getActivitylogOptions(): LogOptions {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('user');
    }
}
