<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'recipient_id',
        'message',
        'is_read',
    ];

    /**
     * Get the assignee that the notification is for.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo(Assignee::class, 'recipient_id');
    }

    /**
     * Mark the notification as read.
     *
     * @return bool
     */
    public function markAsRead()
    {
        $this->is_read = true;
        return $this->save();
    }

    /**
     * Mark the notification as unread.
     *
     * @return bool
     */
    public function markAsUnread()
    {
        $this->is_read = false;
        return $this->save();
    }
}
