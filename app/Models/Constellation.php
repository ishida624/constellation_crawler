<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constellation extends Model
{
    use HasFactory;
    protected $table = 'constellation';
    public $primaryKey = 'id';
    protected $fillable = [
        'Today',
        'constellation_name',
        'total',
        'total_content',
        'love',
        'love_content',
        'work',
        'work_content',
        'money',
        'money_content',
    ];
}
