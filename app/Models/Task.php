<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = ["id"];

    protected $casts = [
        "start_date" => "datetime",
        "end_date" => "datetime"
    ];

    public function assigned()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    public function notifyStatus()
    {
        //
    }
}
