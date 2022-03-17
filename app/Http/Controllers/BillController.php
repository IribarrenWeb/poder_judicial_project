<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $purchases_by_customer = (Purchase::where('bill_id', null)->with(['item'])->get())->groupBy('user_id');
        $bills_count = 0;
        foreach ($purchases_by_customer as $pb_c) {
            $user_id = $pb_c->first()->user_id;
            $items = collect($pb_c)->pluck('item');
            $items_id = collect($pb_c)->pluck('item.id');
            $purchase_ids = collect($pb_c)->pluck('id');
            $total_cost = 0;
            $total_tax = 0;
            foreach ($items as $item) {
                $total_cost += $item->price;
                $total_tax += $item->price - $item->item_cost;
            }
            try {
                $bill = Bill::create([
                    'user_id' => $user_id,
                    'total_cost' => $total_cost,
                    'total_tax' => $total_tax,
                ]);

                $bill->items()->attach($items_id);
                $bills_count += 1;
                
                Purchase::whereIn('id', $purchase_ids)->update(['bill_id' => $bill->id]);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Cant register the bills.');   
            }   
        }

        DB::commit();

        return redirect()->back()->with('success', 'Bills created. Total ' . $bills_count . ' bills was created');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        return response()->view('bill', ['bill'=>$bill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
