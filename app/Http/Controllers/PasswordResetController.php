<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    // Enviar el token por correo
    public function sendResetToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuarios,email'
        ]);

        // Generar un token de 6 números aleatorios
        $token = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Guardar el token en la base de datos
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]
        );

        // Enviar el correo con el token
        Mail::send('emails.password-reset', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Restablecimiento de Contraseña');
        });

        // Devolver una respuesta JSON
        return response()->json([
            'success' => true,
            'message' => '¡Hemos enviado un token para restablecer tu contraseña!'
        ]);
    }

    // Validar el token
    public function validateToken(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuarios,email',
            'token' => 'required|digits:6' // Asegura que el token tenga exactamente 6 dígitos
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if (!$record || !Hash::check($request->token, $record->token)) {
            return response()->json([
                'success' => false,
                'message' => 'El token es inválido o ha expirado.'
            ], 422);
        }

        // Redirigir a la ruta de restablecimiento de contraseña
        return response()->json([
            'success' => true,
            'redirect' => route('password.reset.form', ['email' => $request->email])
        ]);
    }
    
    // Mostrar el formulario de cambio de contraseña
    public function showResetForm($email)
    {
        return view('auth.password-reset', compact('email'));
    }

    // Procesar el cambio de contraseña
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usuarios,email',
            'password' => 'required|confirmed|min:8'
        ]);

        // Actualizar la contraseña
        DB::table('usuarios')->where('email', $request->email)->update([
            'password' => bcrypt($request->password),
        ]);

        // Eliminar el token utilizado
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', '¡Contraseña actualizada exitosamente!');
    }
}