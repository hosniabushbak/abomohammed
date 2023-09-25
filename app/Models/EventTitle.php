<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTitle extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'event_titles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'mintitle',
        'order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function eventClientEvents()
    {
        return $this->hasMany(ClientEvent::class, 'event_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
