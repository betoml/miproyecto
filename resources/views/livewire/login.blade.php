<div>
    <div class="col-md-12 tarjeta bgdarkgradient shadow-lg text-center ">
        <h1 class="text-white">LOGIN</h1>
        <div class="container">
            @if (session()->has('mensaje'))
                <div class="colorTxt">{{ session('mensaje') }}</div>
            @endif
            @if (session()->has('eliminarSesiones'))
                <button wire:click="eliminarSesiones({{ session('id') }})" class="btn colorPrincipal text-white w-100">
                    Click aquí para eliminar sesiones
                </button>
            @endif
            <form wire:submit.prevent="login">
                <div class="row">
                    <div class="col-md-12 mt-3 ">

                        <input wire:model="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-12 mt-3">

                        <input wire:model="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-md-12 mt-3 mb-3">

                        <button type="submit" class="btn colorPrincipal text-white w-100">INICIAR SESIÓN</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
