<?php

namespace App\Http\Controllers;

use App\Model\QuestionChoices;

use App\Http\Requests\Question\QuestionChoicesRequest;
use App\Http\Resources\QuestionChoicesResource;

use Illuminate\Http\Request;

class QuestionChoicesController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, QuestionChoices $QuestionChoices)
    {
        $with = [];
        if ($request->with) {
            $with = explode(",", $request->with);
        }
        return new QuestionChoicesResource(
            QuestionChoices::with($with)->paginate(10)
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
    public function store(QuestionChoicesRequest $request)
    {
        $questionChoice = new QuestionChoices($request->all());
        $questionChoice->save();
        return new QuestionChoicesResource($questionChoice);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\QuestionChoices  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionChoices $questionChoice)
    {
        return new QuestionChoicesResource(
            $questionChoice
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\QuestionChoices  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionChoices $questionChoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\QuestionChoices  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionChoicesRequest $request, QuestionChoices $questionChoice)
    {
        $questionChoice->update($request->all());
        return new QuestionChoicesResource($questionChoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\QuestionChoices  $questionChoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionChoices $questionChoice)
    {
        $questionChoice->delete();
        return new QuestionChoicesResource($questionChoice);
    }
}
