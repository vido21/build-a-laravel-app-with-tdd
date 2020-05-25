<?php

namespace App\Observers;

use App\Task;

class TaskObserver
{
    /**
    * Handle the project "created" event.
    *
    * @param  \App\Project  $project
    * @return void
    */
    public function created(Task $task)
    {
        // $this->recordActivity('created', $project);
        $task->recordActivity('created_task');
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updated(Task $task)
    {
        // $this->recordActivity('updated', $project);
        // $project->recordActivity('updated');
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function deleted(Task $task)
    {
        $task->recordActivity('deleted_task');
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function restored(Task $task)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function forceDeleted(Task $task)
    {
        //
    }

    protected function recordActivity($type, $project)
    {
        // Activity::create([
        //     'project_id' => $project->id,
        //     'description' => $type
        // ]);
        // $project->recordActivity('updated');
    }
}
