<?php

namespace App\Http\Controllers;

use App\Enums\CourseEnum;
use App\Exports\ExportCenter;
use App\Http\Requests\CenterCreateRequest;
use App\Http\Resources\CenterCollection;
use App\Models\Center;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class CenterController extends Controller
{
    public function index()
    {
        $query = Center::query()->when(request('search'), function ($query) {
            return $query->where('name', 'LIKE', "%" . request('search') . "%");
        })->paginate(50);
        return Inertia::render('Center', [
            'centers' => new CenterCollection($query),
            'total_centers' => Center::all()->count()
        ]);
    }

    public function create()
    {
        return Inertia::render('CenterCreate', [
            'courses' => CourseEnum::asDropdown(),
        ])->with('success_message', "Yay it worked");
    }

    public function store(CenterCreateRequest $request)
    {
        $data = $request->validated();

        try {
            Center::create([
                'uuid' => $data['uuid'],
                'name' => $data['name'],
                'address' => $data['address'],
                'course_id' => $data['course_id'],
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('centers.index')
            ->with('success', "Center Successfully created.");;
    }

    public function edit(Center $centers)
    {
        return Inertia::render('CenterEdit', [
            'centers' => $centers,
            'courses' => CourseEnum::asDropdown(),
        ]);
    }

    public function update(Center $centers, CenterCreateRequest $request)
    {
        $centers->uuid = $request->uuid;
        $centers->name = $request->name;
        $centers->address = $request->address;
        $centers->course_id = $request->course_id;

        $centers->save();

        return Redirect::route('centers.index')
            ->with('success', "Center Successfully updated.");
    }

    public function destroy(Center $center)
    {

        $center->delete();

        return Redirect()
            ->back()
            ->with('success', "Center Successfully deleted.");
    }

    public function export()
    {
        $filename = Carbon::now()->format('Ymdhms') . '_centers.xlsx';
        Excel::store(new ExportCenter, $filename, 'public');
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
