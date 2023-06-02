@extends('layout.app')

@section('title')
    Users
@endsection

@section('content')
<div class="container tarjeta" style="margin-top: 100px">
    <div id="mensaje" class="alert colorPrincipal text-white text-center">
        
    </div>
    <form id="add">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="nombres" placeholder="Nombre(s)">
            </div>
            <div class="col-md-6">
                <input type="text" name="apellidos"  placeholder="Apellido(s)">
            </div>
            <div class="col-md-6">
                <input type="text" name="username"  placeholder="Username">
            </div>
            <div class="col-md-6">
                <input type="text" name="email"  placeholder="Email">
            </div>
            <div class="col-md-6">
                <input type="password" name="password"  placeholder="Password">
            </div>
            <div class="col-md-6">
                <input type="text" name="admin"  placeholder="Admin">
            </div>
            <div class="col-md-6">
                <input type="text" name="telefonos"  placeholder="Telefono">
            </div>
            <div class="col-md-6">
                <input type="text" name="plan"  placeholder="Plan">
            </div>
            <div class="col-md-6">
                <input id="fecha" type="date" name="vencimiento" placeholder="Vencimiento">

            </div>
            <div class="col-md-12">
                <button type="submit" class="w-100"> Registrar</button>
            </div>
        </div>

    </form>
</div>
    <div class="container tarjeta text-white" style="margin-top: 50px">



<div class="col-md-12">
    <button>Add</button>
</div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr class=" text-white">
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Username</th>
                      <th>Admin</th>
                      <th>Email</th>
                      <th>Telefonos</th>
                      <th>Plan</th>
                      <th>Vencimiento Plan</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                @foreach ($users as $user)
                <tr class=" text-white">
                    <td >{{$user['nombres_users']}}</td>
                    <td>{{$user['apellidos']}}</td>
                    <td>{{$user['username']}}</td>
                    <td>{{$user['admin']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['telefonos']}}</td>
                    <td>{{$user['planes_id']}}</td>
                    <td>{{$user['vencimiento_plan']}}</td>
                    <td>
                        <button>Editar</button>
                        <button>Eliminar</button>
                    </td>
                  </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        var myForm = document.getElementById('add');

        myForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Evitar el envío tradicional del formulario

            var formData = new FormData(myForm);

            fetch('/buscar', {
                    method: 'POST',
                    body: formData
                })
                .then(function(response) {
                    const mensaje = document.getElementById('mensaje');
                    mensaje.innerHTML = response;
                   
                })
                .then(function(data) {
                    // Manejar la respuesta de la solicitud
                    console.log(data);
                })
                .catch(function(error) {
                    // Manejar errores
                    console.log(error);
                });
        });

        // Obtener la fecha actual
        var currentDate = new Date();
      
        // Calcular la fecha dentro de 90 días
        var futureDate = new Date();
        futureDate.setDate(currentDate.getDate() + 90);
      
        // Formatear la fecha en el formato 'yyyy-mm-dd'
        var formattedDate = futureDate.toISOString().split('T')[0];
      
        // Establecer el valor por defecto en el campo de fecha
        document.getElementById('fecha').value = formattedDate;
    </script>
@endsection
