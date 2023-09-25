<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientEvent extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use Auditable;
    use HasFactory;

    public const RESPONSIVE_RADIO = [
        '0' => 'yes',
        '1' => 'No',
        '2'=>    'Reschedule',
    ];

    public $table = 'client_events';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'date',
        'text',
        'responsive',
        'note',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public static function boot()
    {
        parent::boot();
//        ClientEvent::observe(new \App\Observers\ClientEventActionObserver());
    }

    public function event()
    {
        return $this->belongsTo(EventTitle::class, 'event_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
