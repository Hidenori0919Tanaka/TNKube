<?php

namespace App\Models\API;

class ExtractData
{
    /**
     *
     */
    public function extract_snippect(object $data)
    {
        $items = collect($data)->pluck('snippet')->all();
        return $data;
    }

}
