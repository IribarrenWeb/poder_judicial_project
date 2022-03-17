<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $items = [];
        $invoices = 0;
        if (!$user->role) {
            $items = Item::all();
        }else{
            $invoices = (Purchase::where('bill_id', null)->get())->groupBy('user_id')->count();
            $bills = Bill::with(['user'])->get();
        }

        return response()->view('dashboard',compact('items','user', 'invoices', 'bills'));
    }
}
