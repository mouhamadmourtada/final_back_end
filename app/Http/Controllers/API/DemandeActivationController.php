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

    public function show(DemandeActivation $demandeActivation): JsonResponse
    {
        return $this->responseSuccess(null, new DemandeActivationResource($demandeActivation));
    }

    public function update(UpdateDemandeActivationRequest $request, DemandeActivation $demandeActivation): JsonResponse
    {
        $demandeActivation->update($request->validated());

        return $this->responseSuccess('DemandeActivation updated Successfully', new DemandeActivationResource($demandeActivation));
    }

    public function destroy(DemandeActivation $demandeActivation): JsonResponse
    {
        $demandeActivation->delete();

        return $this->responseDeleted();
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
