<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyListModel extends Model {

    protected $table = 'companylist';

    use HasFactory;
    
    
  
    protected $fillable = [
        'company_name'
    ];
      
    
}

