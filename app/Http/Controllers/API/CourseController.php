<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Resources\Course\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

class CourseController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $courses = Course::useFilters()->dynamicPaginate();

        return CourseResource::collection($courses);
    }

    public function store(CreateCourseRequest $request): JsonResponse
    {
        $course = Course::create($request->validated());

        return $this->responseCreated('Course created successfully', new CourseResource($course));
    }


    public function show(int $id): JsonResponse
    {
        try {
            $course = Course::find($id);
            if ($course) {
                return response()->json(new CourseResource($course));
            } else {
                return response()->json(['message' => 'Course not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Course not found', 'error' => $th->getMessage()], 404);
        }
    }

    // public function update(UpdateCourseRequest $request, Course $course): JsonResponse
    // {
    //     $course->update($request->validated());

    //     return $this->responseSuccess('Course updated Successfully', new CourseResource($course));
    // }


    
    
    
    public function update(UpdateCourseRequest $request, int $id): JsonResponse
    {
        try {
            

            $course = Course::find($id);
            if ($course) {
                $course->update($request->validated());
                return $this->responseSuccess('Course updated Successfully', new CourseResource($course));
            } else {
                return response()->json(['message' => 'Course not found'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to update Course', 'error' => $th->getMessage()], 400);
        }
        
    }

    // public function destroy(Course $course): JsonResponse
    // {
    //     $course->delete();

    //     return $this->responseDeleted();
    // }


    public function destroy(int $id): JsonResponse
    {
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            return $this->responseDeleted();
        } else {
            return response()->json(['message' => 'Course not found'], 404);
        }
    }

   public function restore($id): JsonResponse
    {
        $course = Course::onlyTrashed()->findOrFail($id);

        $course->restore();

        return $this->responseSuccess('Course restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $course = Course::withTrashed()->findOrFail($id);

        $course->forceDelete();

        return $this->responseDeleted();
    }
}
