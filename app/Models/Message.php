<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    //HABILITAMOS LA ASIGNACION MASIVA, DONDE LE DECIMOS QUE NO SE MODIFIQUE EL CAMPO ID
    protected $guarded = ['id'];
}
