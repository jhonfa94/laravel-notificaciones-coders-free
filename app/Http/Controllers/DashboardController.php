<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        # LISTADO DE USUARIOS PARA SELECCIONAR EL DESTINATARIO
        // $users = User::where('id','<>', auth()->user->id)->get();
        $users = User::where('id','<>', Auth::user()->id)->get();
        // $users = [];

        return view('dashboard', compact('users'));
    }
}
