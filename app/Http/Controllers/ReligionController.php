<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Religion::paginate(3);
        return view('datareligion', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahagama');
    }
    public function tampileditagama($id)
    {
        $data = Religion::find($id);
        return view('tampileditagama', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Religion::create($request->all());
        return redirect()->route('datareligion');
    }

    public function ubahdataagama(Request $request, $id)
    {
        $data = Religion::find($id);
        $data->update($request->all());
        return redirect()
            ->route('datareligion')
            ->with('success', 'Data berhasil diubah');
    }

    public function deleteagama($id)
    {
        $data = Religion::find($id);
        $data->delete();
        return redirect()
            ->route('datareligion')
            ->with('success', 'Data berhasil dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function show(Religion $religion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function edit(Religion $religion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Religion $religion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Religion  $religion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Religion $religion)
    {
        //
    }
}
