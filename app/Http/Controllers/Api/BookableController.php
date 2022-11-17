<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;
use App\Models\Bookable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookableController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return BookableIndexResource::collection(
            Bookable::all()
        );
    }

    /**
     * @param $id
     * @return BookableShowResource
     */
    public function show($id) : BookableShowResource
    {
        return new BookableShowResource(Bookable::findOrFail($id));
    }
}
