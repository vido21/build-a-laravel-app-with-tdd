<?php

namespace App\Http\Controllers;

use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $project = auth()->user()->projects()->create($this->validateRequest());

        return redirect($project->path());
    }

    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            return abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            return abort(403);
        }
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update($this->validateRequest());

        return redirect($project->path());
    }

    /**
     * Validate the request attributes.
     *
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);
    }
}
