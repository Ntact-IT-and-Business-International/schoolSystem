<?php

namespace App\Traits;

trait SaveToFolder
{
    /**
     * this function saves to a folder
     */
    public static function saveItemToFolder($path, $file)
    {
        $saved_item_name = $file->getClientOriginalName();
        $file->storeAs('public/'.$path, $saved_item_name);

        return $saved_item_name;
    }
}
