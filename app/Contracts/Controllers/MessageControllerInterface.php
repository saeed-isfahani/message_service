<?php

namespace App\Contracts\Controllers;

use App\Http\Requests\StoreMessageRequest;


interface MessageControllerInterface
{
    /**
     * Send a Mobile Verification to user
     *
     * @return \Illuminate\Http\Response
     * @OA\Post(
     *     path="/api/v1/messages",
     *     operationId="saveMessage",
     *     tags={"Save message"},
     *     summary="Save message",
     *     description="Save message after checking user token",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *                  type="object",
     *                  required={"title","message"},
     *                  @OA\Property(property="title", type="text"),
     *                  @OA\Property(property="message", type="text"),
     *            ),
     *        ),
     *    ),
     *
     *      security={{"bearerAuth":{}}},
     *      @OA\Response(response=200,description="Successful operation (message saved)"),
     *      @OA\Response(response=400,description="Bad Request (token is not valid)")
     * )
     */
    public function store(StoreMessageRequest $request);
}
