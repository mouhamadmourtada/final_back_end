<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DemandeActivation\UpdateDemandeActivationRequest;
use App\Http\Requests\DemandeActivation\CreateDemandeActivationRequest;
use App\Http\Resources\DemandeActivation\DemandeActivationResource;
use App\Models\DemandeActivation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

class DemandeActivationController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $demandeActivations = DemandeActivation::useFilters()->dynamicPaginate();

        return DemandeActivationResource::collection($demandeActivations);
    }

    public function store(CreateDemandeActivationRequest $request): JsonResponse
    {
        $demandeActivation = DemandeActivation::create($request->validated());

        return $this->responseCreated('DemandeActivation created successfully', new DemandeActivationResource($demandeActivation));
    }

    // public function show(DemandeActivation $demandeActivation): JsonResponse
    // {
    //     // gere tous les erreurs

    //     return $this->responseSuccess(null, new DemandeActivationResource($demandeActivation));
        
    // }

    public function show($id): JsonResponse
    {
        try {
            $demandeActivation = DemandeActivation::findOrFail($id);
            return $this->responseSuccess(null, new DemandeActivationResource($demandeActivation));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Demande not found'], 404);
        }
    }


    // public function update(UpdateDemandeActivationRequest $request, DemandeActivation $demandeActivation): JsonResponse
    // {

    //     try {
    //         $demandeActivation->update($request->validated());
    //         return $this->responseSuccess('DemandeActivation updated Successfully', new DemandeActivationResource($demandeActivation));
    //     } catch (\Exception $e) {
    //         return $this->responseError($e->getMessage(), $e->getCode());
    //     }
    // }



    public function update(UpdateDemandeActivationRequest $request, $id): JsonResponse
    {
        try {
            $demandeActivation = DemandeActivation::findOrFail($id);
            $demandeActivation->update($request->validated());
            return $this->responseSuccess('DemandeActivation updated Successfully', new DemandeActivationResource($demandeActivation));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Demande not found'], 404);
        }
    }


    // public function destroy(DemandeActivation $demandeActivation): JsonResponse
    // {
    //     $demandeActivation->delete();
    //     return $this->responseDeleted();
    // }



    public function destroy($id): JsonResponse
    {
        try {
            $demandeActivation = DemandeActivation::findOrFail($id);
            $demandeActivation->delete();
            return $this->responseDeleted();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Demande  not found'], 404);
        }
    }

    

    public function restore($id): JsonResponse
        {
            $demandeActivation = DemandeActivation::onlyTrashed()->findOrFail($id);
            $demandeActivation->restore();
            return $this->responseSuccess('DemandeActivation restored Successfully.');
        }

    public function permanentDelete($id): JsonResponse
    {
        $demandeActivation = DemandeActivation::withTrashed()->findOrFail($id);

        $demandeActivation->forceDelete();

        return $this->responseDeleted();
    }
}
