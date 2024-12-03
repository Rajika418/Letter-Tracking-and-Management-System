<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the job positions associated with the department.
     *
     * This function establishes a one-to-many relationship with the JobPosition model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobPositions()
    {
        return $this->hasMany(JobPosition::class, 'department_id');
    }
}
