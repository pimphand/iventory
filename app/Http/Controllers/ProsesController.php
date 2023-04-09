<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProsesRequest;
use App\Http\Resources\ProsesResource;
use App\Http\Resources\UnloadingResource;
use App\Models\Customer;
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
            $customer_id = $record->customer->nama;
            $unloading_id = $record->unloading_id;
            // $unloading_id = $record->unloading->tanggal_bongkar;
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

    public function store(ProsesRequest $request)
    {
        // dd($request->all());
        $proses = Proses::create($request->validated());
        if (!$proses) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }
    public function show($id)
    {
        $proses = Proses::findOrFail($id);
        $proses->load(['customer', 'unloading']);
        return new ProsesResource($proses);
    }

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
            $unloading = Unloading::findOrFail($request->unloading_id);
            return new UnloadingResource($unloading);
        }
        if ($request->proses_id) {
            $d = Proses::findOrFail($request->proses_id);
            return response()->json($d);
        }

        $unloading = Unloading::where('customer_id', $request->customer_id)->get();
        return UnloadingResource::collection($unloading);
    }
}
