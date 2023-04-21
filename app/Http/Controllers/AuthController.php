<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Planes;
use App\Models\Token_reset_passwords;
use \stdClass;

class AuthController extends Controller
{

    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'admin' => 'required|string|max:255',
            'telefonos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'planes_id' => 'required|string|max:255',
            'vencimiento_plan' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'username' => $request->username,
            'admin' => $request->admin,
            'telefonos' => $request->telefonos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'planes_id' => $request->planes_id,
            'vencimiento_plan' => $request->vencimiento_plan,
        ]);


        return response()->json([
            'message' => 'El usuario: ' . $request->username . ' ha sido creado con exito',
        ]);
    }
    public function login(Request $request)
    {


        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'code' => 1,
                'message' => 'La contraseña o usuario son incorrectos'
            ], 401);
        }



        $user = User::where('email', $request->email)->firstOrFail();

        $verificar = DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->get();
        $verificar = $verificar->count() + 1;
        $usrinfo = User::join('planes', 'planes.id', '=', 'users.id')
            ->select('*')
            ->where('email', $request->email)
            ->get();


        if ($verificar > $usrinfo[0]['dispositivos']) {

            return response()->json([
                'code' => 2,
                'message' => 'Numero de dispositivos ha superado el limite de su plan. Elimina las sesiones o actualiza tu plan.',
                'user' => $user
            ]);
        } else {
            $token = $user->createtoken('auth_token')->plainTextToken;

            return response()->json([
                'code' => 3,
                'message' => 'Bienvenido ' . $user->name,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
                'dispositivos' => $verificar
            ]);
        }
    }

    public function logouts(Request $id)
    {
        //auth()->user()->tokens()->delete();
        DB::table('personal_access_tokens')->where('tokenable_id', $id->id)->delete();
        return [
            'message' => 'Mensaje: Tokens eliminados'
        ];
    }

    public function verificarToken(Request $request)
    {
        $tkn = explode('|', $request->token);
        DB::table('personal_access_tokens')
            ->where('id', '=', $tkn[0])
            ->get();

        return response()->json(
            Auth::user()
        );
    }
    public function logout(Request $request)
    {
        /*         DB::table('personal_access_tokens')->where('token', md5($request->token))->delete();
        return [
            'message' => 'Mensaje: Tokens eliminados'
        ]; */

        $numberToken = explode('|', $request->token);

        DB::table('personal_access_tokens')->where('id', $numberToken['0'])->delete();
        return [
            'message' => 'Token eliminado, usuario hizo logout'
        ];
    }
    public function update(Request $request, user $users)
    {


        $usuarios  = DB::table('users')
            ->where('id', '=', $request->id)
            ->get();
        $usuario = $usuarios[0];


        $users = User::find($request->id);
        $users->nombres_users = isset($request->nombres) ? $request->nombres : $usuario->nombres_users;
        $users->apellidos = isset($request->apellidos) ? $request->apellidos : $usuario->apellidos;
        $users->username = isset($request->username) ? $request->username : $usuario->username;
        $users->admin = isset($request->admin) ? $request->admin : 0;
        $users->telefonos = isset($request->telefonos) ? $request->telefonos : $usuario->telefonos;
        $users->email = isset($request->email) ? $request->email : $usuario->email;
        $users->password = isset($request->password) ? Hash::make($request->password) : $usuario->password;
        $users->planes_id = isset($request->planes_id) ? $request->planes_id : $usuario->planes_id;
        $users->vencimiento_plan = isset($request->vencimiento_plan) ? $request->vencimiento_plan : $usuario->vencimiento_plan;
        $users->updated_at = isset($request->updated_at) ? $request->updated_at : date("Y/m/d");

        $users->save();






        return response()->json([
            'message' => 'Usuario: ' . $usuario->username . ' actualizado con exito'
        ]);
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:255',
        ]);

        $planes = User::destroy($request->id);


        return response()->json([
            'message' => 'Usuario eliminado con exito'
        ]);
    }
    public function userInfo(Request $request)
    {
        $request->validate([
            'id' => 'required|string|max:255',
        ]);
        $user =     User::find($request);
        return [
            "id" => strval($user['0']['id']),
            "nombres_users" =>  $user['0']['nombres_users'],
            "apellidos" => $user['0']['apellidos'],
            "username" =>  $user['0']['username'],
            "email" => $user['0']['email'],
            "admin" =>  $user['0']['admin'],
            "telefonos" => $user['0']['telefonos'],
            "planes_id" =>  strval($user['0']['planes_id']),
            "nombre_plan" =>  Planes::find($user['0']['planes_id'])->nombres_planes,
            "vencimiento_plan" => strval($user['0']['vencimiento_plan']),

        ];
    }
    public function createTokenResetPassword(Request $request)



    {

        $token_rand = rand(111111, 999999);

        $verificar = DB::table('token_reset_passwords')
            ->where('id_users', '=', $request->id_users)

            ->get();
        $contar = count($verificar);


        // return $ver->updated_at;

        $fechaComparar = date('Y-m-d') . ' 00:00:00';



        if ($contar > 0) {
            $ver = $verificar[0];
            if ($ver->updated_at == $fechaComparar) {
                return response()->json([
                    'message' => 'Solo puedes pedir una vez por día el token de seguridad.'
                ]);
            } else {

                DB::table('token_reset_passwords')
                    ->where('id', '=', $ver->id)
                    ->update([
                        'token' => $token_rand,
                        'intentos' => 0,
                        'updated_at' => date('Y-m-d')

                    ]);

                $sendiblue = DB::table('settings')
                    ->where('id', '=', 1)
                    ->get()
                    ->json();

                $usr =   DB::table('users')
                    ->where('id', '=', $request->id_users)
                    ->get();

                $send =     Http::withHeaders([
                    'api-key' => $sendiblue[0]->token_servicio_email,
                ])->post($sendiblue[0]->url_servicio_email, [

                    'sender' => [
                        "name" => $sendiblue[0]->sender_name_servicio_email,
                        "email" => $sendiblue[0]->sender_email_servicio_email
                    ],
                    "to" => [
                        [
                            "email" => $usr[0]->email,
                            "name" => $usr[0]->nombres_users
                        ]
                    ],
                    "htmlContent" => "<!DOCTYPE html><html lang='es'><head> <meta charset='UTF-8'> 
                <meta http-equiv='X-UA-Compatible' content='IE=edge'> <meta name='viewport' content='width=device-width, 
                initial-scale=1.0'> <title>Cambio de contraseña</title></head><body> <table style='width: 100%; background: red; text-align: center;'>
                 <tr > <td> <img style='width: 100%;max-width: 250px;min-width: 50px;padding: 20px;' 
                 src='https://img.mailinblue.com/5876301/images/content_library/original/6420d48916dc62286d328404.png'>
                  </td></tr></table> <table style='text-align: center; width: 100%; padding: 20px;'> <tr>
                  <td>Para continuar con el cambio de tu contraseña inserta este codigo:</td></tr><tr><td style='color: red;'>
                  <h1>$token_rand</h1>
                  </td></tr><tr><td>Si tu no solicitaste este codigo, cambia inmediatamente tu contraseña</td></tr>
                  </table> <table style='text-align: center; width: 100%;background: rgb(47, 47, 47);'>
                   <tr><td style='color: white;'>Enviado por:</td></tr><tr> <td> <img style='width: 150px;'
                    src='https://img.mailinblue.com/5876301/images/content_library/original/6420d48916dc62286d328404.png'>
                     </td></tr></table></body></html>",                "textContent" => "Please confirm your email address ",
                    "subject" => "Cambio de contraseña"

                ])->json();

                return response()->json([
                    'message' => 'Token de seguridad enviado a tu correo electronico.'
                ]);
            }
        } else {

                   $user = Token_reset_passwords::create([
                'id_users' => $request->id_users,
                'token' => $token_rand,
                'intentos' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')



            ]);


            $usr =   DB::table('users')
                ->where('id', '=', $request->id_users)
                ->get();

            $sendiblue = DB::table('settings')
                ->where('id', '=', 1)
                ->get();

            $send =     Http::withHeaders([
                'api-key' => $sendiblue[0]->token_servicio_email,
            ])->post($sendiblue[0]->url_servicio_email, [

                'sender' => [
                    "name" => $sendiblue[0]->sender_name_servicio_email,
                    "email" => $sendiblue[0]->sender_email_servicio_email
                ],
                "to" => [
                    [
                        "email" => $usr[0]->email,
                        "name" => $usr[0]->nombres_users
                    ]
                ],
                "htmlContent" => "<!DOCTYPE html><html lang='es'><head> <meta charset='UTF-8'> 
                <meta http-equiv='X-UA-Compatible' content='IE=edge'> <meta name='viewport' content='width=device-width, 
                initial-scale=1.0'> <title>Cambio de contraseña</title></head><body> <table style='width: 100%; background: red; text-align: center;'>
                 <tr > <td> <img style='width: 100%;max-width: 250px;min-width: 50px;padding: 20px;' 
                 src='https://img.mailinblue.com/5876301/images/content_library/original/6420d48916dc62286d328404.png'>
                  </td></tr></table> <table style='text-align: center; width: 100%; padding: 20px;'> <tr>
                  <td>Para continuar con el cambio de tu contraseña inserta este codigo:</td></tr><tr><td style='color: red;'>
                  <h1>$token_rand</h1>
                  </td></tr><tr><td>Si tu no solicitaste este codigo, cambia inmediatamente tu contraseña</td></tr>
                  </table> <table style='text-align: center; width: 100%;background: rgb(47, 47, 47);'>
                   <tr><td style='color: white;'>Enviado por:</td></tr><tr> <td> <img style='width: 150px;'
                    src='https://img.mailinblue.com/5876301/images/content_library/original/6420d48916dc62286d328404.png'>
                     </td></tr></table></body></html>",


                "textContent" => "Please confirm your email address ",
                "subject" => "Cambio de contraseña"

            ])->json();

            return response()->json([
                'message' => 'Token de seguridad enviado a tu correo electronico.'
            ]);
        }
    }
}
