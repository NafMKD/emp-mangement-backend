<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = "emp_id";
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'region', 'zone',  'city', 'house_no', 'martial_status', 'work_position', 'start_date', 'salary'
    ];

}
