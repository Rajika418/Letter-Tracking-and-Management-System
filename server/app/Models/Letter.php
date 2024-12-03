<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'letters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no',
        'date',
        'way_id',
        'sender',
        'title',
        'assignee_id',
        'letter_pdf',
    ];

    /**
     * Get the received way associated with the letter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receivedWay()
    {
        return $this->belongsTo(ReceivedWay::class, 'way_id');
    }

    /**
     * Get the assignee associated with the letter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo(Assignee::class, 'assignee_id');
    }

    /**
     * Get the letter actions associated with the letter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function letterActions()
    {
        return $this->hasMany(LetterAction::class, 'letter_id');
    }
}
