<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HeadSection extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'head_sections';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_ar',
        'title_en',
        'welcome_text_ar',
        'welcome_text_en',
        'head_text_ar',
        'head_text_en',
        'sup_head_ar',
        'sup_head_en',
        'sent_text_ar',
        'sent_text_en',
        'start_date',
        'end_date',
        'place_ar',
        'place_en',
        'name_ar',
        'name_text_ar',
        'name_en',
        'name_text_en',
        'email_ar',
        'email_text_ar',
        'email_en',
        'email_text_en',
        'mobile_ar',
        'mobile_text_ar',
        'mobile_en',
        'mobile_text_en',
        'note_ar',
        'note_text_ar',
        'note_en',
        'note_text_en',
        'button_ar',
        'button_en',
        'created_at',
        'updated_at',
        'deleted_at',
        'event_days',
        'event_from_day',
        'event_to_day',
        'zoom_details',
        'zoom_url',
        'zoom_schedual_url',
        'meeting_id',
        'passcode'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function eventheadClients()
    {
        return $this->belongsToMany(Client::class);
    }


    public function getTitleAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->title_en;
        }else{
            return $this->title_ar;
        }
    }

    public function getWelcomeTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->welcome_text_en;
        }else{
            return $this->welcome_text_ar;
        }
    }


    public function getHeadTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->head_text_en;
        }else{
            return $this->head_text_ar;
        }
    }


    public function getSupHeadAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->sup_head_en;
        }else{
            return $this->sup_head_ar;
        }
    }



    public function getSentTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->sent_text_en;
        }else{
            return $this->sent_text_ar;
        }
    }



    public function getPlaceAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->place_en;
        }else{
            return $this->place_ar;
        }
    }





    public function getNameAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->name_en;
        }else{
            return $this->name_ar;
        }
    }



    public function getNameTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->name_text_en;
        }else{
            return $this->name_text_ar;
        }
    }



    public function getEmailAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->email_en;
        }else{
            return $this->email_ar;
        }
    }

    public function getEmailTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->email_text_en;
        }else{
            return $this->email_text_ar;
        }
    }
    public function getMobileAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->mobile_en;
        }else{
            return $this->mobile_ar;
        }
    }
    public function getMobileTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->mobile_text_en;
        }else{
            return $this->mobile_text_ar;
        }
    }


    public function getNoteAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->note_en;
        }else{
            return $this->note_ar;
        }
    }

    public function getNoteTextAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->note_text_en;
        }else{
            return $this->note_text_ar;
        }
    }

    public function getButtonAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->button_en;
        }else{
            return $this->button_ar;
        }
    }
}
