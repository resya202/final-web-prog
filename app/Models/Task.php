<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
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
