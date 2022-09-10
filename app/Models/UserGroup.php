<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {
    use HasFactory;

    protected $fillable = ['name', 'teamlead', 'active'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function teamleader() {
        return User::find($this->teamlead);
    }
}
