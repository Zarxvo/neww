<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Employee;
use App\Models\Golongan;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Employee::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', \request()->fullUrl());
        } else {
            $data = DB::table('employees')
                ->join('religions', 'employees.id_agama', 'religions.id')
                ->join('jabatans', 'employees.id_jabatan', 'jabatans.id')
                ->join('golongans', 'employees.id_golongan', 'golongans.id')
                ->select('employees.*', 'religions.nama_agama', 'jabatans.nama_jabatan', 'golongans.nama_golongan')
                ->latest()
                ->paginate(5);
            Session::put('halaman_url', \request()->fullUrl());
        }
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        $dataagama = Religion::all();
        $datajabatan = Jabatan::all();
        $datagolongan = Golongan::all();
        return view('tambahpegawai', compact('dataagama', 'datajabatan', 'datagolongan'));
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'notelp' => 'required|min:10',
        ]);
        $data = Employee::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()
            ->route('pegawai')
            ->with('success', 'Data berhasil ditambah');
    }

    public function tampildata($id)
    {
        $tmpeditagama = Religion::all();
        $tmpeditjabatan = Jabatan::all();
        $tmpeditgolongan = Golongan::all();
        $data = Employee::find($id);
        return view('tampildata', compact('data', 'tmpeditagama', 'tmpeditjabatan', 'tmpeditgolongan'));
    }

    public function ubahdata(Request $request, $id)
    {
        $data = Employee::find($id);
        $data->update($request->all());
        if (Session('halaman_url')) {
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                $data->save();
            }
            return \redirect(session('halaman_url'))->with('success', 'Data berhasil di Update');
        }
        return redirect()
            ->route('pegawai')
            ->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = Employee::find($id);
        if ($data->foto) {
            Storage::delete($data->foto);
        }
        $data->delete();
        return redirect()
            ->route('pegawai')
            ->with('success', 'Data berhasil dihapus');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
