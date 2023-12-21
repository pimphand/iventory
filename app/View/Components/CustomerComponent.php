<?php

namespace App\View\Components;

use App\Models\Customer;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class CustomerComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (request()->path() == "hasil-produksi" || request()->path() == "hasil-sampingan" || request()->path() == "pengiriman") {
            $customers = DB::table('customer')
                ->join('unloading', 'customer.id', '=', 'unloading.customer_id')
                ->select('customer.*')
                ->distinct()
                ->get();
        } else {
            $customers = Customer::all();
        }

        return view('components.customer-component', compact('customers'));
    }
}
