<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeActivation;
use App\Models\User;

class DemandesController extends Controller
{
    public function index()
    {
        return view('admin.demandes.index')->with('demandes', DemandeActivation::paginate(5));
    }

    public function create()
    {
        return view('admin.demandes.create');
    }

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

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.demandes.show')->with('user', $user);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $demande = DemandeActivation::findOrFail($id);
        $demande->delete();
        return redirect()->route('demandes.index');
    }

    public function activate(string $id)
    {
        //
    }
}
