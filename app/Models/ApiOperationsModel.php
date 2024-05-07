<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiOperationsModel extends Model {

    protected $table = 'api_operations';

   
    use HasFactory;

    protected $attributes = [
        'group_id' => '1',
        'session_id' => '1'
    ];
    protected $fillable = [
        'token'
    ];
}
