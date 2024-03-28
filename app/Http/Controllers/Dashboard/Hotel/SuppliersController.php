<?php

namespace App\Http\Controllers\Dashboard\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Supplier $model)
    {
        return view('dashboard.suppliers.index', [
            'suppliers' => $model->where('hotel_id', auth()->user()->hotel_id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Supplier $supplier)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $supplier->create($request->all());
        return redirect()->route('dashboard.hotel.supplier.index')->with('success_message', 'Supplier Created Successfully');
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
        return view('dashboard.suppliers.edit', [
            'supplier' => Supplier::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(['hotel_id' => auth()->user()->hotel_id]);
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('dashboard.hotel.supplier.index')->with('success_message', 'Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('dashboard.hotel.supplier.index')->with('success_message', 'Supplier Deleted Successfully');
    }
}
