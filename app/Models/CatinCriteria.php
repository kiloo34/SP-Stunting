<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatinCriteria extends Model
{
    use HasFactory;

    protected $table = 'catin_criterias';
    protected $primaryKey = 'id';

    protected $fillable = [
        'catin_id',
        'criteria_id',
        'value',
        'conversion',
    ];

    /**
     * Get the catin that owns the CatinCriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catin()
    {
        return $this->belongsTo(Catin::class, 'catin_id');
    }

    /**
     * The desa that belong to the CatinCriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function desa()
    {
        return $this->belongsToMany(Village::class, 'catin', 'id', 'village_id');
    }

    /**
     * Get the criteria that owns the CatinCriteria
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }
}
