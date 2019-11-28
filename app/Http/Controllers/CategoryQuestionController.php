<?php

namespace App\Http\Controllers;

use App\Model\CategoryQuestion;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryQuestionResource as Category;
use App\Http\Requests\CategoryQuestion\CategoryQuestionRequest;

class CategoryQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $withParams = [];
        if($request->with) {
            $withParams = explode(",", $request->with);
        }
        return Category::collection(
            CategoryQuestion::with($withParams)->paginate(10)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryQuestionRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryQuestionRequest $request)
    {
        $categoryQuestion = new CategoryQuestion($request->all());
        $categoryQuestion->save();
        return new Category($categoryQuestion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CategoryQuestion  $categoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryQuestion $categoryQuestion)
    {
        return new Category($categoryQuestion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CategoryQuestion  $categoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryQuestion $categoryQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CategoryQuestion  $categoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryQuestionRequest $request, CategoryQuestion $categoryQuestion)
    {
        $categoryQuestion->update($request->all());    
        return new Category($categoryQuestion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CategoryQuestion  $categoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryQuestion $categoryQuestion)
    {
        $categoryQuestion->delete();
        return new Category($categoryQuestion);
    }
}
