<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceProvider extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ACTIVE_RADIO = [
        '0' => 'Active',
        '1' => 'DeActive',
    ];

    public $table = 'service_providers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function providerClients()
    {
        return $this->hasMany(Client::class, 'provider_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
