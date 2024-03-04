<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\SupplierRequest;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Supplier::latest()->get();

            return DataTables::of($data)
                ->addColumn('DT_RowIndex', function () {
                    return null;
                })
                ->addColumn('action', function ($supplier) {
                    return view('partials.supplier_action', compact('supplier'))->render();
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('supplier.index', [
            'title' => 'Data Supplier',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create', [
            'title' => 'Tambah Supplier',
            'tombol' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        try {
            $data = $request->all();

            Supplier::create($data);

            return redirect()->route('admin.supplier.index')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', [
            'title' => 'Edit Data Supplier',
            'tombol' => 'Edit',
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        try {
            $data = $request->all();

            $supplier->update($data);

            return redirect()->route('admin.supplier.index')->with('success', 'Data Berhasil Diubah');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Mengubah Data. ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();

            return redirect()->route('admin.supplier.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menghapus Data. ' . $e->getMessage());
        }
    }
}
