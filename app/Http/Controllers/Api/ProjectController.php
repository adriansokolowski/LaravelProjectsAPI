<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FindByIdRequest;
use App\Http\Requests\FindbystatusRequest;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\FindByIdResource;
use App\Http\Resources\FindByStatusResource;
use App\Models\Project;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(ProjectRequest $request)
    {
        $data = $request->all();
        Project::create($data);
    }

    public function updateExisting(ProjectRequest $request)
    {
        $data = $request->all();
        $project = Project::first();
        $project->update($data);
    }

    public function findByStatus(FindbystatusRequest $request)
    {
        $data = Project::whereIn('status', $request->status)->paginate(20);

        return FindByStatusResource::collection($data);
    }

    public function findById(Project $projectId)
    {
        return new FindByIdResource($projectId);
    }

    public function updateProject(Project $projectId, ProjectRequest $request)
    {
        $data = $request->all();
        $project = Project::find($projectId->id);
        $project->update($data);
    }

    public function destroy(Project $projectId)
    {
        $projectId->delete();
    }

}
