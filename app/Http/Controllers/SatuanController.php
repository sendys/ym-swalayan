<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Yajra\DataTables\DataTables;
use App\Http\Requests\SatuanRequest;
use Illuminate\Validation\ValidationException;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Satuan::latest()->get();

            return DataTables::of($data)
                ->addColumn('DT_RowIndex', function () {
                    return null;
                })
                ->addColumn('action', function ($satuan) {
                    return view('partials.satuan_action', compact('satuan'))->render();
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('satuan.index', [
            'title' => 'Data Satuan',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.create', [
            'title' => 'Tambah Satuan',
            'tombol' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SatuanRequest $request)
    {
        try {
            $data = $request->all();

            Satuan::create($data);

            return redirect()->route('admin.satuan.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', [
            'title' => 'Edit Data Satuan',
            'tombol' => 'edit',
            'satuan' => $satuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SatuanRequest $request, Satuan $satuan)
    {
        try {
            $data = $request->all();

            $satuan->update($data);

            return redirect()->route('admin.satuan.index')->with('success', 'Data Berhasil Diubah');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Mengubah Data. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        try {
            $satuan->delete();

            return redirect()->route('admin.satuan.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menghapus Data. ' . $e->getMessage());
        }
    }
}
