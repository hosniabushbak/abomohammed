<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SiteSetting extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'site_settings';

    protected $appends = [
        'logo',
        'icon',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_ar',
        'title_en',
        'site_footer',
        'email',
        'mobile',
        'whatsapp',
        'telegram',
        'telegram_title_ar',
        'telegram_title_en',
        'instagram',
        'youtube',
        'twitter',
        'description_ar',
        'description_en',
        'key_words_ar',
        'key_words_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getIconAttribute()
    {
        $file = $this->getMedia('icon')->last();
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



    public function getTelegramTitleAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->telegram_title_en;
        }else{
            return $this->telegram_title_ar;
        }
    }


    public function getTitleAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->title_en;
        }else{
            return $this->title_ar;
        }
    }


    public function getDescriptionAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->description_en;
        }else{
            return $this->description_ar;
        }
    }

    public function getKeyWordsAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->key_words_en;
        }else{
            return $this->key_words_ar;
        }
    }


}
