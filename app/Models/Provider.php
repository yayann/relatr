<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function consumers()
    {
        return $this->belongsToMany(Consumer::class)->using(ConsumerProvider::class)->withTimestamps();
    }

    public function toProviders()
    {
        return $this->belongsToMany(Provider::class, 'provider_provider', 'from_provider_id', 'to_provider_id');
    }

    public function fromProviders()
    {
        return $this->belongsToMany(Provider::class, 'provider_provider', 'to_provider_id', 'from_provider_id');
    }

}
