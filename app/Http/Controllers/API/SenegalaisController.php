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
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    // public function show(Senegalais $senegalais): JsonResponse
    // {
    //     return $this->responseSuccess(null, new SenegalaisResource($senegalais));
    // }

    
    public function show(int $id): JsonResponse
    {
        try {
            $senegalais = Senegalais::find($id);
            if ($senegalais) {
                return response()->json(new SenegalaisResource($senegalais));
            } else {
                return response()->json(['message' => 'Senegalais not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Senegalais not found', 'error' => $th->getMessage()], 404);
        }
    }

    public function update(UpdateSenegalaisRequest $request, int $senegalais): JsonResponse
    {
        try {
            $senegalais = Senegalais::find($senegalais);
            if ($senegalais) {
                $senegalais->update($request->validated());
                return $this->responseSuccess('Senegalais updated Successfully', new SenegalaisResource($senegalais));
            } else {
                return response()->json(['message' => 'Senegalais not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to update Senegalais', 'error' => $th->getMessage()], 400);
        }
        
    }

    public function destroy(int $senegalais): JsonResponse
    {
        $senegalais = Senegalais::find($senegalais);
        if ($senegalais) {
            $senegalais->delete();
            return $this->responseDeleted();
        } else {
            return response()->json(['message' => 'Senegalais not found'], 404);
        }
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
