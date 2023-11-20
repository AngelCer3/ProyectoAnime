<?php

namespace App\Http\Controllers;

//use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SesionController extends Controller
{
    /* public function login(){
        $credenciales = request()->validate([
            'username' => ['required','string'],
            'password' => ['required','string'],
        ]);        
        if(Auth::attempt($credenciales,true)){
            request()->session()->regenerate();
            return redirect('/');
        }else{
            //return redirect()->route('login');;
            throw ValidationException::withMessages([
                'username' => 'Usuario o Contraseña no validos!'
            ]);
        }
    }
    */
    public function login(){
        $credenciales = request()->validate([
            'usuario' => ['required','string'],
            'password' => ['required','string'],
        ]);  

        
        $user = User::where('usuario', request()->usuario)->first();
        if($user){
            if(Hash::check(request()->password, $user->password)){
                Auth::login($user);
                request()->session()->regenerate();
                User::where('usuario', request()->usuario)->update(array('estado'=>'conectado'));
                return redirect('/');
            }else{
                throw ValidationException::withMessages([
                    'usuario' => 'Usuario o Contraseña no validos!'
                ]);
            }
        }else{
            throw ValidationException::withMessages([
                'usuario' => 'Usuario o Contraseña no validos!'
            ]);
        }
    }


    public function logout(){
        User::where('usuario',  Auth::user()->usuario)->update(array('estado'=>'desconectado'));
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');

    }

    public function registro_usuario(Request $request){

        request()->validate([
            'usuario' => ['required','string','min:4','max:30'],
            'password' => ['required','string','min:8','max:30'],
            'email' => ['required','string'],
        ]);  

        $email = User::where('email', request()->email)->first();
        $user = User::where('usuario', request()->usuario)->first();
        if($email){
            throw ValidationException::withMessages([
                'email' => 'Correo electronico ya registrado'
            ]);
        }elseif($user){
            throw ValidationException::withMessages([
                'usuario' => 'Usuario ya registrado'
            ]);
        }else{
            $usuario = new User();

            $usuario->usuario = $request->usuario;
            $usuario->password = Hash::make($request->password);
            $usuario->email = $request->email;
            $usuario->sexo = $request->sexo;

            $usuario->save();
            return redirect()->route('login');            
        }
    }
}
