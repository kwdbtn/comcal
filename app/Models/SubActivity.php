<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubActivity extends Activity {
    use HasFactory;

    protected $fillable = ['description', 'due_date', 'completed', 'remarks'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
