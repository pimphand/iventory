<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\Proses;
use App\Http\Requests\PengirimanRequest;

class PengirimanController extends Controller
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
        $totalRecords = Pengiriman::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Pengiriman::select('count(*) as allcount')
        ->where('waktu_kirim', 'like', '%' . $searchValue . '%')
        ->orwhere('berat_kirim','like','%' .$searchValue. '%')
        ->orwhere('jumlah_kirim','like','%' .$searchValue. '%')
        ->count();

        // Fetch records
        $records = Pengiriman::orderBy($columnName, $columnSortOrder)
            ->where('waktu_kirim', 'like', '%' . $searchValue . '%')
            ->orwhere('berat_kirim','like','%' .$searchValue. '%')
            ->orwhere('jumlah_kirim','like','%' .$searchValue. '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];

        foreach ($records as $i => $record) {
        //     $index = $i + 1;
            $id = $record->id;
            $customer_id = $record->customer->nama;
            $waktu_kirim = $record->waktu_kirim;
            $berat_kirim = $record->berat_kirim;
            $jumlah_kirim = $record->jumlah_kirim;
        //     $waktu_mulai = $record->waktu_mulai;
        //     $waktu_selesai = $record->waktu_selesai;
        //     $tipe_produk = $record->tipe_produk;
        //     $grade = $record->grade;
        //     $berat_produk = $record->berat_produk;
        //     $jumlah_produk = $record->jumlah_produk;

            $data_arr[] = [
                // "index" => $index,
                "id" => $id,
                "customer_id" => $customer_id,
                "waktu_kirim" => $waktu_kirim,
                "berat_kirim" => $berat_kirim,
                "jumlah_kirim" => $jumlah_kirim
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

    public function store(PengirimanRequest $request)
    {
        $pengiriman = Pengiriman::create($request->validated());
        if (!$pengiriman) {
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
        $pengiriman = DB::table('pengiriman')
                        // ->select('pengiriman.id','unloading.id','proses.id',"unloading.tanggal_bongkar")
                        ->leftJoin('customer', 'pengiriman.customer_id', '=', 'customer.id')
                        ->leftJoin('unloading', 'pengiriman.unloading_id', '=', 'unloading.id')
                        ->leftJoin('proses', 'pengiriman.proses_id', '=', 'proses.id')
                        ->where('pengiriman.id','=',$id)
                        ->first();
        return response()->json($pengiriman);
    }

    public function update(PengirimanRequest $request, Pengiriman $pengiriman)
    {
        $pengiriman->update($request->validated());
        if (!$pengiriman) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }

    public function destroy(Pengiriman $pengiriman)
    {
        try {
            $pengiriman->delete();

            return response([
                "success" => true,
            ], 200);
        } catch (\Throwable $th) {
            return response([
                "success" => false,
            ], 400);
        }
    }

    public function getProses(Request $request)
    {
        $proses = Proses::where('customer_id', $request->customer_id)->get();
        return response()->json($proses);
    }



}
