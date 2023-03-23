<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        $totalRecords = Customer::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Customer::select('count(*) as allcount')->where('nama', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Customer::orderBy($columnName, $columnSortOrder)
            ->where('nama', 'like', '%' . $searchValue . '%')
            ->OrWhere('alamat', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];

        foreach ($records as $i => $record) {
            $index = $i + 1;
            $id = $record->id;
            $nama = $record->nama;
            $email = $record->email;
            $alamat = $record->alamat;
            $telepon = $record->telepon;

            $data_arr[] = [
                // "index" => $index,
                "id" => $id,
                "email" => $email,
                "nama" => $nama,
                "alamat" => $alamat,
                "telepon" => $telepon,
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
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->validated());
        if (!$customer) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        if (!$customer) {
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
    public function destroy(Customer $customer)
    {
        $customer->delete();
        if (!$customer) {
            return response([
                "success" => false,
            ], 400);
        }

        return response([
            "success" => true,
        ], 200);
    }
}
