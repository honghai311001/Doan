<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $table = 'db_producer';
    public $timestamps = false;
    use HasFactory;
}
