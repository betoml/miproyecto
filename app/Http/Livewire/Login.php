<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $response = Http::post('https://euforia-films.up.railway.app/api/login', [
            "email" => $this->email,
            "password" => $this->password
        ]);


        if ($response['code'] === 1) {
            session()->flash('mensaje', $response['message']);
        } 

        if ($response['code'] === 2) {
            session()->flash('eliminarSesiones', true);  
            session()->flash('id', $response['user']['id']);      } 
         if ($response['code'] === 3) {
            session()->put('id', $response['user']['id']);
            session()->put('nombre', $response['user']['nombres_users']);
            session()->put('token', $response['access_token']);
            return redirect()->route('home');
        }

        //dd($response);
    }

    public function eliminarSesiones($id)
    {
        $response = Http::post('https://euforia-films.up.railway.app/api/logouts?id='.$id);
        session()->flash('mensaje', $response['message']);
    }

    public function render()
    {
        return view('livewire.login');
    }
}
