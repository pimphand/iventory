<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampinganRequest;
use App\Models\Customer;
use App\Models\Proses;
use App\Models\Sampingan;
use App\Models\Unloading;
use Illuminate\Http\Request;

class SampinganController extends Controller
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
        $totalRecords = Sampingan::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Sampingan::select('count(*) as allcount')->where('customer_id', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Sampingan::orderBy($columnName, $columnSortOrder)
            ->where('customer_id', 'like', '%' . $searchValue . '%')
            // ->OrWhere('alamat', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];

        foreach ($records as $i => $record) {
            $index = $i + 1;
            $id = $record->id;
            // $customer_id = $record->customer->nama;
            // dd($customer_id);
            // $unloading_id = $record->unloading->tanggal_bongkar;
            $customer_id = $record->customer_id;
            $unloading_id = $record->unloading_id;
            $proses_id = $record->proses->tipe_produk;
            $berat_kepala_leher = $record->berat_kepala_leher;
            $prosentase_kepala_leher = $record->prosentase_kepala_leher;
            $berat_kepala_tanpa_leher = $record->berat_kepala_tanpa_leher;
            $prosentase_kepala_tanpa_leher = $record->prosentase_kepala_tanpa_leher;
            $berat_usus = $record->berat_usus;
            $prosentase_usus = $record->prosentase_usus;
            $berat_hja = $record->berat_hja;
            $prosentase_hja = $record->prosentase_hja;
            $berat_ceker = $record->berat_ceker;
            $prosentase_ceker = $record->prosentase_ceker;
            $berat_tembolok = $record->berat_tembolok;
            $prosentase_tembolok = $record->prosentase_tembolok;


            $data_arr[] = [
                // "index" => $index,
                "id" => $id,
                "customer_id" => $customer_id,
                "proses_id" => $proses_id,
                "unloading_id" => $unloading_id,
                "berat_kepala_leher" => $berat_kepala_leher,
                "prosentase_kepala_leher" => $prosentase_kepala_leher,
                "berat_kepala_tanpa_leher" => $berat_kepala_tanpa_leher,
                "prosentase_kepala_tanpa_leher" => $prosentase_kepala_tanpa_leher,
                "berat_usus" => $berat_usus,
                "prosentase_usus" => $prosentase_usus,
                "berat_hja" => $berat_hja,
                "prosentase_hja" => $prosentase_hja,
                "berat_ceker" => $berat_ceker,
                "prosentase_ceker" => $prosentase_ceker,
                "berat_tembolok" => $berat_tembolok,
                "prosentase_tembolok" => $prosentase_tembolok,
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

    public function store(SampinganRequest $request)
    {
        // dd($request->all());
        $sampingan = Sampingan::create($request->validated());
        if (!$sampingan) {
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
        $sampingan = Sampingan::findOrFail($id)
            ->join('customer', 'sampingan.customer_id', '=', 'customer.id')
            ->join('unloading', 'sampingan.unloading_id', '=', 'unloading.id')
            ->join('proses', 'sampingan.proses_id', '=', 'proses.id')
            ->select('sampingan.*', 'customer.nama', 'unloading.tanggal_bongkar', 'proses.tipe_produk')
            ->firstOrFail();
        return $sampingan;
    }

    public function update(SampinganRequest $request, Sampingan $sampingan)
    {
        dd($request->all());
        $sampingan->update($request->validated());
        if (!$sampingan) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }

    public function destroy(Sampingan $sampingan)
    {
        $sampingan->delete();
        if (!$sampingan) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }

    public function getProses(Request $request)
    {
        if ($request->proses_id) {
            $d = Proses::findOrFail($request->proses_id);
            return response()->json($d);
            // return response()->json($d->muatan);
        }

        $proses = Proses::where('unloading_id', $request->unloading_id)->get();
        // $proses->load('muatan');
        return response()->json($proses);
    }
}
