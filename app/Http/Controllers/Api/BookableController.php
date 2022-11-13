<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;
use App\Models\Bookable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BookableController extends Controller
{
    /**
     * @return mixed
     */
    public function index() {
        return BookableIndexResource::collection(
            Bookable::all()
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id) : mixed {
        return new BookableShowResource(Bookable::findOrFail($id));
    }
}
