<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Company extends Model
{
    use HasFactory;
    protected $table ='companies';
    protected $fillable = 
    [ 
        'name',
        'email',
        'logo',
        'website',
        
    ];
    public function Employee()
    {
        return $this->BelongsTo(Employee::class);
    }
}
