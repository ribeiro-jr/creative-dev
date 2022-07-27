<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedBackRequest;
use App\Http\Requests\UpdateFeedBackRequest;
use App\Models\FeedBack;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(title="Creative API", version="1.0")
 * 
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API for Creative landing page"
 * )
 */
class FeedBackController extends Controller
{

    /**
     * @OA\Get(
     *     path="/feedbacks",
     *     operationId="allFeedBacks",
     *     tags={"FeedBacks"},
     *     summary="Show all feedbacks from database",
     *     description="Returns a list with feedback data",
     *     @OA\Response(response="200", description="Display a listing of feedbacks.")
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        return new JsonResource([
            'status_code' => 200,
            'message' => 'success',
            'data' => FeedBack::query()->paginate($pageSize)
        ]);
    }


    /**
     * @OA\Post(
     *      path="/feedbacks",
     *      operationId="storeFeedBack",
     *      tags={"FeedBacks"},
     *      summary="Store a newly created feedback in database",
     *      description="Returns feedback data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  title="name",
     *                  description="User name",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  title="phone",
     *                  description="User phone",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="User email",
     *                  example="Lorem lipsun"
     *              ),
     *               @OA\Property(
     *                  property="subject",
     *                  title="subject",
     *                  description="The subject of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="body",
     *                  title="body",
     *                  description="The body of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  title="name",
     *                  description="User name",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  title="phone",
     *                  description="User phone",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="User email",
     *                  example="Lorem lipsun"
     *              ),
     *               @OA\Property(
     *                  property="subject",
     *                  title="subject",
     *                  description="The subject of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="body",
     *                  title="body",
     *                  description="The body of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
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
     * @OA\Get(
     *      path="/feedbacks/{id}",
     *      operationId="showFeedBack",
     *      tags={"FeedBacks"},
     *      summary="Show a single feedback from database",
     *      description="Returns feedback data",
     *      @OA\Parameter(
     *          name="id",
     *          description="FeedBack id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),      
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  title="name",
     *                  description="User name",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  title="phone",
     *                  description="User phone",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="User email",
     *                  example="Lorem lipsun"
     *              ),
     *               @OA\Property(
     *                  property="subject",
     *                  title="subject",
     *                  description="The subject of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="body",
     *                  title="body",
     *                  description="The body of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * Display the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedback
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(FeedBack $feedback)
    {
        return new JsonResource([
            'status_code' => 200,
            'message' => $feedback ? 'success' : 'empty data',
            'data' => $feedback
        ]);
    }

    /**
     * @OA\Patch(
     *      path="/feedbacks/{id}",
     *      operationId="updateFeedBack",
     *      tags={"FeedBacks"},
     *      summary="Update an existent feedback in database",
     *      description="Returns feedback data",
     *      @OA\Parameter(
     *          name="id",
     *          description="FeedBack id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  title="name",
     *                  description="User name",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  title="phone",
     *                  description="User phone",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="User email",
     *                  example="Lorem lipsun"
     *              ),
     *               @OA\Property(
     *                  property="subject",
     *                  title="subject",
     *                  description="The subject of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="body",
     *                  title="body",
     *                  description="The body of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="name",
     *                  title="name",
     *                  description="User name",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="phone",
     *                  title="phone",
     *                  description="User phone",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  title="email",
     *                  description="User email",
     *                  example="Lorem lipsun"
     *              ),
     *               @OA\Property(
     *                  property="subject",
     *                  title="subject",
     *                  description="The subject of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *              @OA\Property(
     *                  property="body",
     *                  title="body",
     *                  description="The body of the feedback",
     *                  example="Lorem lipsun"
     *              ),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFeedBackRequest  $request
     * @param  \App\Models\FeedBack  $feedback
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFeedBackRequest $request, FeedBack $feedback)
    {
        $updated = $feedback->update($request->validated());

        return new JsonResource([
            'status_code' => 200,
            'message' => $updated ? 'updated' : 'can not update',
            'data' => $feedback
        ]);
    }

    /**
     * @OA\Delete(
     *      path="/feedbacks/{id}",
     *      operationId="deleteFeedBack",
     *      tags={"FeedBacks"},
     *      summary="Delete existing feedback",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Feedback id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedBack  $feedback
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(FeedBack $feedback)
    {
        $deleted = $feedback->delete();

        return new JsonResource([
            'status_code' => 200,
            'message' => $deleted ? 'deleted' : 'can not delete',
            'data' => []
        ]);
    }
}
