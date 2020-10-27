<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftsOnAir extends Model
{
    use HasFactory;
    public $table = 'gifts_on_airs';
    public $fillable = ['name','email','phone','purchased_from','date_of_purchase','serial_no','model_no','invoice_no','invoice_image'];
}
