<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Group extends Model {
    
    /**
     * Users pivot table
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
