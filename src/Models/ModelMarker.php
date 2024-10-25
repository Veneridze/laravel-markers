<?php
namespace Veneridze\LaravelMarker\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ModelMarker extends Model {
    protected $guarded = [];
    protected $appends = [
        'name',
    ];
    protected $casts = [
        'payload' => 'json'
    ];
    /**
     * Summary of model
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function model(): MorphTo {
        return $this->morphTo('model');
    }

    public function getNameAttribute(): string {
        return $this->marker->name;
    }
    
    public function marker(): BelongsTo {
        return $this->belongsTo(Marker::class);
    }
}