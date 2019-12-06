<?php

namespace App\Http\Controllers;

use App\Model\QuestionDaily;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionDailyResource;
use App\Http\Requests\Question\QuestionDailyRequest;

class QuestionDailyController extends Controller
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
        return new QuestionDailyResource(
            QuestionDaily::with($with)->paginate(10)
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
    public function store(QuestionDailyRequest $request)
    {
        $questionDaily = new QuestionDaily($request->all());
        $questionDaily->save();
        return new QuestionDailyResource($questionDaily);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionDaily  $questionDaily
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionDaily $questionDaily)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionDaily  $questionDaily
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionDaily $questionDaily)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionDaily  $questionDaily
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionDaily $questionDaily)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionDaily  $questionDaily
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionDaily $questionDaily)
    {
        //
    }
}
