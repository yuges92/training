<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $fillable = ['question_id', 'answer', 'createdBy', 'updatedBY'];

    
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
