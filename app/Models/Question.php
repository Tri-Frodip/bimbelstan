<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function question_group()
    {
        return $this->hasOneThrough(QuestionGroup::class, Part::class,'question_group_id','id');
    }
}
