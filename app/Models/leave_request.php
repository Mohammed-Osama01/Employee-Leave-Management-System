<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'leave_type_id',
        'start_date',
        'duration_days',
        'user_id',
        'status',
        'reason'
    ];


    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
