<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedWay extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'received_ways';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'way',
    ];

    /**
     * Get the entities (example: payments, orders, etc.) associated with the received way.
     *
     * This function should define a relationship based on the purpose of the `received_ways` table.
     * Replace `RelatedModel` with the appropriate model class.
     * Uncomment and modify as necessary.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function relatedEntities()
     {
        return $this->hasMany(Letter::class, 'way_id');
    }
}
