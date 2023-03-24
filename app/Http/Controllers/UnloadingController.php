<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnloadingRequest;
use App\Models\Customer;
use App\Models\Unloading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnloadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Unloading::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Unloading::select('count(*) as allcount')
            ->where('customer_id', 'like', '%' . $searchValue . '%')
            ->count();
        /** ----- waktu_datang where diganti ---------- */
        // Fetch records
        $records = Unloading::orderBy($columnName, $columnSortOrder)
            ->where('customer_id', 'like', '%' . $searchValue . '%')
            // ->OrWhere('alamat', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();
        $data_arr = [];

        foreach ($records as $i => $record) {
            $id = $record->id;
            $customer_id = $record->customer->nama;
            $waktu_datang = $record->waktu_datang;
            $waktu_bongkar = $record->waktu_bongkar;
            $waktu_selesai = $record->waktu_selesai;
            $tanggal_datang = $record->tanggal_datang;
            $muatan = $record->muatan;
            $data_arr[] = [
                "id" => $id,
                "customer_id" => $customer_id,
                "tanggal_datang" => $tanggal_datang,
                "jumlah_mobil" => count($muatan),
                "muatan" => $muatan,
            ];
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        ];

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnloadingRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $unloadingRequest = $request->bongkar;
            $unloadingRequest['customer_id'] = $request->customer_id;
            $unloadingRequest['tanggal_datang'] = now();
            $unloading = Unloading::create($unloadingRequest);

            $muatans = $request->muatan;
            foreach ($muatans as $key => $muatan) {
                $waktu_selesai = self::duration($muatan['waktu_bongkar'], $muatan['waktu_datang']);
                $muatan['waktu_selesai'] = $waktu_selesai;
                $muatan['kendaraan'] = $key + 1;
                $unloading->muatan()->create($muatan);
            }

            return response([
                "success" => $muatan,
            ], 200);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Unloading $unloading)
    {
        return $unloading;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnloadingRequest $request, Unloading $unloading)
    {
        $unloading->update($request->validated());

        return response([
            "success" => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unloading $unloading)
    {
        try {
            $unloading->delete();

            return response([
                "success" => true,
            ], 200);
        } catch (\Throwable $th) {
            return response([
                "success" => false,
            ], 400);
        }
    }

    public function duration($waktu_bongkar, $waktu_datang)
    {
        $bongkar = \Carbon\Carbon::createFromFormat('H:i', $waktu_bongkar);
        $waktu_datang = \Carbon\Carbon::createFromFormat('H:i', $waktu_datang);
        $durasi_waktu = $waktu_datang->diffInMinutes($bongkar);

        return $durasi_waktu;
    }
}
