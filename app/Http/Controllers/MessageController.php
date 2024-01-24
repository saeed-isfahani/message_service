<?php

namespace App\Http\Controllers;

use App\Facades\Response;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

// use App\Helpers\AuthServiceHelper;


class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {        
        $res = checkToken($request->bearerToken());
        
        if(!$res){
            throw new BadRequestException(__('message.error.token_is_not_valid'));
        }
        
        $messageData = array_merge($request->validated(), ['user_id' => $res->data->id]);
        Message::create($messageData);

        return Response::data(['message' => __('message.messages.saved_successfully')])->send();
    }
}
