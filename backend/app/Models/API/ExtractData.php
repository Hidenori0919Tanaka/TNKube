<?php

namespace App\Models\API;

class ExtractData
{
    /**
     *
     */
    public function extract_snippect(object $data)
    {
        $snippets = collect($data)->pluck('snippet')->all();
        return $snippets;
    }

}
