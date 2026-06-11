<?php

namespace App\Modules\Manage\Model;
use Illuminate\Database\Eloquent\Model;



class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'display_name',
        'description',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
}
