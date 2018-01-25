<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponser;

    public function transformAndValidateRequest($transformer, $request, $rules)
    {
        $transformedRules = $this->transformData($transformer, $rules);

        $data = $request->validate($transformedRules);

        $originalData = $this->transformData($transformer, $data, true);

        return $originalData;
    }

    public function transformData($transformer, $data, $invert = false)
    {
        $transformedData = [];

        foreach ($data as $attribute => $value) {
            $transformedData[$transformer::mapAttribute($attribute, $invert)] = $value;
        }

        return $transformedData;
    }
}
