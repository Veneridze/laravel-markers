<?php
namespace Veneridze\LaravelMarker\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Veneridze\LaravelMarker\Models\Marker;
use Veneridze\LaravelMarker\Models\ModelMarker;
use Veneridze\LaravelMarker\Requests\MarkerRequest;
use Veneridze\LaravelMarker\Interfaces\WithMarksInterface;

class MarkerController extends \Illuminate\Routing\Controller
{

    public function store(WithMarksInterface $model, Marker $marker, MarkerRequest $request): RedirectResponse
    {
        $model->addMarker($marker);
        return back();
    }

    public function destroy(Marker $marker): RedirectResponse
    {
        $marker->deleteOrFail();
        return back();
    }

    public function update(ModelMarker $marker, MarkerRequest $request): RedirectResponse
    {
        $marker->update($request->all());
        return back();
    }
}