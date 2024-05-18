<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;    


class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', 'chauffeur')->first();
        $chauffeurs = $role->users;

        return response()->json($chauffeurs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|unique:users',
                'adresse' => 'required|string',
                'telephone' => 'required|string',
                'date_naissance' => 'required|date',
                'lieu_naissance' => 'required|string',
                'marque' => 'required|string',
                'matricule' => 'required|string',
                'cin' => 'required|string',
                'password' => 'required|string',
            ]);
    
            $chauffeur = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'date_naissance' => $request->date_naissance,
                'lieu_naissance' => $request->lieu_naissance,
                'marque' => $request->marque,
                'matricule' => $request->matricule,
                'cin' => $request->cin,
                'password' => Hash::make($request->password),
            ]);
            $chauffeur->assignRole('chauffeur');
    
            return response()->json(['message' => 'User created successfully', 'user' => $chauffeur], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User creation failed', 'error' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $chauffeur = User::find($id);
            if($chauffeur->hasRole('chauffeur')) {
                return response()->json($chauffeur);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User not found', 'error' => $th->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'nom' => 'required|string',
                'prenom' => 'required|string',
                'email' => 'required|unique:users,email,'.$id,
                'adresse' => 'required|string',
                'telephone' => 'required|string',
                'date_naissance' => 'required|date',
                'lieu_naissance' => 'required|string',
                'marque' => 'required|string',
                'matricule' => 'required|string',
                'cin' => 'required|string',
            ]);

            $chauffeur = User::find($id);

            if($chauffeur->hasRole('chauffeur')) {
                $chauffeur->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'date_naissance' => $request->date_naissance,
                    'lieu_naissance' => $request->lieu_naissance,
                    'marque' => $request->marque,
                    'matricule' => $request->matricule,
                    'cin' => $request->cin,
                ]);
                return response()->json(['message' => 'User updated successfully', 'user' => $chauffeur], 200);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User update failed', 'error' => $th->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $chauffeur = User::find($id);

            if($chauffeur->hasRole('chauffeur')) {
                $chauffeur->delete();
                return response()->json(['message' => 'User deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'User not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User deletion failed', 'error' => $th->getMessage()], 400);
        }
    }
}
