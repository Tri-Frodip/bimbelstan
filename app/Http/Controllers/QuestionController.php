<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Part;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::all();
        return view('admin.question.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Part $part)
    {
        $choices = [
            ['text'=>'','is_correct'=>1],
            ['text'=>'','is_correct'=>2],
            ['text'=>'','is_correct'=>3],
            ['text'=>'','is_correct'=>4],
            ['text'=>'','is_correct'=>5],
        ];
        return view('admin.question.create', compact('part', 'choices'));
    }

    public function store(Request $request, Part $part)
    {
        if($part->format_validation=='normal'){
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
        $validate = $request->validate($validation,[
            'is_correct.required'=>__('Please choose one for the correct answer'),
            'choices.*.text.required' => __('The choices is required')
        ]);
        $question_id = Question::create([
            'part_id'=>$part->id,
            'question'=>$validate['question']
        ])->id;
        foreach($validate['choices'] as $i => $choice){
            if($part->format_validation=='normal'){
                Choice::create([
                    'question_id'=>$question_id,
                    'text'=>$choice['text'],
                    'is_correct'=>$validate['is_correct']==$i?5:0
                ]);
            }else{
                Choice::create(array_merge($choice, ['question_id'=>$question_id]));
            }
        }
        return redirect()->route('admin.question.show', $part)->with('status', __('Question has been added.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Part $question)
    {
        $ids = $question->questions->pluck('id');
        $questions = Question::whereIn('id', $ids)->paginate(10);
        return view('admin.question.show', compact('question', 'questions'));
    }


     public function edit(Part $part, Question $question)
    {
        $choices = $question->choices->toArray();
        return view('admin.question.edit', compact('part','question', 'choices'));
    }

}
