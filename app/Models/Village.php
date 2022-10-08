<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $table = 'villages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}