<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catin extends Model
{
    use HasFactory;

    protected $table = 'catin';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'nik',
        'no_hp',
        'age',
        'address',
        // 'status_id',
        // 'village_id'
    ];

    /**
     * Get the desa that owns the Catin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    /**
     * Get the status that owns the Catin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(CatinStatus::class, 'status_id');
    }
}