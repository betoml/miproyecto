<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminUsersController extends Controller
{
    public function index()
    {
        $token = session('token');
        $response = Http::withToken($token)->get('https://euforia-films.up.railway.app/api/usuarios');
        $users = $response->json();
        return view('admin.users', compact('users'));
    }
}
