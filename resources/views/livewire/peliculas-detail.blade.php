<div>
    @extends('layout.app')

    @section('content')
        <style>
            .coverPrincipal {
                position: relative;
                width: 100%;
                height: 100vh;
                background-color: black;
                overflow: auto;
            }

            .coverPrincipal::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('https://www.themoviedb.org/t/p/original/mj2Z9HnRSIEk3n7yVPoOY4Uzzfh.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                opacity: 0.4;
                filter: blur(10px);
                -ms-filter: blur(10px);
            }

            .contentContainer {
                position: relative;
                z-index: 1;
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding-bottom: 50px;
                padding-bottom: 50px
            }
        </style>

        <div class="coverPrincipal mt-5">
            <div class="contentContainer">
                <!-- Contenido adicional aquí -->

                <div class="container mb-5">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <img class="img-fluid shadows-lg"
                                src="https://www.themoviedb.org/t/p/original/mj2Z9HnRSIEk3n7yVPoOY4Uzzfh.jpg" alt=""
                                srcset="">
                        </div>
                        <div class="col-md-9 text-white d-flex align-items-between">
                            <div class="row">
                                <div class="col-md-12">

                                    @if ($response && $response['status'] === 200)
                                        @foreach ($response['data'] as $pelicula)
                                        <h1>{{ $response['titulo'] }}</h1>
                                        @endforeach
                                    @endif
                                    
                                    <p>John Wick descubre un camino para derrotar a La Mesa. Pero antes de poder ganar su
                                        libertad, Wick deberá enfrentarse a un nuevo enemigo con poderosas alianzas en todo
                                        el mundo; y contra las fuerzas que convierten a viejos amigos en enemigos.</p>
                                </div>
                                <div class="col-md-12 ">
                                    <button wire:click='verVideo' class="btn w-100 colorPrincipal text-white">REPRODUCIR</button>
                                </div>
                       

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
