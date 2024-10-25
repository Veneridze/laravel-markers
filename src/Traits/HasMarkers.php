<?php
namespace Veneridze\LaravelMarker\Traits;

use Illuminate\Support\Collection;
use Veneridze\LaravelMarker\Models\Marker;
use Veneridze\LaravelMarker\Models\ModelMarker;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasMarkers {
    public function getMarkers(?int $year = null, ?int $month = null, ?int $day = null): Collection | null {
        $markers =  $this->markers();
        if($year) {
            $markers = $markers->where('year', $year);
        }
        if($month) {
            $markers = $markers->where('month', $month);
        }
        if($day) {
            $markers = $markers->where('day', $day);
        }

        return $markers->get();
    }
    public function markers(): MorphMany {
        return $this->morphMany(Marker::class, 'model');
    }

    public function addMarker(Marker $marker, ?string $comment = null, ?int $year = null, ?int $month = null, ?int $day = null): ModelMarker {
        return $this->markers()->create([
            'marker_id' => $marker->id,
            'comment' => $comment,
            'year' => $year,
            'month' => $month,
            'day' => $day,
        ]);
    }
}