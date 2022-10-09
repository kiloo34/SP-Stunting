<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatinStatus extends Model
{
    use HasFactory;

    protected $table = 'catin_statuses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    /**
     * Get the catin associated with the CatinStatus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catin()
    {
        return $this->hasOne(Catin::class);
    }
}
