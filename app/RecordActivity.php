<?php

namespace App;

trait RecordActivity
{
    public $oldAttributes = [];

    public static function bootRecordActivity()
    {
        // $recordableEvents = self::recordAbleEvents();

        foreach (self::recordAbleEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });

            if ($event === 'updated') {
                static::updating(function ($model) {
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }

    protected function activityDescription($description)
    {
        return "{$description}_" . strtolower(class_basename($this));
    }

    protected static function recordAbleEvents()
    {
        if (isset(static::$recordableEvents)) {
            return $recordableEvents = static::$recordableEvents;
        }
        return $recordableEvents = ['created', 'updated'];
    }

    public function recordActivity($description)
    {
        $this->activity()->create([
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project->id,
            'user_id' => ($this->project ?? $this)->owner->id,
        ]);
    }

    public function activityChanges()
    {
        if ($this->wasChanged()) {
            return
            [
                'before' => array_except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => array_except($this->getChanges(), 'updated_at')
            ];
        }
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }
}
