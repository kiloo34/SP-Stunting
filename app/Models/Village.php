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

    /**
     * Get the user associated with the Village
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the catin associated with the Village
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catin()
    {
        return $this->hasOne(Catin::class);
    }
}
