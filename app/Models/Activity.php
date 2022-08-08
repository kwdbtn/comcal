<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model {
    use HasFactory;

    protected $fillable = ['description', 'due_date', 'completed', 'responsibility', 'recipient'];

    public function responsibilityx() {
        return UserGroup::find($this->responsibility);
    }

    public function recipientx() {
        return UserGroup::find($this->recipient);
    }
}
