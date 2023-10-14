<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $data = User::where('nik', $id)->first();
        return view('user.pass',compact('user'), [
            'title' => 'Edit'
        ])->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::where('nik', $id)->first();
        $request->validate([
            'CurrentPassword' => [
                'required',
                function ($attribute, $value, $fail) use ($data) {
                    if (!Hash::check($value, $data->password)) {
                        $fail('Current Password is incorrect.');
                    }
                },
            ],
            'NewPassword' => 'required|min:6|different:CurrentPassword',
            'NewPasscom' => 'required|same:NewPassword',
        ], [
            'NewPassword.min' => 'Password must be at least 6 characters long.',
            'NewPasscom.same' => 'New Password and Confirm Password must match.',
            'NewPassword.different' => 'New Password must be different from the old password.',
        ]);

        $data = [
            'password' => Hash::make($request->input('NewPassword')),
        ];

        User::where('nik', $id)->update($data);
        return redirect('/pas/logout');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

