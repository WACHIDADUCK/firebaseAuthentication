<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseAuthController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }

    // Métodos para registro, inicio de sesión, etc.
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        try {
            // Crear usuario en Firebase
            $user = $this->auth->createUserWithEmailAndPassword($request->email, $request->password);
            // Redirigir al usuario con un mensaje de éxito
            return back()->with('status', 'Registro exitoso');
        } catch (\Exception $e) {
            // Si ocurre un error, devolver a la página anterior con el mensaje de error
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
