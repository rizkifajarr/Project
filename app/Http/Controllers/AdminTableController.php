<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\Table;
use App\Models\TableNumber;
use Illuminate\Http\Request;

class AdminTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = TableNumber::with('availabilities.hour')->orderBy('table_number', 'asc')->get();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hours = Hour::all();
        return view('admin.tables.create', compact('hours'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required|integer|unique:table_lists',
            'hours' => 'required|array',
        ]);

        $table = TableNumber::create([
            'table_number' => $request->input('table_number'),
        ]);

        foreach ($request->input('hours') as $hourId) {
            Table::create([
                'table_id' => $table->id,
                'hour_id' => $hourId,
                'is_available' => true,
            ]);
        }

        return redirect()->route('admin.tables.index')->with('success', 'Meja berhasil ditambahkan.');
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
        // Dapatkan data meja berdasarkan ID
        $table = TableNumber::findOrFail($id);

        // Dapatkan semua jam
        $hours = Hour::all();

        // Dapatkan jam yang terkait dengan meja ini
        $tableHours = $table->availabilities->pluck('hour_id')->toArray();

        // Kirim data ke view
        return view('admin.tables.edit', compact('table', 'hours', 'tableHours'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TableNumber $table)
    {
        $request->validate([
            'table_number' => 'required|integer',
            'hours' => 'array',
            'hours.*' => 'exists:hours,id',
        ]);

        $table->update([
            'table_number' => $request->table_number,
        ]);

        // Update availabilities
        $table->availabilities()->delete();

        if ($request->has('hours')) {
            foreach ($request->hours as $hourId) {
                Table::create([
                    'table_id' => $table->id,
                    'hour_id' => $hourId,
                    'is_available' => true,
                ]);
            }
        }
        return redirect()->route('admin.tables.index')->with('success', 'Meja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TableNumber $table)
    {
        $table->availabilities()->delete();
        $table->delete();

        return redirect()->route('admin.tables.index')->with('success', 'Meja berhasil dihapus.');
    }
}