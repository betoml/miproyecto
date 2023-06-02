<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PeliculasDetail extends Component
{

   
    public $response;

    public function mount()
    {
  
    }

    public function verVideo()
    {


        //session()->put('video_url', $this->response['url_1080']);

        // Redirigir a otra página
   
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.peliculas-detail', [
            'response' => $this->response,
        ]);
    }
}
