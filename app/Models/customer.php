<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $fillable=[
        'Name',
        'FatherName',
        'Cnic',
        'Email',
        'Contact',

    ];
    public function setNameAttribute($Name)
    {
        $this->attributes['Name']=strtoupper($Name);
    }
    public function setFatherNameAttribute($FatherName)
    {
        $this->attributes['FatherName']=ucfirst($FatherName);
    }
    public function GetFatherNameAttribute($FatherName)
    {
        return 'My name is '. ucfirst($FatherName);
    }
    // protected $casts = [
    //     'Contact' => 'date',
    // ];
}
