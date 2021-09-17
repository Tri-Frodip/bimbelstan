<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ChangeUserPassword;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    /**
     * Show all users
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::orderBy('name')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Create a user
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $action = new CreateNewUser;

        $action->create($request->all());

        return redirect()
            ->route('users.index')
            ->with('status', __('User created!'));
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'price'=>'required|in:regular,premium,gold',
            'name'=>'required|string',
            'phone'=>'required|numeric|digits_between:9,14',
            'email'=>'required|email|unique:users,email',
            'dob'=>'required|date',
            'gender'=>'required',
            'instance'=>'required',
            'password'=>'required|min:6|same:password_confirmation',
            'password_confirmation'=>'required'
        ]);
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        $prices = [
            'regular'=>20000,
            'premium'=>50000,
            'gold'=>100000
        ];
        return response()->json(['price'=>$prices[$validate['price']]]);
    }

    /**
     * Edit a user
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update user information
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $action = new UpdateUserProfileInformation;

        $action->update($user, $request->only('name', 'email', 'phone', 'dob','instance'));

        return redirect()
            ->route('users.index')
            ->with('status', __('User profile updated!'));
    }

    /**
     * Change user password
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function changePassword(User $user)
    {
        return view('users.edit-password', compact('user'));
    }

    /**
     * Update user password
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(User $user, Request $request)
    {
        $action = new ChangeUserPassword;

        $action->update($user, $request->all());

        return redirect()
            ->route('users.index')
            ->with('status', __('User password updated!'));
    }

    public function export()
    {
        $nama_file = 'laporan_users_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new UsersExport, $nama_file);
    }

    /**
     * Delete a user
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('status', __('User deleted!'));
    }
}
