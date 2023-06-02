<div>
    <div class="container mt-5 mb-5">
        <div class="col-md-12 tarjeta">
            <div class="row">

                <div class="container">
                    <div class="col-md-12 d-flex justify-content-between bg-dark " style="border-top: 30px">
                        <h3 class="text-white">ULTIMAS PELÍCULAS</h3>
                        <button class="btn btn-sm colorPrincipal text-white ">VER MÁS</button>
                    </div>
                    <div class="grid-container mt-3 mb-3">

                        @if ($response && $response->getStatusCode() === 200)
                            @php
                                $data = json_decode($response->getBody(), true);
                                
                            @endphp

                            @foreach ($data as $pelicula)
                                <div class="grid-item">
                                    <a href="/p/{{$pelicula['id_thmdb']}}">
                                        <img src="https://www.themoviedb.org/t/p/original/{{ $pelicula['img_thumb'] }}"
                                            class="w-100" alt="" srcset="">

                                    </a>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
