<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VideoPlayer extends Component
{



    public function render()
    {
       // $videoUrl = session('videoUrl');
        $videoUrl = 'https://www.dropbox.com/s/mai5h3cxp8xk9nj/640146.mp4?raw=1';

        return view('livewire.video-player', compact('videoUrl'));
    }
}
