<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Temporadas extends Component
{
    public $temporadaId;
    public $temporadasList;
    public $selectedTemporadaData = [];

    public function mount($temporadaId)
    {
        $this->temporadaId = $temporadaId;
    }

    public function getTemporadaData($temporada)
    {
        $response = Http::withToken(session('token'))->post('https://euforia-films.up.railway.app/api/series-temporadas', [
            'id_thmdb_series' => $this->temporadaId,
            'temporada' => $temporada
        ]);

        if ($response->ok() && isset($response)) {
            $this->selectedTemporadaData = $response;
        } else {
            $this->selectedTemporadaData = [];
        }
    }

    public function render()
    {
        $response = Http::withToken(session('token'))->post('https://euforia-films.up.railway.app/api/series-temporadas', [
            'id_thmdb_series' => $this->temporadaId
        ]);

        if ($response->ok() && isset($response)) {
            $this->temporadasList = $response;
        } else {
            $this->temporadasList = [];
        }

        return view('livewire.temporadas');
    }
}