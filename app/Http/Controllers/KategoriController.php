<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Yajra\DataTables\DataTables;
use App\Http\Requests\KategoriRequest;
use Illuminate\Validation\ValidationException;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Kategori::latest()->get();

            return DataTables::of($data)
                ->addColumn('DT_RowIndex', function () {
                    return null;
                })
                ->addColumn('action', function ($kategori) {
                    return view('partials.kategori_action', compact('kategori'))->render();
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('kategori.index', [
            'title' => 'Data Kategori Produk',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create', [
            'title' => 'Tambah Kategori Produk',
            'tombol' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request)
    {
        try {
            $data = $request->all();

            Kategori::create($data);

            return redirect()->route('admin.kategori.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', [
            'title' => 'Edit Data Kategori Produk',
            'tombol' => 'Edit',
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, Kategori $kategori)
    {
        try {
            $data = $request->all();

            $kategori->update($data);

            return redirect()->route('admin.kategori.index')->with('success', 'Data Berhasil Diupdate');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Mengupdate Data. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();

            return redirect()->route('admin.kategori.index')->with('success', 'Data Berhasil Didelete');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menghapus Data. ' . $e->getMessage());
        }
    }
}
