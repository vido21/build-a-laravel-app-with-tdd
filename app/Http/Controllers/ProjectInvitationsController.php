<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectInvitationRequest;
use Illuminate\Http\Request;
use App\Project;
use App\User;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project, ProjectInvitationRequest $request)
    {
        $userInvitation = User::whereEmail(request('email'))->first();
        $project->invite($userInvitation);
        return redirect($project->path());
    }
}
