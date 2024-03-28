<?php

namespace App\Http\Controllers\Dashboard\Hotel\Purchases;

use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Purchase $model)
    {
        return view('dashboard.purchases.index', [
            'purchases' => $model->where('hotel_id', auth()->user()->hotel_id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('dashboard.purchases.create', [
        'statusOptions' => StatusConstants::PURCHASE_STATUS_OPTION,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Purchase $purchase)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $purchase->create($request->all());
        return redirect()->route('dashboard.hotel.purchase.index')->with('success_message', 'Purchase Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.purchases.edit', [
            'purchase' => Purchase::findOrFail($id),
            'statusOptions' => StatusConstants::PURCHASE_STATUS_OPTION,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());
        return redirect()->route('dashboard.hotel.purchase.index')->with('success_message', 'Purchase Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('dashboard.hotel.purchase.index')->with('success_message', 'Purchase Deleted Successfully');
    }
}
