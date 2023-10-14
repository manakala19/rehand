<?php

namespace App\Http\Controllers;

use App\Models\produksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = User::orderBy('nik', 'asc')->paginate();
        return view('pro.pages.ctrl',compact('user'), [
            'title' => 'AdminControl'
        ])->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('user.register',compact('user'), [
            'title' => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        Session::flash('nik', $request->nik);
        $request->validate([

            'NIK' => 'numeric|min:16',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'foto' => 'mimes:png,jpg,jpeg'
        ], [
            'NIK.numeric' => 'NIK Must Be Numeric',
            'NIK.min' => 'NIK Must Be 16 Character',
            'email.email' => 'Email Not Valid',
            'email.unique' => 'Email Hasbeen Used, please insert a different email',
            'password.min' => 'Password Minimum 6 Character',
            'foto.mimes' => 'Foto Only Allowed JPEG, JPG, PNG, GIF Only'
        ]);

        $foto = $request->file('foto');
        $foto_eks = $foto->extension();
        $foto_name = date('ymdhis') . "." . $foto_eks;
        $foto->move(public_path('foto'), $foto_name);

        $data = [
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password,),
            'foto' => $foto_name
        ];

        User::create($data);
        return redirect('data')->with('success', 'Input Data Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($produksi)
    {
        // $data = produksi::where('so', $produksi)->first();
        // return view('pro.pages.show', [
        //     'title' => 'Show'
        // ])->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($produksi, User $data)
    {
        $data = User::where('nik', $produksi)->first();
        return view('pro.pages.usredit',compact('data'), [
            'title' => 'User Edit'
        ])->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $produksi)
    {
        $request->validate([
            'total' => 'numeric',
            'output' => 'numeric',
            'foto' => 'mimes:png,jpg,jpeg,gif'

        ], [
            'total.numeric' => 'Total Must be numeric',
            'output.numeric' => 'Output Must be numeric',
            'foto.mimes' => 'Foto Only Allowed JPEG, JPG, PNG, GIF Only'
        ]);
        $data = [
            'brand' => $request->input('brand'),
            'artikel' => $request->input('artikel'),
            'total' => $request->input('total'),
            'output' => $request->input('output'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg,gif'
            ], [
                'foto.mimes' => 'Foto Only Allowed JPEG, JPG, PNG, GIF Only'
            ]);
            $foto = $request->file('foto');
            $foto_eks = $foto->extension();
            $foto_name = date('ymdhis') . "." . $foto_eks;
            $foto->move(public_path('foto'), $foto_name);

            $data_foto = produksi::where('so', $produksi)->first();
            File::delete(public_path('foto') . '/' . $data_foto->$foto);

            $data['foto'] = $foto_name;
        }

        produksi::where('so', $produksi)->update($data);
        return redirect('/admin')->with('success', 'Update Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($produksi)
    {
        $data = User::where('nik', $produksi)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        User::where('nik', $produksi)->delete();
        return redirect('admin')->with('success', 'Delete Successfully');
    }
}
