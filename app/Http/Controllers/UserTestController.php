<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UserTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Gate::allows('test')){
            if(auth()->user()->price=='regular') $count = 1;
            else if(auth()->user()->price=='premium') $count = 3;
            else $count = 5;
            $result_test = TestResult::where('user_id', auth()->user()->id)->pluck('test_id')->toArray();
            $tests=Test::all()->take($count);
            return view('user.test.index', compact('tests', 'result_test'));
        }else{
            return redirect()->route('user.test.start');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        if(!Gate::allows('test')){
            if(auth()->user()->price=='regular') $count = 1;
            else if(auth()->user()->price=='premium') $count = 3;
            else $count = 5;
            $result_test = TestResult::where('user_id', auth()->user()->id)->pluck('test_id');
            $tests=Test::all()->take($count)->whereNotIn('id', $result_test)->pluck('id');
            if(!in_array($test->id, $tests->toArray())) return abort(404);
            return view('user.test.show', compact('test'));
        }else{
            return redirect()->route('user.test.start');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        if(auth()->user()->price=='regular') $count = 1;
        else if(auth()->user()->price=='regular') $count = 3;
        else $count = 5;
        $tests=Test::all()->take($count)->pluck('id');
        if(!in_array($test->id, $tests->toArray()))
            return abort(404);
        $v = Validator::make([], []);
        if($request->token!=$test->token){
            $v->getMessageBag()->add('token', __('Token is incorrect!'));
            return back()->withErrors($v)->withInput();
        }else{
            $encrypt = Crypt::encrypt($test->id);
            $time = Carbon::now('Asia/Jakarta')->addMinutes($test->time);
            $time = Crypt::encrypt($time);
            session(['test'=> $encrypt]);
            session(['time'=>$time]);
            return redirect()->route('user.test.start');
        }
    }

    public function test()
    {
        $this->middleware('test');
        $test_id = Crypt::decrypt(session('test'));
        $time = Crypt::decrypt(session('time'));
        $test = Test::find($test_id);
        return view('user.test.start', compact('test','time'));
    }

    public function results()
    {
        $results = TestResult::where('user_id', auth()->user()->id)->get();
        return view('user.test.result', compact('results'));
    }

}
