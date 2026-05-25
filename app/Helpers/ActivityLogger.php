<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    /**
     * Log user activity
     *
     * @param string $activityType
     * @param string $description
     * @return void
     */
    public static function log($activityType, $description)
    {
        if (Auth::check()) {
            ActivityLog::create([
                'activity_type' => $activityType,
                'description' => $description,
                'user_id' => Auth::id(),
            ]);
        }
    }
}
