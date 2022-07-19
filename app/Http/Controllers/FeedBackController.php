<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedBackRequest;
use App\Http\Requests\UpdateFeedBackRequest;
use App\Models\FeedBack;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFeedBackRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFeedBackRequest $request)
    {
        $feedback = FeedBack::create($request->validated());

        return new JsonResource([
            'status_code' => 200,
            'message' => 'created',
            'data' => $feedback
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(FeedBack $feedBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedBackRequest  $request
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFeedBackRequest $request, FeedBack $feedBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FeedBack $feedBack)
    {
        //
    }
}
