<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamVillage extends Model
{
    use HasFactory;

    protected $table = 'team_villages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'team_id',
        'village_id',
    ];

    /**
     * Get the team that owns the TeamVillage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Get the village that owns the TeamVillage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
