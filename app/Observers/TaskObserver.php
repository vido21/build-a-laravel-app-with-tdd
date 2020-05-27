<?php

namespace App\Observers;

use App\Task;

class TaskObserver
{
    public function created(Task $task)
    {
        // $this->recordActivity('created', $project);
        $task->recordActivity('created_task');
    }

    public function deleted(Task $task)
    {
        $task->recordActivity('deleted_task');
    }
}
