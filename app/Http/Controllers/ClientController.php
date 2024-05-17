<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', 'client')->first();
        $clients = $role->users;

        return response()->json($clients);
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
                'password' => 'required|string|min:8',
            ]);
    
            $client = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'adresse' => $request->adresse,
                'telephone' => $request->telephone,
                'date_naissance' => $request->date_naissance,
                'lieu_naissance' => $request->lieu_naissance,
                'password' => Hash::make($request->password),
            ]);
            $client->assignRole('client');
    
            return response()->json(['message' => 'User created successfully', 'user' => $client], 201);
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

            $client = User::find($id);
            if($client->hasRole('client')) {
                return response()->json($client);
            }
            return response()->json(['message' => 'User not found'], 404);
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
            ]);

            $client = User::find($id);

            if($client->hasRole('client')) {
                $client->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'date_naissance' => $request->date_naissance,
                    'lieu_naissance' => $request->lieu_naissance,
                ]);
                return response()->json(['message' => 'User updated successfully', 'user' => $client], 200);
            }

            return response()->json(['message' => 'User not found'], 404);
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
            $client = User::find($id);

            if($client->hasRole('client')) {
                $client->delete();
                return response()->json(['message' => 'User deleted successfully'], 200);
            }

            return response()->json(['message' => 'User not found'], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'User deletion failed', 'error' => $th->getMessage()], 400);
        }
    }
}
