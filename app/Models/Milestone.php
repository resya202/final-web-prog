<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $guarded = ["id"];

    public static function booting()
    {
        static::creating(function($model) {
            $model->status = "PROGRESS";
            $model->progress = "";
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function countTaskProgress()
    {
        $todo = $this->tasks()->where('status', 'TODO')->count();
        $progress = $this->tasks()->where('status', 'PROGRESS')->count();
        $done = $this->tasks()->where('status', 'DONE')->count();
        $cancel = $this->tasks()->where('status', 'CANCEL')->count();

        $this->progress = json_encode(compact('todo','progress','done','cancel'));
        return $this;
    }
}
