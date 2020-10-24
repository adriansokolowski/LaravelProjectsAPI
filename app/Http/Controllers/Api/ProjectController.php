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
    public function project(ProjectRequest $request)
    {
        $data = $request->all();
        $project = Project::create($data);
    }

    public function updateExisting(ProjectRequest $request)
    {
        $data = $request->all();
        $project = Project::first();
        $project->update($data);
    }

    public function findByStatus(FindbystatusRequest $request)
    {
        $data = Project::where('status', $request->status)->paginate(20);

        return FindByStatusResource::collection($data);
    }

    public function findById(Project $projectId)
    {

        return new FindByIdResource($projectId);
    }
}