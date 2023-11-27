<?php

namespace App\Services;

use App\Models\ActivityLog;

class ActivityLogService
{

    public static function saveLog($user_id,$action_by,$title,$desc)
    {
      ActivityLog::create([
        "user_id" => $user_id,
        "action_by" => $action_by,
        "title" => $title,
        "description" => $desc,
      ]);
    }
}
