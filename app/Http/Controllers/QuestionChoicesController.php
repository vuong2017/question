<?php

namespace App\Http\Controllers;

use App\Model\QuestionChoices;
use App\Model\Question;

use App\Http\Requests\Question\QuestionChoicesRequest;
use App\Http\Resources\QuestionChoicesResource;

use Illuminate\Http\Request;

class QuestionChoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Question $question)
    {
        return QuestionChoicesResource::collection(
            $question->choices()->get()
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
    public function store(QuestionChoicesRequest $request, Question $question)
    {
        $choices = new QuestionChoices($request->all());
        $question->choices()->save($choices);
        return new QuestionChoicesResource($choices);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionChoices $questionChoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionChoices $questionChoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionChoicesRequest $request, Question $question, QuestionChoices $questionChoices)
    {
        $questionChoices->update($request->all());
        return new QuestionChoicesResource($questionChoices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\QuestionChoices  $questionChoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionChoices $questionChoices)
    {
        //
    }
}
