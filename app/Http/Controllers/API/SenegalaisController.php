<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Senegalais\UpdateSenegalaisRequest;
use App\Http\Requests\Senegalais\CreateSenegalaisRequest;
use App\Http\Resources\Senegalais\SenegalaisResource;
use App\Models\Senegalais;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

class SenegalaisController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $senegalais = Senegalais::useFilters()->dynamicPaginate();

        return SenegalaisResource::collection($senegalais);
    }

    public function store(CreateSenegalaisRequest $request): JsonResponse
    {
        $senegalais = Senegalais::create($request->validated());

        return $this->responseCreated('Senegalais created successfully', new SenegalaisResource($senegalais));
    }

    public function show(Senegalais $senegalais): JsonResponse
    {
        return $this->responseSuccess(null, new SenegalaisResource($senegalais));
    }

    public function update(UpdateSenegalaisRequest $request, Senegalais $senegalais): JsonResponse
    {
        $senegalais->update($request->validated());

        return $this->responseSuccess('Senegalais updated Successfully', new SenegalaisResource($senegalais));
    }

    public function destroy(Senegalais $senegalais): JsonResponse
    {
        $senegalais->delete();

        return $this->responseDeleted();
    }

   public function restore($id): JsonResponse
    {
        $senegalais = Senegalais::onlyTrashed()->findOrFail($id);

        $senegalais->restore();

        return $this->responseSuccess('Senegalais restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $senegalais = Senegalais::withTrashed()->findOrFail($id);

        $senegalais->forceDelete();

        return $this->responseDeleted();
    }
}
