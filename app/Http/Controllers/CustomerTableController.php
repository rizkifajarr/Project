<?php

namespace App\Http\Controllers;

use App\Models\TableNumber;
use Illuminate\Http\Request;

class CustomerTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableLists = TableNumber::with('availabilities.hour')
            ->get()
            ->sortBy('table_number')
            ->map(fn($table) => [
                'table_id' => $table->id,
                'table_number' => $table->table_number,
                'availabilities' => $table->availabilities->map(fn($availability) => [
                    'hour' => $availability->hour,
                    'is_available' => $availability->is_available
                ])
            ]);

        return view('customers.tables.index', compact('tableLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('customers.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = TableNumber::with(['availabilities.hour'])->findOrFail($id);
        // dd($table);
        return view('customers.tables.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}