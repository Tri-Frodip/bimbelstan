<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function test_group()
    {
        return $this->hasMany(TestGroup::class);
    }

    public function result()
    {
        return $this->hasMany(TestResult::class);
    }

    public function getMyResult()
    {
        return $this->result->where('user_id', auth()->user()->id)->first();
    }
}
