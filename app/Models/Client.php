<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;
    use MultiTenantModelTrait;

    public const SERIOUSNESS_RADIO = [
        '0'=>'none',
        '1' => 'Cold',
        '2' => 'Warm',
        '3'=>    'Hot',
    ];
    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'arrived',
        'email',
        'phone',
        'note',
        'user_id',
        'seriousness',
        'provider_id',
        'created_by_id',
        'is_send',
        'is_webinar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Client::observe(new \App\Observers\ClientActionObserver());
    }

    public function clientClientEvents()
    {
        return $this->hasMany(ClientEvent::class, 'client_id', 'id')->orderBy('event_id','asc');
    }

    public function clientAnswers()
    {
        return $this->hasMany(Answer::class, 'client_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function eventheads()
    {
        return $this->belongsToMany(HeadSection::class);
    }
    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

}
