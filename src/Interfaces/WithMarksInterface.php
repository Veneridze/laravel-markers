<?php
namespace Veneridze\LaravelMarker\Interfaces;

use Veneridze\LaravelMarker\Models\Marker;
use Veneridze\LaravelMarker\Models\ModelMarker;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface WithMarksInterface {
    public function markers(): MorphMany;

    public function addMarker(Marker $marker): ModelMarker;

}