<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course_client\UpdateCourse_clientRequest;
use App\Http\Requests\Course_client\CreateCourse_clientRequest;
use App\Http\Resources\Course_client\Course_clientResource;
use App\Models\Course_client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

class Course_clientController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $course_clients = Course_client::useFilters()->dynamicPaginate();

        return Course_clientResource::collection($course_clients);
    }

    public function store(CreateCourse_clientRequest $request): JsonResponse
    {
        $course_client = Course_client::create($request->validated());

        return $this->responseCreated('Course_client created successfully', new Course_clientResource($course_client));
    }

    public function show(Course_client $course_client): JsonResponse
    {
        return $this->responseSuccess(null, new Course_clientResource($course_client));
    }

    public function update(UpdateCourse_clientRequest $request, Course_client $course_client): JsonResponse
    {
        $course_client->update($request->validated());

        return $this->responseSuccess('Course_client updated Successfully', new Course_clientResource($course_client));
    }

    public function destroy(Course_client $course_client): JsonResponse
    {
        $course_client->delete();

        return $this->responseDeleted();
    }

   public function restore($id): JsonResponse
    {
        $course_client = Course_client::onlyTrashed()->findOrFail($id);

        $course_client->restore();

        return $this->responseSuccess('Course_client restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $course_client = Course_client::withTrashed()->findOrFail($id);

        $course_client->forceDelete();

        return $this->responseDeleted();
    }
}
