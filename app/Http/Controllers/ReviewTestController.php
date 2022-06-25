<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;

class ReviewTestController extends Controller
{
    public function index()
    {
        $review = Review::all();

        return $review;
    }

    public function show($id)
    {
        $review = Review::find($id);
        return new ReviewResource($review);
    }
}
