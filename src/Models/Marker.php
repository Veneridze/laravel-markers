<?php
namespace Veneridze\LaravelMarker\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Marker extends Model {
    public $timestamps = false;
    protected $fillable = ['name'];
}