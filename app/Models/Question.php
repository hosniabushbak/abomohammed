<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question_ar',
        'question_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function questionAnswers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function getQuestionAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->question_en;
        }else{
            return $this->question_ar;
        }
    }


}
