<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Planes;
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

    public function verificarToken(Request $request){
        $tkn = explode('|', $request->token);
        DB::table('personal_access_tokens')
        ->where('id' ,'=', $tkn[0])
        ->get();

        return Auth::user();
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
}
