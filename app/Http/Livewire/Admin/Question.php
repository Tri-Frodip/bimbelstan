<?php

namespace App\Http\Livewire\Admin;

use App\Models\Choice;
use App\Models\Part;
use App\Models\Question as ModelsQuestion;
use Livewire\Component;
use Livewire\WithPagination;

class Question extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['destroy'];

    public Part $part;
    public ModelsQuestion $modelQuestion;
    public $modalTitle;
    public $question;
    public $choices = [];
    public $is_correct;
    public $action;

    public function addQuestion()
    {
        $this->modalTitle = __('Add New Question').' '.__('for Number').' '.($this->part->questions->count()+1);
        $this->question = '';
        $this->action = 'store';
        if($this->part->format_validation=='normal'){
            $this->is_correct = '';
        }
        $this->choices = [
            ['text'=>'','is_correct'=>1],
            ['text'=>'','is_correct'=>2],
            ['text'=>'','is_correct'=>3],
            ['text'=>'','is_correct'=>4],
            ['text'=>'','is_correct'=>5],
        ];
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('show-modal',['id'=>'addQuestion']);
    }

    public function render()
    {
        $ids = $this->part->questions->pluck('id');
        $questions = ModelsQuestion::whereIn('id', $ids)->paginate(10);
        return view('livewire.admin.question', compact('questions'));
    }

    public function store()
    {
        if($this->part->format_validation=='normal'){
            $validation = [
                'question'=>'required',
                'is_correct'=>'required',
                'choices.*.text' => 'required'
            ];
        }else{
            $validation = [
                'question' => 'required',
                'choices.*.is_correct' => 'required',
                'choices.*.text' => 'required'
            ];
        }
        $validate = $this->validate($validation,[
            'is_correct.required'=>__('Please choose one for the correct answer')
        ]);
        $question_id = ModelsQuestion::create([
            'part_id'=>$this->part->id,
            'question'=>$validate['question']
        ])->id;
        foreach($validate['choices'] as $i => $choice){
            if($this->part->format_validation=='normal'){
                Choice::create([
                    'question_id'=>$question_id,
                    'text'=>$choice['text'],
                    'is_correct'=>$this->is_correct==$i?5:0
                ]);
            }else{
                Choice::create(array_merge($choice, ['question_id'=>$question_id]));
            }
        }
        $this->part=Part::find($this->part->id);
        $this->dispatchBrowserEvent('hide-modal',['id'=>'addQuestion']);
        $this->dispatchBrowserEvent('show-toast',[
            'icon'=>'success',
            'title' => __('Question has been added.')
        ]);
    }

    public function edit(ModelsQuestion $question)
    {
        $this->modelQuestion = $question;
        $this->modalTitle = __('Edit Question').' "'.\Str::limit($question->question, 60).'"';
        $this->question = $question->question;
        $this->action = 'update';
        $this->choices = $question->choices->toArray();
        if($this->part->format_validation=='normal'){
            foreach($this->choices as $i => $choice)
                if($choice['is_correct']==1||$choice['is_correct']==5) $this->is_correct = $i;
        }
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('show-modal',['id'=>'addQuestion']);
    }

    public function update()
    {
        if($this->part->format_validation=='normal'){
            $validation = [
                'question'=>'required',
                'is_correct'=>'required',
                'choices.*.text' => 'required'
            ];
        }else{
            $validation = [
                'question' => 'required',
                'choices.*.text' => 'required',
                'choices.*.is_correct' => 'required',
            ];
        }
        $validate = $this->validate($validation);
        $this->modelQuestion->update($validate);
        $this->modelQuestion->choices->each(function($item, $index)use($validate){
            if($this->part->format_validation=='normal'){
                $item->update([
                    'text'=>$validate['choices'][$index]['text'],
                    'is_correct'=>$this->is_correct==$index?5:0
                ]);
            }else{
                $item->update($validate['choices'][$index]);
            }
        });
        $this->reset('question','choices');
        $this->dispatchBrowserEvent('hide-modal',['id'=>'addQuestion']);
        $this->dispatchBrowserEvent('show-toast',[
            'icon'=>'success',
            'title' => __('Question has been edited.')
        ]);
    }

    public function delete($id)
    {
        $this->dispatchBrowserEvent('confirm-dialog',[
            'title' => __('Are you sure?'),
            'text' => __('The question will be deleted'),
            'confirmButtonText' => __('Yes'),
            'callable' => 'destroy',
            'data' => compact('id')
        ]);
    }

    public function destroy($data)
    {
        ModelsQuestion::find($data['id'])->delete();
        $this->dispatchBrowserEvent('show-toast', ['icon'=>'success','title'=>__('Question has been deleted')]);
    }

    public function resetValidate($index)
    {
        $this->resetValidation($index);
    }
}
