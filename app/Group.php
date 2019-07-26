<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Group extends Model {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'join_code',
        'description',
    ];
    
    /**
     * Users pivot table
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
