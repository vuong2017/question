<?php

namespace App\Http\Controllers;

use App\Model\UserQuestionAnswer;
use Illuminate\Http\Request;
use App\Http\Resources\UserQuestionAnswerResource;
use App\Http\Requests\User\UserQuestionAnswerRequest;

class UserQuestionAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $with = [];
        if ($request->with) {
            $with = explode(",", $request->with);
        }
        return new UserQuestionAnswerResource(
            UserQuestionAnswer::with($with)->paginate(10)
        );
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
    public function store(UserQuestionAnswerRequest $request)
    {
        $userQuestionAnswer = new UserQuestionAnswer($request->all());
        $userQuestionAnswer->save();
        return new UserQuestionAnswerResource($userQuestionAnswer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\UserQuestionAnswer  $userQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(UserQuestionAnswerRequest $userQuestionAnswer)
    {
        return new UserQuestionAnswerResource($userQuestionAnswer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\UserQuestionAnswer  $userQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $userQuestionAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\UserQuestionAnswer  $userQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(UserQuestionAnswerRequest $request, UserQuestionAnswer $userQuestionAnswer)
    {
        $userQuestionAnswer->update($request->all());
        return new UserQuestionAnswerResource($userQuestionAnswer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\UserQuestionAnswer  $userQuestionAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserQuestionAnswer $userQuestionAnswer)
    {
        $userQuestionAnswer->delete();
        return new UserQuestionAnswerResource($userQuestionAnswer);
    }
}
