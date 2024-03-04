<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PelangganRequest;
use Illuminate\Validation\ValidationException;

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
        return view('pelanggan.create', [
            'title' => 'Tambah Pelanggan',
            'tombol' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PelangganRequest $request)
    {
        try {
            $data = $request->all();

            Pelanggan::create($data);

            return redirect()->route('admin.pelanggan.index')->with('success', 'Data Berhasil Ditambahkan');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menambahkan Data. ' . $e->getMessage());
        }
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
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', [
            'title' => 'Edit Data Pelanggan',
            'tombol' => 'Edit',
            'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            $data = $request->all();

            $pelanggan->update($data);

            return redirect()->route('admin.pelanggan.index')->with('success', 'Data Berhasil Diubah');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Mengubah Data. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();

            return redirect()->route('admin.pelanggan.index')->with('success', 'Data Berhasil Didelete');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menghapus Data. ' . $e->getMessage());
        }
    }
}
