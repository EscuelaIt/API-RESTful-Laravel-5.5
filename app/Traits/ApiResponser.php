<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    function successResponse($data, $code = 200)
    {
        return response()->json($data, $code);
    }

    function errorResponse($message, $code)
    {
        return response()->json(['error' => ['message' => $message, 'code' => $code]], $code);
    }

    function showAll(Collection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }

        $resource = $collection->first()->resource;

        $transformedCollection = $resource::collection($collection);

        return $this->successResponse(['data' => $transformedCollection], $code);
    }

    function showOne(Model $instance, $code = 200)
    {
        $resource = $instance->resource;

        $transformedInstance = new $resource($instance);

        return $this->successResponse(['data' => $transformedInstance], $code);
    }

    function showMessage($message, $code = 200)
    {
        return $this->successResponse($message, $code);
    }
}
