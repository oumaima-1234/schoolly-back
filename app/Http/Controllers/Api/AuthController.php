<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Directeur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // --------------------------------------------
    // REGISTER
    // --------------------------------------------
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:etudiant,professeur,directeur',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // --------------------------------------------
        // Create ETUDIANT
        // --------------------------------------------
        if ($user->role === 'etudiant') {
            Etudiant::create([
               
                'Nom'        => $request->name ,
                'Prenom'     => $request->prenom,
                'Email'      => $request->email,
                'role'     => $request->role,
                'user_id'    => $user->id,
                'Class'      => $request->Class,     // ATTENTION MAJUSCULE
               
               
            ]);
        }

        // --------------------------------------------
        // Create PROFESSEUR
        // --------------------------------------------
        if ($user->role === 'professeur') {
            Professeur::create([
                'Name'        => $request->name,
                'Email'       => $request->email,
                'user_id'     => $user->id,
                'Salary'      => $request->salary ?? 0,
                'Experience'  => $request->experience ?? 0,
                'Department'  => $request->Department,
                'Subject'     => $request->Subject,
            ]);
        }

        // --------------------------------------------
        // Create DIRECTEUR
        // --------------------------------------------
        if ($user->role === 'directeur') {
            Directeur::create([
                'Nom'       => $request->name,
                'Prenom'    => $request->prenom,
                'user_id'   => $user->id,
                'Telephone' => $request->Telephone,
                'Bureau'    => $request->Bureau,
                'CartePro'  => $request->CartePro,
            ]);
        }

        // Generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully.',
            'token'   => $token,
            'user'    => $user,
        ], 201);
    }

    // --------------------------------------------
    // LOGIN
    // --------------------------------------------
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Email or password incorrect'], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Logged in',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    // --------------------------------------------
    // ME
    // --------------------------------------------
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    // --------------------------------------------
    // LOGOUT
    // --------------------------------------------
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}

