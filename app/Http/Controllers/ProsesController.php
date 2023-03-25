<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProsesRequest;
use App\Models\Proses;
use App\Models\Unloading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProsesController extends Controller
{
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
        $totalRecords = Proses::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Proses::select('count(*) as allcount')->where('waktu_mulai', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Proses::orderBy($columnName, $columnSortOrder)
            ->where('waktu_mulai', 'like', '%' . $searchValue . '%')
            // ->OrWhere('alamat', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];

        foreach ($records as $i => $record) {
            $index = $i + 1;
            $id = $record->id;
            $customer_id = $record->customer_id;
            $unloading_id = $record->unloading_id;
            $waktu_mulai = $record->waktu_mulai;
            $waktu_selesai = $record->waktu_selesai;
            $tipe_produk = $record->tipe_produk;
            $grade = $record->grade;
            $berat_produk = $record->berat_produk;
            $jumlah_produk = $record->jumlah_produk;
            $nama = $record->customer->nama;

            $data_arr[] = [
                // "index" => $index,
                "id" => $id,
                "customer_id" => $customer_id,
                "nama" => $nama,
                "unloading_id" => $unloading_id,
                "waktu_mulai" => $waktu_mulai,
                "waktu_selesai" => $waktu_selesai,
                "tipe_produk" => $tipe_produk,
                "grade" => $grade,
                "berat_produk" => $berat_produk,
                "jumlah_produk" => $jumlah_produk,
            ];
        }

        $response = [
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        ];

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProsesRequest $request)
    {
        $proses = Proses::create($request->validate());
        if (!$proses) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);

        // return DB::transaction(function () use ($request) {
        //     // $prosesRequest['customer_id'] = $request->customer_id;
        //     $proses = Proses::create($request->validate());
        //     if (!$proses) {
        //         return response([
        //             "success" => false,
        //         ], 400);
        //     }

        //     return response([
        //         "success" => true,
        //     ], 200);
        // });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProsesRequest $request, Proses $proses)
    {
        $proses->update($request->validated());
        if (!$proses) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proses $proses)
    {
        $proses->delete();
        if (!$proses) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }

    public function getUnloading(Request $request)
    {
        if ($request->unloading_id) {
            $d = Unloading::findOrFail($request->unloading_id);
            return response()->json($d->muatan);
        }

        $unloading = Unloading::where('customer_id', $request->customer_id)->get();
        $unloading->load('muatan');
        return response()->json($unloading);
    }
}
