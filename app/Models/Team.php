<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];

    /**
     * Get the catin associated with the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catin()
    {
        return $this->hasOne(Catin::class);
    }

    /**
     * Get the user associated with the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get all of the team_village for the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team_village()
    {
        return $this->hasMany(TeamVillage::class);
    }
}
