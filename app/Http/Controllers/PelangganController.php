<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Pelanggan::latest()->get();

            return DataTables::of($data)
                ->addColumn('DT_RowIndex', function () {
                    return null;
                })
                ->addColumn('action', function ($pelanggan) {
                    return view('partials.pelanggan_action', compact('pelanggan'))->render();
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pelanggan.index', [
            'title' => 'Data Pelanggan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
