<?php

namespace App\Http\Controllers;

use App\Enums\Course1Enum;
use App\Enums\Course2Enum;
use App\Exports\ExportSemester;
use App\Http\Requests\SemesterCreateRequest;
use App\Http\Resources\SemesterCollection;
use App\Models\Center;
use App\Models\Region;
use App\Models\Resource;
use App\Models\Semester;
use App\Models\Zone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class SemesterController extends Controller
{
    public function index()
    {
        $query = Semester::query()->whereHas('center', function($query) {
            $query->where('name', 'LIKE', "%" . request('search') . "%");
         })->paginate(50);
        return Inertia::render('Semester', [
            'semester' => new SemesterCollection($query),
            'total_semesters' =>Semester::all()->count(),
        ]);
    }

    public function create()
    {
        return Inertia::render('SemesterCreate', [
            'centers' => Center::all()
                ->map(fn ($center) => [
                    'id' => $center->id,
                    'name' => $center->name
                ]),
            'resources' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name
                ]),
            'regions' => Region::all()
                ->map(fn ($region) => [
                    'id' => $region->id,
                    'name' => $region->name
                ]),
            'zones' => Zone::all()
                ->map(fn ($zone) => [
                    'id' => $zone->id,
                    'name' => $zone->name
                ]),
        ])->with('success_message', "Yay it worked");
    }

    public function store(SemesterCreateRequest $request)
    {
        $data = $request->validated();

        try {
            Semester::create([
                'uuid' => $data['uuid'],
                'center_id' => $data['center_id'],
                'semester_number' => $data['semester_number'],
                'muhazir_id' => $data['muhazir_id'],
                'mawin_muhazir_id' => $data['mawin_muhazir_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'region_id' => $data['region_id'],
                'zone_id' => $data['zone_id'],
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('semesters.index')
            ->with('success', "Semester Successfully created.");
    }

    public function edit(Semester $semesters)
    {
        return Inertia::render('SemesterEdit', [
            'semesters' => $semesters,
            'centers' => Center::all()
                ->map(fn ($center) => [
                    'id' => $center->id,
                    'name' => $center->name
                ]),
            'resources' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name
                ]),
            'regions' => Region::all()
                ->map(fn ($region) => [
                    'id' => $region->id,
                    'name' => $region->name
                ]),
            'zones' => Zone::all()
                ->map(fn ($zone) => [
                    'id' => $zone->id,
                    'name' => $zone->name
                ]),
            'courses' => ($semesters->center->course_id == 1 )? Course1Enum::asDropdown(): Course2Enum::asDropdown(),

        ]);
    }

    public function update(Semester $semesters, SemesterCreateRequest $request)
    {
        $semesters->uuid = $request->uuid;
        $semesters->center_id = $request->center_id;
        $semesters->semester_number = $request->semester_number;
        $semesters->muhazir_id = $request->muhazir_id;
        $semesters->mawin_muhazir_id = $request->mawin_muhazir_id;
        $semesters->start_date = $request->start_date;
        $semesters->end_date = $request->end_date;
        $semesters->region_id = $request->region_id;
        $semesters->zone_id = $request->zone_id;

        $semesters->save();

        return Redirect::route('semesters.index')
            ->with('success', "Semester Successfully updated.");
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();

        return Redirect()
            ->back()
            ->with('success', "Semester Successfully deleted.");
    }

    public function course(Center $center)
    {
        $course = $center->course_id;
        if ($course == 1) {
            return Course1Enum::asDropdown();
        } else if ($course == 2) {
            return Course2Enum::asDropdown();
        } else {
            $a = "course3";
            return $a;
        }
    }

    public function export()
    {
        $filename = Carbon::now()->format('Ymdhms') . '_semesters.xlsx';
        Excel::store(new ExportSemester, $filename, 'public');
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
