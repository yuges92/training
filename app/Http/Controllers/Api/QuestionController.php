<?php

namespace App\Http\Controllers\Api;

use App\Question;
use App\Assignment;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Assignment $assignment)
    {
        $questions = Question::with('criterias')->where('assignment_id', $assignment->id)->get();
        // Log::info($questions);
        $questionCollection = QuestionResource::collection($questions);
        // Log::error($questionCollection);
        return response()->json($questionCollection, 201);
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
    public function store(Request $request, Assignment $assignment)
    {
        // Log::info($request);
        $this->validate($request, [
            'description' => 'required',
            'number' => 'required',
            'type' => 'required',
            'criterias' => 'array|min:1',
            'answers' => 'array|min:1',
        ]);

        $criterias = collect($request->criterias);
        $answers = collect($request->answers);

        $question = Question::create([
            'assignment_id' => $assignment->id,
            'description' => $request->description,
            'textLimit' => $request->textLimit ?? null,
            'number' => $request->number,
            'type' => $request->type,
            'video' => $request->video ?? '',
        ]);

        if ($request->file('image')) {
            $imageFileName = $question->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($question->getImageFolder(), $imageFileName);
            $question->image = $imageFileName;
            $question->update();
        }
        if ($criterias->isNotEmpty()) {
            $question->criterias()->sync($criterias);
        }

        if ($answers->isNotEmpty()) {
            foreach ($answers as $answer) {


                if ($answer != '') {
                    $question->answers()->create([
                        'answer' =>  $answer,
                        'createdBy' => $request->user()->id,
                    ]);
                }
            }
        }

        return response()->json($question, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment, Question $question)
    {

        Log::info($request);

        $this->validate($request, [
            'description' => 'required',
            'number' => 'required',
            'type' => 'required',
            'criterias' => 'array|min:1',
            'answers' => 'array|min:1',
        ]);

        $criterias = collect($request->criterias);
        $answers = collect($request->answers);

        $question->fill([
            'assignment_id' => $assignment->id,
            'description' => $request->description,
            'number' => $request->number,
            'textLimit' => $request->textLimit ?? null,
            'type' => $request->type,
            'video' => $request->video ?? null,
        ]);


        if ($request->file('image')) {
            $imageFileName = $question->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs($question->getImageFolder(), $imageFileName);
            $question->image = $imageFileName;
            // $question->update();
        }

        if($request->image==''){
            if ($question->getImage()) {
                Storage::delete($question->getImageFolder() . $question->image);
                $question->image=null;
            }
        }
        if ($criterias->isNotEmpty()) {
            $question->criterias()->sync($criterias);
        }
        $ans= QuestionAnswer::where('question_id', $question->id)->delete();
        Log::info($ans);
        if ($answers->isNotEmpty()) {
            foreach ($answers as $answer) {


                if ($answer != '') {
                    $question->answers()->create([
                        'answer' =>  $answer,
                        'createdBy' => $request->user()->id,
                    ]);
                }
            }
        }
        $question->update();
        return response()->json($question, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($assignment_id, Question $question)
    {

        // $question= Question::find($question_id);
        // Log::error($question);
        if ($question->getImage()) {
            // Log::error($question->getImage());

            Storage::delete($question->getImageFolder() . $question->image);
        }
        $question->delete();
        return response()->json('Deleted', 204);
    }
}
