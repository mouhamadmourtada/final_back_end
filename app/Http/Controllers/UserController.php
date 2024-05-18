<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cin' => 'required',
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'role' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getClients() {
        $role = Role::where('name', 'client')->first();
        $clients = $role->users;
        return view('admin.users.clients.index')->with('clients', $clients);
    }

    public function getChauffeurs() {
        $role = Role::where('name', 'chauffeur')->first();
        $chauffeurs = $role->users;
        return view('admin.users.chauffeurs.index')->with('chauffeurs', $chauffeurs);
    }

    // public function showChauffeur(string $id) {
    //     $chauffeur = User::find($id);
    //     return view('admin.users.chauffeurs.show')->with('chauffeur', $chauffeur);
    // }

    // ChauffeurController.php

    public function showChauffeur(string $id)
    {
        $chauffeur = User::find($id);
        $data = [
            'courses' => [10, 15, 8, 12, 20],
            'distances' => [100, 150, 80, 120, 200],
            'evaluations' => [5, 4.5, 4, 5, 3.5]
        ];
        return view('admin.users.chauffeurs.show', compact('chauffeur', 'data'));
    }


    public function showClient(string $id) {
        $client = User::find($id);
    
        $data = [
            'trips' => [3, 5, 2, 8, 4], 
            'distances' => [50, 100, 30, 200, 120],
            'expenses' => [150, 300, 90, 600, 360], 
        ];
    
        return view('admin.users.clients.show', compact('client', 'data'));


    }
    


}
