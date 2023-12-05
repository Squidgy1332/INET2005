<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $table = 'item';
    
    protected $fillable = ['title','category_id','description','price','quantity','SKU','Image'];

    public $timestamps = false;
}
