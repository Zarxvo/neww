<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jabatan::paginate(3);
        return view('datajabatan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahjabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function tampileditjabatan($id)
    {
        $data = Jabatan::find($id);
        return view('tampileditjabatan', compact('data'));
    }

    public function store(Request $request)
    {
        $data = Jabatan::create($request->all());
        return redirect()->route('datajabatan');
    }

    public function ubahdatajabatan(Request $request, $id)
    {
        $data = Jabatan::find($id);
        $data->update($request->all());
        return redirect()
            ->route('datajabatan')
            ->with('success', 'Data berhasil diubah');
    }
    public function deletejabatan($id)
    {
        $data = Jabatan::find($id);
        $data->delete();
        return redirect()
            ->route('datajabatan')
            ->with('success', 'Data berhasil dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }
}
