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
        $this->middleware('auth')->except('bimbel', 'register_bimbel');
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

    public function bimbel($price)
    {
        return view('bimbel', compact('price'));
    }

    public function register_bimbel(Request $request, $price)
    {
        if(!in_array($price, ['silver', 'gold'])) return abort(404);
        $validate = $request->validate([
            'name'=>'required',
            'phone'=>'required|numeric|digits_between:9,14',
            'email'=>'required|email|unique:users,email,except,id',
            'dob'=>'required',
            'gender'=>'required||in:L,P',
            'instance'=>'required',
            'jurusan'=>'required',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password'
        ]);
        $validate['bimbel'] = $price;
        $validate['price'] = 'gold';
        $validate['instance'] .= '-'.$validate['jurusan'];
        User::create($validate);
        return redirect('/')->with('status', 'Register Bimbel berhasil');
    }
}
