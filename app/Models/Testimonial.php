<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'testimonials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_ar',
        'name_en',
        'text_ar',
        'text_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }




    public function getNameAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->name_en;
        }else{
            return $this->name_ar;
        }
    }


    public function getTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->text_en;
        }else{
            return $this->text_ar;
        }
    }
}
