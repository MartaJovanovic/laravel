<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ServiceReviewController extends Controller
{
    public function index($service_id)
    {
        $reviews = Review::get()->where('service_id', $service_id);
        if (is_null($reviews))
            return response()->json('Data not found', 404);
        return response()->json($reviews);
    }
}