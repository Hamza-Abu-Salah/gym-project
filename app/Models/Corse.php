<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corse extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class)->withDefault();
    }
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class,'course_id');
    }



}
