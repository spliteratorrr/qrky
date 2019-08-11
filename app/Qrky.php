<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Group;

class Qrky extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
        'content', 
        'content_type',
        'description',
        'status',
        'location',
        'owner_id',
        'group_id',
        'deployed_at'
    ];

    /**
     * Get the owner of this QRC.
     */
    public function owner() {
        return User::find($this->owner_id)->first();
    }

    /**
     * Get the group of this QRC.
     */
    public function group() {
        return Group::find($this->group_id)->first();
    }

    /**
     * Get the deployment status of this QRC.
     */
    public function status() {
        switch($this->status) {
            case 0:
                return 'Not Deployed';
            case 1:
                return 'Deployed';
        }
    }
}
