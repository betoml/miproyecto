<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class UltimasPeliculas extends Component
{
    public function render()
    {
        $token = session('token');
    
        $response = Http::withToken($token)->post('https://euforia-films.up.railway.app/api/ultimas-peliculas');
        
        return view('livewire.ultimas-peliculas', compact('response'));
    }
}
