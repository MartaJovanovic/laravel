<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $review = Review::all();
        return new ReviewCollection($review);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rate' => 'required',
            'body' => 'required',
            'service_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $review = Review::create([
            'rate' => $request->rate,
            'body' => $request->body,
            'service_id' => $request->service_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['review is created successfully.', new ReviewResource($review)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validator = Validator::make($request->all(), [
            'rate' => 'required',
            'body' => 'required',
            'service_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $review->rate = $request->rate;
        $review->body = $request->body;
        $review->service_id = $request->service_id;

        $review->save();

        return response()->json(['Review is updated successfully.', new ReviewResource($review)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($review_id)
    {

        $review = Review::find($review_id);
        
        if (is_null($review))
            return response()->json('Data not found', 404);
        $review->delete();

        return response()->json('Review is deleted successfully.');
    }
}
