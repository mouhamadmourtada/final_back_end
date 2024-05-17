<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Http\Requests\Note\CreateNoteRequest;
use App\Http\Resources\Note\NoteResource;
use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

class NoteController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $notes = Note::useFilters()->dynamicPaginate();

        return NoteResource::collection($notes);
    }

    public function store(CreateNoteRequest $request): JsonResponse
    {
        $note = Note::create($request->validated());

        return $this->responseCreated('Note created successfully', new NoteResource($note));
    }

    public function show(Note $note): JsonResponse
    {
        return $this->responseSuccess(null, new NoteResource($note));
    }

    public function update(UpdateNoteRequest $request, Note $note): JsonResponse
    {
        $note->update($request->validated());

        return $this->responseSuccess('Note updated Successfully', new NoteResource($note));
    }

    public function destroy(Note $note): JsonResponse
    {
        $note->delete();

        return $this->responseDeleted();
    }

   public function restore($id): JsonResponse
    {
        $note = Note::onlyTrashed()->findOrFail($id);

        $note->restore();

        return $this->responseSuccess('Note restored Successfully.');
    }

    public function permanentDelete($id): JsonResponse
    {
        $note = Note::withTrashed()->findOrFail($id);

        $note->forceDelete();

        return $this->responseDeleted();
    }
}
