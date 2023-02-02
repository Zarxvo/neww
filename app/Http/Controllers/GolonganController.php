<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Golongan::paginate(3);
        return view('datagolongan', compact('data'));
    }

    public function tampileditgolongan($id)
    {
        $data = Golongan::find($id);
        return view('tampileditgolongan', compact('data'));
    }

    public function create()
    {
        return view('tambahgolongan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Golongan::create($request->all());
        return redirect()->route('datagolongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    public function ubahdatagolongan(Request $request, $id)
    {
        $data = Golongan::find($id);
        $data->update($request->all());
        return redirect()
            ->route('datagolongan')
            ->with('success', 'Data berhasil diubah');
    }

    public function deletegolongan($id)
    {
        $data = Golongan::find($id);
        $data->delete();
        return redirect()
            ->route('datagolongan')
            ->with('success', 'Data berhasil dihapus');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        //
    }
}
