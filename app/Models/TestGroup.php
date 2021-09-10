<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestGroup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
