<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityAction extends Model {
    use HasFactory;

    protected $fillable = ['action_taken', 'challenge', 'actor'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function actorx() {
        return User::find($this->actor);
    }
}
