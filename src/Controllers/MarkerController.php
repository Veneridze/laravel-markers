<?php
namespace Veneridze\LaravelMarker\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\ResponseFactory;
use Veneridze\LaravelMarker\Models\Marker;
use Veneridze\LaravelMarker\Models\ModelMarker;
use Veneridze\LaravelMarker\Requests\MarkerRequest;
use Veneridze\LaravelMarker\Interfaces\WithMarksInterface;

class MarkerController extends \Illuminate\Routing\Controller
{

    public function store(WithMarksInterface $model, Marker $marker, MarkerRequest $request)
    {
        $mark = $model->addMarker($marker, $request->input('year'),$request->input('month'),$request->input('day'),$request->input('comment'),);
        return [
            "id" => $mark->id,
            "letter" => $mark->marker->letter, 
            "value" => $mark->marker->name,
            "comment" => $mark->comment,
            "user" => [
                "id" => $mark->user->id,
                "name" => $mark->user->shortName()
            ],
            "created_at" => $mark->created_at
        ];
    }

    public function flushAllDayMarks(WithMarksInterface $model, MarkerRequest $request): Response|ResponseFactory {
        $model->markers()->where([
            'year' => $request->input('year'),
            'month' => $request->input('month'),
            'day' => $request->input('day'),
        ])->delete();
        return response(null, 204);
        //$mark = $model->addMarker($marker, $request->input('year'),$request->input('month'),$request->input('day'),$request->input('comment'),);
        
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