<?php

namespace App\Http\Controllers;

use App\Exports\ExportResourceSemester;
use App\Http\Requests\ResourceSemesterCreateRequest;
use App\Http\Resources\ResourceSemesterCollection;
use App\Models\Resource;
use App\Models\ResourceSemester;
use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class ResourceSemesterController extends Controller
{
    public function index(Semester $semester)
    {
        $query = $semester->resources()->when(request('search'), function ($query) {
            return $query->where('first_name', 'LIKE', "%" . request('search') . "%")
                ->orWhere('second_name', 'LIKE', "%" . request('search') . "%");
        })->paginate(50);

        return Inertia::render('ResourceSemester', [
            'resourceSemester' => new ResourceSemesterCollection($query),
            'total_resourceSemester' => $semester->resources()->count(),
            'semester' => $semester,
        ]);
    }

    public function create(Semester $semester)
    {
        return Inertia::render('ResourceSemesterCreate', [
            'resources' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name
                ]),
            'semester' => $semester,
        ])->with('success_message', "Yay it worked");
    }

    public function store(ResourceSemesterCreateRequest $request, Semester $semester)
    {
        try {
            $semester->resources()->sync($request->safe()->resources);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return Redirect::route('resourcesSemester.index', ['semester' => $semester->uuid])
            ->with('success', "ResourceSemester Successfully created.");
    }

    public function edit(ResourceSemester $resourceSemester)
    {
        return Inertia::render('ResourceSemesterEdit', [
            'resourceSemester' => $resourceSemester,
            'resources' => Resource::all()
                ->map(fn ($resource) => [
                    'id' => $resource->id,
                    'name' => $resource->first_name
                ]),
        ]);
    }

    public function update(ResourceSemester $resourceSemester, ResourceSemesterCreateRequest $request)
    {
        $resourceSemester->uuid = $request->uuid;
        $resourceSemester->resource_id = $request->resource_id;
        $resourceSemester->semester_id = $request->semester_id;

        $resourceSemester->save();

        return Redirect::route('resourcesSemester.index')
            ->with('success', "ResourceSemester Successfully updated.");
    }

    public function destroy(ResourceSemester $resourceSemester)
    {
        $resourceSemester->delete();

        return Redirect()
            ->back()
            ->with('success', "ResourceSemester Successfully deleted.");
    }

    public function export()
    {
        dd("hello");
        $filename = Carbon::now()->format('Ymdhms') . '_resourcesSemester.xlsx';
        Excel::store(new ExportResourceSemester, $filename, 'public');
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
