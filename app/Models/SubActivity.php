<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubActivity extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'due_date', 'completed', 'remarks'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
