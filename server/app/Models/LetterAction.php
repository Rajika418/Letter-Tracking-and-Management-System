<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterAction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'letter_actions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'letter_id',
        'assignee_id',
        'action_id',
        'other_action',
        'date',
    ];

    /**
     * Get the letter associated with the letter action.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function letter()
    {
        return $this->belongsTo(Letter::class, 'letter_id');
    }

    /**
     * Get the assignee associated with the letter action.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignee()
    {
        return $this->belongsTo(Assignee::class, 'assignee_id');
    }

    /**
     * Get the action associated with the letter action.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id');
    }
}
