<?php

namespace Modules\Priceplan\Actions;

use Modules\Priceplan\Entities\Priceplan;

class SortingPriceplan
{
    public static function sort($request)
    {
        $tasks = Priceplan::all();
        foreach ($tasks as $task) {
            $task->timestamps = false;
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
