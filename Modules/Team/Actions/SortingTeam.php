<?php

namespace Modules\Team\Actions;

use Modules\Team\Entities\Team;

class SortingTeam
{
    public static function sort($request)
    {
        $tasks = Team::all();
        foreach ($tasks as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }

        return true;
    }
}
