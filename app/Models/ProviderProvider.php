<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProviderProvider extends Pivot
{
    protected $guarded = ['id'];

    public function toProvider()
    {
        return $this->belongsTo(Provider::class, 'to_provider_id');
    }

    public function fromProvider()
    {
        return $this->belongsTo(Provider::class, 'from_provider_id');
    }
}
