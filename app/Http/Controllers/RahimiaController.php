<?php

namespace App\Http\Controllers;

use App\Exports\ExportRahimia;
use App\Http\Requests\RahimiaCreateRequest;
use App\Http\Resources\RahimiaCollection;
use App\Models\Rahimia;
use App\Models\Resource;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class RahimiaController extends Controller
{
    public function index()
    {
        $query = Resource::query()
            ->when(request('search'), function ($query) {
                return $query->where('first_name', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('second_name', 'LIKE', "%" . request('search') . "%");
            })
            ->with([
                'rahimiaMonthly' => function ($query) {
                    if (request('date')) {
                        $date = explode("-", request()->date);
                        $year = $date[0];
                        $month = $date[1];
                    }
                    $query
                        ->whereMonth('date', '=', $month ?? Carbon::now()->month)
                        ->whereYear('date', '=', $year ?? Carbon::now()->year);
                }
            ])->paginate(50);

        return Inertia::render('Rahimia', [
            'rahimia_resources' => new RahimiaCollection($query),
            'total_received' => number_format($query->sum('rahimiaMonthly.received_amount')),
        ]);
    }

    public function create()
    {
        return Inertia::render('RahimiaCreate', [
            'resource' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name,
                ]),
        ])->with('success_message', "Yay it worked");
    }

    public function store(RahimiaCreateRequest $request)
    {
        $data = $request->validated();

        try {
            Rahimia::create([
                'uuid' => $data['uuid'],
                'resource_id' => $data['resource_id'],
                'date' => $data['date'],
                'received_amount' => $data['received_amount'],
                'received_by' => $data['received_by'],
                'receipt_no' => $data['receipt_no'],
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('rahimia.index')
            ->with('success', "Rahimia Resource Successfully created.");;
    }

    public function edit(Rahimia $rahimia)
    {
        return Inertia::render('RahimiaEdit', [
            'rahimiaResource' => $rahimia,
            'resource' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name,
                ]),
        ]);
    }

    public function update(Rahimia $rahimiaResource, RahimiaCreateRequest $request)
    {
        $rahimiaResource->uuid = $request->uuid;
        $rahimiaResource->resource_id = $request->resource_id;
        $rahimiaResource->date = $request->date;
        $rahimiaResource->received_amount = $request->received_amount;
        $rahimiaResource->received_by = $request->received_by;
        $rahimiaResource->receipt_no = $request->receipt_no;

        $rahimiaResource->save();

        return Redirect::route('rahimia.index')
            ->with('success', "Rahimia Resources Successfully updated.");
    }

    public function destroy(Rahimia $rahimiaResource)
    {

        $rahimiaResource->delete();

        return Redirect()
            ->back()
            ->with('success', "Rahimia Resources Successfully deleted.");
    }

    public function export()
    {
        $filename = Carbon::now()->format('Ymdhms') . '_resource.xlsx';
        Excel::store(new ExportRahimia, $filename, 'public');
        return response()->json($filename);
    }

    public function download()
    {
        $fileLocation = request('fileLocation');

        return response()->download(storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR) . request('fileLocation'), request('fileLocation'), [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => "attachment; filename='Report.xls'"
        ]);
    }
}
