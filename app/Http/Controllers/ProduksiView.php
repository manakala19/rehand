<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduksiView extends Controller
{
     function index(){
        $user = Auth::user();
        $data = produksi::orderBy('so', 'asc')->paginate();
        return view('pro.pages.dashboard',compact('user'), [
            'title' => 'Dashboard'
        ])->with('data', $data);
    }
    function admin(){
        $user = Auth::user();
        $data = produksi::orderBy('so', 'asc')->paginate(10);
        return view('pro.pages.lastupdate',compact('user'), [
            'title' => 'Dashboard'
        ])->with('data', $data);
    }
    public function show()
    {
        $user = Auth::user();
        return view('pro.pages.user', compact('user'), [
            'title' => 'Profile'
        ]);
    }
    function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Password Changed');
    }

    public function last(User $user){
        $user = Auth::user();
        $data = produksi::orderBy('so', 'asc')->join('users', 'users.nik', '=', 'produksi.user_id')->paginate();
        return view('pro.pages.last', compact('user'), [
            'title' => 'Info Updates'
        ])->with('data', $data);
    }
}
