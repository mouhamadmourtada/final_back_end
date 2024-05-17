<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Alert\UpdateAlertRequest;
use App\Http\Requests\Alert\CreateAlertRequest;
use App\Http\Resources\Alert\AlertResource;
use App\Models\Alert;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

class AlertController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $alerts = Alert::useFilters()->dynamicPaginate();

        return AlertResource::collection($alerts);
    }

    public function store(CreateAlertRequest $request): JsonResponse
    {
        $alert = Alert::create($request->validated());

        return $this->responseCreated('Alert created successfully', new AlertResource($alert));
    }

    public function show(Alert $alert): JsonResponse
    {
        return $this->responseSuccess(null, new AlertResource($alert));
    }

    public function update(UpdateAlertRequest $request, Alert $alert): JsonResponse
    {
        $alert->update($request->validated());

        return $this->responseSuccess('Alert updated Successfully', new AlertResource($alert));
    }

    public function destroy(Alert $alert): JsonResponse
    {
        $alert->delete();

        return $this->responseDeleted();
    }

   public function restore($id): JsonResponse
    {
        $alert = Alert::onlyTrashed()->findOrFail($id);

        $alert->restore();

        return $this->responseSuccess('Alert restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $alert = Alert::withTrashed()->findOrFail($id);

        $alert->forceDelete();

        return $this->responseDeleted();
    }
}
