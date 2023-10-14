<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi extends Model
{
    use HasFactory;
    protected $table = "produksi";

    protected $primaryKey = 'so';
    protected $fillable = ['so','brand','artikel','total','output','foto','user_id'];
}

