<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Créer un utilisateur simple
    public function register(Request $req)
    {
        $data = $req->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:1', // mot de passe normal
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // PAS DE HASH
            'role' => 'etudiant'
        ]);

        return response()->json($user, 201);
    }

    // Login simple, pas de hash
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $req->email)
                    ->where('password', $req->password) // mot de passe normal
                    ->first();

        if (!$user) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        // Générer un token simple aléatoire (pour test)
        $token = bin2hex(random_bytes(16));

        return response()->json([
            'user' => $user,
            // 'token' => $token
        ]);
    }

    // Déconnexion (pas de sanctum, juste retour message)
    public function logout(Request $req)
    {
        return response()->json(['message' => 'Déconnecté']);
    }

    // Récupérer l’utilisateur (pour test)
    public function me(Request $req)
    {
        return response()->json($req->user() ?? ['message' => 'Aucun utilisateur']);
    }
}
