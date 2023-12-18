<?php

namespace App\Http\Controllers;

use App\Exports\ExportMaliyat;
use App\Http\Requests\MaliyatCreateRequest;
use App\Http\Resources\MaliyatCollection;
use App\Models\Maliyat;
use App\Models\Resource;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class MaliyatController extends Controller
{
    public function index()
    {
        $query = Resource::query()
            ->when(request('search'), function ($query) {

                return $query->where('first_name', 'LIKE', "%" . request('search') . "%")
                    ->orWhere('second_name', 'LIKE', "%" . request('search') . "%");
            })
            ->with([
                'maliyatMonthly' => function ($query) {
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

        $total_received = $query->sum('maliyatMonthly.received_amount');
        $total_concerted = $query->sum('maliyatMonthly.fixed_amount');
        $total_arrears = $total_concerted - $total_received;

        return Inertia::render('Maliyat', [
            'maliyat_resources' => new MaliyatCollection($query),
            'total_received' => number_format($total_received),
            'total_concerted' => number_format($total_concerted),
            'total_arrears' => number_format($total_arrears),

        ]);
    }

    public function create()
    {
        return Inertia::render('MaliyatCreate', [
            'resource' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name,
                ]),
        ])->with('success_message', "Yay it worked");
    }

    public function store(MaliyatCreateRequest $request)
    {
        $data = $request->validated();

        try {
            Maliyat::create([
                'uuid' => $data['uuid'],
                'resource_id' => $data['resource_id'],
                'date' => $data['date'],
                'fixed_amount' => $data['fixed_amount'],
                'received_amount' => $data['received_amount'],
                'recieved_by' => $data['recieved_by'],
                'receipt_no' => $data['receipt_no'],
                'arrears' => $data['arrears'],
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('maliyat.index')
            ->with('success', "Maliyat Resource Successfully created.");;
    }

    public function edit(Maliyat $maliyat)
    {
        return Inertia::render('MaliyatEdit');
    }

    public function update(Maliyat $maliyatResource, MaliyatCreateRequest $request)
    {
        $maliyatResource->uuid = $request->uuid;
        $maliyatResource->resource_id = $request->resource_id;
        $maliyatResource->date = $request->date;
        $maliyatResource->fixed_amount = $request->fixed_amount;
        $maliyatResource->received_amount = $request->received_amount;
        $maliyatResource->recieved_by = $request->recieved_by;
        $maliyatResource->receipt_no = $request->receipt_no;
        $maliyatResource->arrears = $request->arrears;

        $maliyatResource->save();

        return Redirect::route('maliyat.index')
            ->with('success', "User Successfully updated.");
    }

    public function destroy(Maliyat $maliyatResource)
    {

        $maliyatResource->delete();

        return Redirect()
            ->back()
            ->with('success', "User Successfully deleted.");
    }

    public function export()
    {
        $filename = Carbon::now()->format('Ymdhms') . '_maliyat.xlsx';
        Excel::store(new ExportMaliyat, $filename, 'public');
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
