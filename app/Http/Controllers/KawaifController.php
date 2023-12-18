<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Enums\StatusesEnum;
use App\Exports\ExportResources;
use App\Http\Requests\KawaifCreateRequest;
use App\Models\Halqa;
use App\Models\Region;
use App\Models\Resource;
use App\Models\Shehar;
use App\Models\Status;
use App\Models\Unit;
use App\Models\Zone;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Http\Resources\UserCollection;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KawaifController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Resource::class);
        if (
            Auth::user()->hasAnyRole(
                RolesEnum::REGIONALSADR,
                RolesEnum::REGIONALNAZIMUMOOMI
            )
        ) {
            $zones = Zone::where('region_id', Auth::user()->resource->region_id)->pluck('id')->toArray();
            $halqajat =  Halqa::whereIn('zone_id', $zones)->pluck('id')->toArray();
        } else if (
            Auth::user()->hasAnyRole(
                RolesEnum::ZONALSADR,
                RolesEnum::ZONALNAZIMUMOOMI,
                RolesEnum::ZONALNAZIMEMALIYAT,
                RolesEnum::ZONALNAZIMERAHIMIA,
                RolesEnum::ZONALNAZIMENASHRIYAT
            )
        ) {
            $halqajat =  Halqa::where('zone_id', Auth::user()->resource->zone_id)->pluck('id')->toArray();
        }

        $values = Resource::resource();

        if (
            Auth::user()->hasAnyRole(
                RolesEnum::REGIONALSADR,
                RolesEnum::REGIONALNAZIMUMOOMI,
                RolesEnum::ZONALSADR,
                RolesEnum::ZONALNAZIMUMOOMI
            )
        ) {
            $query = Resource::query()
                ->whereIn('halqa_id', $halqajat)
                ->when(request('search'), function ($query) {
                    return $query->where('first_name', 'LIKE', "%" . request('search') . "%")
                        ->orWhere('second_name', 'LIKE', "%" . request('search') . "%");
                })->paginate('50');
        } else {
            $query = Resource::query()
                ->where('halqa_id', Auth::user()->resource->halqa_id)
                ->when(request('search'), function ($query) {
                    return $query->where('first_name', 'LIKE', "%" . request('search') . "%")
                        ->orWhere('second_name', 'LIKE', "%" . request('search') . "%");
                })->paginate('50');
        }

        return Inertia::render('Kawaif', [
            'user' => Auth::user(),
            'resources' => new UserCollection($query),
            'totalResources' => $values[0],
            'muhazir_e_dawat' => $values[1],
            'daee' => $values[2],
            'muawin_daee' => $values[3],
            'maduu' => $values[4],
            'madni_hall' => $values[5],
            'course_1' => $values[6],
            'course_2' => $values[7],
            'course_3' => $values[8],
            'mohazir_course_1' => $values[9],
            'mohazir_course_2' => $values[10],
            'mohazir_course_3' => $values[11],
            'can' => [
                'create' => auth()->user()->can('create', Resource::class),
                'update' => auth()->user()->can('update', Resource::class),
                'delete' => auth()->user()->can('delete', Resource::class),
            ],
        ]);
    }

    public function create()
    {
        $statuses = Status::all();
        return Inertia::render('KawaifCreate', [
            'dawati_statuses' => dawati_statuses(),
            'terbiati_statuses' => terbiati_statuses(),
            'intizami_statuses' => intizami_statuses(),
            'regions' => regions(),
        ])->with('success_message', "Yay it worked");
    }

    public function store(KawaifCreateRequest $request)
    {
        $data = $request->validated();

        try {
            Resource::create([
                'uuid' => $data['uuid'],
                'first_name' => $data['first_name'],
                'second_name' => $data['second_name'],
                'father_name' => $data['father_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'cnic' => $data['cnic'],
                'permanent_address' => $data['permanent_address'],
                'present_address' => $data['present_address'],
                'education' => $data['education'],
                'dawati_status_id' => $data['dawati_status_id'],
                'tarbiati_status_id' => $data['tarbiati_status_id'],
                'intizami_status_id' => $data['intizami_status_id'],
                'region_id' => $data['region_id'],
                'zone_id' => $data['zone_id'],
                'shehar_id' => $data['shehar_id'],
                'halqa_id' => $data['halqa_id'],
                'unit_id' => $data['unit_id'],
                'maliyat' => $data['maliyat'],
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return Redirect::route('kawaif.index')
            ->with('success', "User Successfully created.");
    }

    public function edit(Resource $resource)
    {        
        return Inertia::render('KawaifEdit', [
            'resource' => $resource,
            'dawati_statuses' => Status::ofType(StatusesEnum::DAWATI)
                ->get()
                ->map(fn ($status) => [
                    'id' => $status->id,
                    'name' => $status->name
                ]),
            'terbiati_statuses' => Status::ofType(StatusesEnum::TARBIATI)
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]),
            'intizami_statuses' => Status::ofType(StatusesEnum::INTIZAMI)
            ->get()
            ->map(fn ($status) => [
                'id' => $status->id,
                'name' => $status->name
            ]),
            'regions' => regions(),
            'zones' => zones(),
            'shehars' => shehars(),
            'halqas' => halqas(),
            'units' => units(),
            'maliyat' => [
                'update' => maliyat_update(),
            ],
            'dawat' => [
                'update' => dawat_update(),
            ],
            'tarbiat' => [
                'update' => tarbiat_update(),
            ],
            'region_intizamia' => [
                'update' => region_intizamia_update(),
            ],
            'zonal_intizamia' => [
                'update' => zonal_intizamia_update(),
            ],
            'shehar_intizamia' => [
                'update' => shehar_intizamia_update(),
            ],
            'halqa_intizamia' => [
                'update' => halqa_intizamia_update(),
            ],
            'unit_intizamia' => [
                'update' => unit_intizamia_update(),
            ],

        ]);
    }

    public function update(Resource $resource, KawaifCreateRequest $request)
    {
        $resource->uuid = $request->uuid;
        $resource->first_name = $request->first_name;
        $resource->second_name = $request->second_name;
        $resource->father_name = $request->father_name;
        $resource->email = $request->email;
        $resource->phone_number = $request->phone_number;
        $resource->cnic = $request->cnic;
        $resource->permanent_address = $request->permanent_address;
        $resource->present_address = $request->present_address;
        $resource->education = $request->education;
        $resource->dawati_status_id = $request->dawati_status_id;
        $resource->tarbiati_status_id = $request->tarbiati_status_id;
        $resource->intizami_status_id = $request->intizami_status_id;
        $resource->region_id = $request->region_id;
        $resource->zone_id = $request->zone_id;
        $resource->shehar_id = $request->shehar_id;
        $resource->halqa_id = $request->halqa_id;
        $resource->unit_id = $request->unit_id;

        $resource->save();

        return Redirect::route('kawaif.index')
            ->with('success', "User Successfully updated.");
    }

    public function deleteConfirm(Resource $resource)
    {
        return Inertia::render('DeleteConfirmModel', [
            'resource' => $resource,
        ])->with('success_message', "Yay it worked");
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return Redirect()
            ->back()
            ->with('success', "User Successfully deleted.");
    }

    public function zoneSelecion(Region $region)
    {
        return $zones = Zone::where('region_id', $region->id)->get()
            ->map(fn ($zone) => [
                'id' => $zone->id,
                'name' => $zone->name
            ]);
    }

    public function sheharHalqaUnitSelecion(Zone $zone)
    {
        return $sheharsHalqas = [
            'shehars' => Shehar::where('zone_id', $zone->id)->get()
                ->map(fn ($shehar) => [
                    'id' => $shehar->id,
                    'name' => $shehar->name
                ]),

            'halqas' => Halqa::where('zone_id', $zone->id)->get()
                ->map(fn ($halqa) => [
                    'id' => $halqa->id,
                    'name' => $halqa->name
                ]),
            'units' => Unit::where('zone_id', $zone->id)->get()
                ->map(fn ($unit) => [
                    'id' => $unit->id,
                    'name' => $unit->name
                ]),
        ];
    }

    public function halqaUnitSelecion(Shehar $shehar)
    {
        return $halqasUnits = [
            'halqas' => Halqa::where('shehar_id', $shehar->id)->get()
                ->map(fn ($halqa) => [
                    'id' => $halqa->id,
                    'name' => $halqa->name
                ]),
            'units' => Unit::where('shehar_id', $shehar->id)->get()
                ->map(fn ($unit) => [
                    'id' => $unit->id,
                    'name' => $unit->name
                ]),
        ];
    }

    public function unitSelecion(Halqa $halqa)
    {
        return $units = Unit::where('halqa_id', $halqa->id)->get()
            ->map(fn ($halqa) => [
                'id' => $halqa->id,
                'name' => $halqa->name
            ]);
    }

    public function getFixedAmount(Resource $resource)
    {
        return $resource->maliyat;
    }

    public function export()
    {
        $filename = Carbon::now()->format('Ymdhms') . '_resource.xlsx';
        Excel::store(new ExportResources, $filename, 'public');
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
