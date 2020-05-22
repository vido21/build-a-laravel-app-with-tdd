<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_a_path()
    {
        $project = factory('App\Project')->create();
        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    public function a_project_belongs_to_its_owner()
    {
        $project = factory('App\Project')->create();
        $this->assertInstanceOf('App\User', $this->owner);
        $this->assertEquals($project->owner->id, $project->owner_id);
    }
}
