<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $users = User::all();
        $parts = Part::all();
        $questions = Question::all();
        return view('dashboard', compact('users', 'parts', 'questions'));
    }
}
