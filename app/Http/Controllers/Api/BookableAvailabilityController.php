<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke($id, Request $request): JsonResponse
    {
        $data = $request->validate([
            "from" => "required|date_format:Y-m-d|after_or_equal:tomorrow",
            "to" => "required|date_format:Y-m-d|after_or_equal:from"
        ]);

        $bookable = Bookable::findOrFail($id);

        return $bookable->availableFor($data["from"], $data["to"])
            ? response()->json([])
            : response()->json([], 404);
    }
}
