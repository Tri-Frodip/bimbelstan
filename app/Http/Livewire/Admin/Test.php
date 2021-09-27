<?php

namespace App\Http\Livewire\Admin;

use App\Models\Test as ModelsTest;
use App\Models\TestGroup;
use Livewire\Component;

class Test extends Component
{
    public $test_name = '';
    public $token = '';
    public $time = 0;
    public $parts = [];
    public $action = 'store';

    public function mount(ModelsTest $test)
    {
        $this->tests = ModelsTest::all();
        $this->test_name = $test->test_name;
        $this->token = $test->token;
        $this->time = $test->time;
        $parts = $test->test_group->groupBy('part_id');
        foreach($parts as $part_id => $part){
            $ids = [];
            foreach($part->pluck('question_id')->toArray() as $p){
                $ids[$p] = true;
            }
            $this->parts[] = [
                'id'=>0,
                'part_id'=>$part_id,
                'total_question'=>0,
                'is_random'=>false,
                'questions'=> $ids,
                'kkm'=>$part->pluck('kkm')->max()
            ];
        }
        if($test->exists){
            $this->action = 'update('.$test->id.')';
        }
    }

    public function addPart()
    {
        $this->parts[] = [
            'id'=>0,
            'part_id'=>0,
            'total_question'=>'',
            'is_random'=>false,
            'questions'=>[],
            'kkm'=>''
        ];
    }

    public function generateToken()
    {
        $this->token = \Str::random(6);
    }

    public function store()
    {
        foreach($this->parts as $i => $part){
            if($part['is_random']){
                $ids = \App\Models\Part::find($part['part_id'])['questions']->pluck('id');
                $question_id = [];
                $ids = $ids->shuffle()->take($part['total_question'])->toArray();
                foreach($ids as $id){
                    $question_id[$id] = true;
                }
                $this->parts[$i]['questions'] = $question_id;
            }
        }
        $validate = $this->validate([
            'test_name' => 'required',
            'token' => 'required|min:5|max:6',
            'time' => 'required|numeric|min:10',
            'parts'=>'array|min:1',
            'parts.*.part_id'=>'required',
            'parts.*.questions'=>'array|min:5',
            'parts.*.kkm' => 'required|numeric|digits_between:0,100'
        ]);
        $validate['kkm'] = collect($validate['parts'])->pluck('kkm')->sum();
        $test_id = ModelsTest::create($validate)->id;
        foreach($validate['parts'] as $part){
            foreach($part['questions'] as $id => $question){
                if($question){
                    TestGroup::create([
                        'test_id'=>$test_id,
                        'part_id'=>$part['part_id'],
                        'question_id'=>$id,
                        'kkm'=>$part['kkm']
                    ]);
                }
            }
        }
        session()->flash('status', __('Test has been added'));
        return redirect()->route('admin.test.index');
    }

    public function update(ModelsTest $test)
    {
        foreach($this->parts as $i => $part){
            if($part['is_random']){
                $ids = \App\Models\Part::find($part['part_id'])['questions']->pluck('id');
                $question_id = [];
                $ids = $ids->shuffle()->take($part['total_question'])->toArray();
                foreach($ids as $id){
                    $question_id[$id] = true;
                }
                $this->parts[$i]['questions'] = $question_id;
            }
        }
        $validate = $this->validate([
            'test_name' => 'required',
            'token' => 'required|min:5|max:6',
            'time' => 'required|numeric|min:10',
            'parts'=>'array|min:1',
            'parts.*.part_id'=>'required',
            'parts.*.questions'=>'array|min:5',
            'parts.*.kkm' => 'required|numeric|digits_between:0,100'
        ]);
        $validate['kkm'] = collect($validate['parts'])->pluck('kkm')->sum();
        $test->update($validate);
        foreach($validate['parts'] as $part){
            $deleted_id = array_keys($part['questions'],false);
            $test->test_group->whereIn('question_id', $deleted_id)->each->delete();
            foreach($part['questions'] as $id => $q){
                if($q){
                    TestGroup::firstOrCreate([
                        'test_id'=>$test->id,
                        'part_id'=>$part['part_id'],
                        'question_id'=>$id,
                        'kkm'=>$part['kkm']
                    ]);
                }
            }
        }
        session()->flash('status', __('Test has been edited.'));
        return redirect()->route('admin.test.index');
    }

    public function render()
    {
        return view('livewire.admin.test');
    }
}
