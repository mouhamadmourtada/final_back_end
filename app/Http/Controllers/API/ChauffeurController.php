<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chauffeur\UpdateChauffeurRequest;
use App\Http\Requests\Chauffeur\CreateChauffeurRequest;
use App\Http\Resources\Chauffeur\ChauffeurResource;
use App\Models\Chauffeur;
use App\Models\DemandeActivation;
use App\Models\Fichier;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;

class ChauffeurController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $chauffeurs = Chauffeur::useFilters()->dynamicPaginate();

        return ChauffeurResource::collection($chauffeurs);
    }

    public function store(CreateChauffeurRequest $request): JsonResponse
    {


        $chauffeur = Chauffeur::create(
            [
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
                'marque' => $request->marque?? null,
                'annee_voiture' => $request->annee_voiture?? null,
                'matricule' => $request->matricule?? null,
                // 'cin'
            ]
        );
        
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid() && str_starts_with($image->getMimeType(), 'image/')) {
                $imagePath = $image->store("fichiers", "public");
                $chauffeur->image = $imagePath;

                
                $fichier = Fichier::create([
                    'url' => $imagePath,
                    'extension' => $image->extension(),
                    'nom' => 'image'.$chauffeur->id.now() .'.'.$image->extension(),
                    'fichierable_id' => $chauffeur->id,
                    'fichierable_type' => 'App\Models\Chauffeur',
                ]);
               
            }
        }
        // il faut faire pareil pour les autres fichiers
        if($request->hasFile('permis')) {
            $permis = $request->file('permis');
            if ($permis->isValid()) {
                $permisPath = $permis->store("fichiers", "public");
                $chauffeur->permis = $permisPath;
                
                $fichier = Fichier::create([
                    'url' => $permisPath,
                    'extension' => $permis->extension(),
                    'nom' => 'permis'.$chauffeur->id.now() .'.'.$permis->extension(),
                    'fichierable_id' => $chauffeur->id,
                    'fichierable_type' => 'App\Models\Chauffeur',
                ]);
                
            }
        }
        
        if($request->hasFile('carte_identite')) {
            $carte_identite = $request->file('carte_identite');
            if ($carte_identite->isValid()) {
                $carte_identitePath = $carte_identite->store("fichiers", "public");
                $chauffeur->carte_identite = $carte_identitePath;
                // $chauffeur->save();
                $fichier = Fichier::create([
                    'url' => $carte_identitePath,
                    'extension' => $carte_identite->extension(),
                    'nom' => 'carte_identite'.$chauffeur->id.now() .'.'.$carte_identite->extension(),
                    'fichierable_id' => $chauffeur->id,
                    'fichierable_type' => 'App\Models\Chauffeur',
                ]);
            }
        }

        $demandeAction = DemandeActivation::create([
            'etat' => 'cours',
            'user_id' => $chauffeur->id,
        ]);
        $demandeAction->save();
        
        $user = User::find($chauffeur->id);
        // le guard_name est chauffeur et pas web

        // $user->assignRole('chauffeur');
        // voici l'erreur rencontré
        // There is no role named `chauffeur` for guard `web
        $user->assignRole('chauffeur', 'chauffeur');

        return response()->json(['message' => 'Chauffeur created successfully', 'chauffeur' => $chauffeur], 201);

        return $this->responseCreated('Chauffeur created successfully', new ChauffeurResource($chauffeur));
    }

    public function show(Chauffeur $chauffeur): JsonResponse
    {
        return $this->responseSuccess(null, new ChauffeurResource($chauffeur));
    }

    public function update(UpdateChauffeurRequest $request, Chauffeur $chauffeur): JsonResponse
    {
        $chauffeur->update($request->validated());

        return $this->responseSuccess('Chauffeur updated Successfully', new ChauffeurResource($chauffeur));
    }

    public function destroy(Chauffeur $chauffeur): JsonResponse
    {
        $chauffeur->delete();

        return $this->responseDeleted();
    }

   
}
