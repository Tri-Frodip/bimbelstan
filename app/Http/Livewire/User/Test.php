<?php

namespace App\Http\Livewire\User;

use App\Models\TestResult;
use App\Models\Test as ModelsTest;
use App\Models\TestGroup;
use App\Models\Choice;
use App\Models\Part;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Test extends Component
{
    use WithPagination;

    public ModelsTest $test;
    public $time;
    public $diff;
    public $no = 1;
    public $answers = [];

    protected $listeners = ['getResult'];

    public function mount()
    {
        if(session()->has('answer')){
            $this->answers = json_decode(session('answer'), true);
        }
    }

    public function saveAnswer()
    {
        session(['answer'=>json_encode($this->answers)]);
    }

    public function getResult()
    {
        $part_count = [];
        $total_correct = 0;
        foreach($this->answers as $part_id => $answers){
            $part = Part::find($part_id);
            $part_count[$part->name] = 0;
            foreach($answers as $answer){
                $is_correct = Choice::find($answer)->is_correct;
                $total_correct += $is_correct;
                $part_count[$part->name] += $is_correct;
            }
        }
        TestResult::create([
            'user_id'=>auth()->user()->id,
            'test_id'=>$this->test->id,
            'total'=>$total_correct,
            'result'=>json_encode($part_count)
        ]);
        session()->forget(['test','time','answer']);
        session()->flash('status', __('Test successfuly finished'));
        return redirect()->route('user.test.index');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('time', $this->time);
        $diff = Carbon::now()->diff($this->time)->format('%H:%I:%S');
        $this->diff = $diff;
        $ids = $this->test->test_group->pluck('id');
        $questions = TestGroup::whereIn('id', $ids)->orderBy('part_id')->paginate(1);
        return view('livewire.user.test', compact('questions'));
    }
}
