@extends('layout.admin')

@section('content')

    <body>
        <h1 class="text-center mb-4">Ubah Data Pegawai</h1>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/ubahdata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail"
                                        value="{{ $data->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="jeniskelamin" class="form-label">Jenis kelamin</label>
                                    <select class="form-control select" name="jeniskelamin"
                                        aria-label="Default select example">
                                        <option selected>{{ $data->jeniskelamin }}</option>
                                        <option value="pria">pria</option>
                                        <option value="wanita">wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="notelp" class="form-label">No Telepon</label>
                                    <input type="number" name="notelp" class="form-control" id="exampleInputEmail"
                                        value="{{ $data->notelp }}">
                                </div>

                                <div class="form-group">
                                    <label for="foto" class="form-label">Masukkan Foto</label>
                                    <input type="file" name="foto" class="form-control" value="{{ $data->foto }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Tanggal lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail"
                                        value="{{ $data->tanggal_lahir }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Jabatan</label>
                                    <select name="id_jabatan" id="id_jabatan" class="form-control">
                                        <option value="{{ $data->id_jabatan }}">{{ $data->id_jabatan }}</option>
                                        @foreach ($tmpeditjabatan as $jab)
                                            <option value="{{ $jab->id }}">{{ $jab->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Agama</label>
                                    <select name="id_agama" id="id_agama" class="form-control">
                                        <option value="{{ $data->id_agama }}">{{ $data->id_agama }}</option>
                                        @foreach ($tmpeditagama as $ag)
                                            <option value="{{ $ag->id }}">{{ $ag->nama_agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Golongan</label>
                                    <select name="id_golongan" id="id_golongan" class="form-control">
                                        <option value="{{ $data->id_golongan }}">{{ $data->id_golongan }}</option>
                                        @foreach ($tmpeditgolongan as $ag)
                                            <option value="{{ $ag->id }}">{{ $ag->nama_golongan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Jabatan</label>
                                    <select class="form-control select" name="id_jabatan"
                                        aria-label="Default select example">
                                        <option value="{{ $data->id_jabatan }}">{{ $data->nama_jabatan }}</option>
                                        @foreach ($tmpeditjabatan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                        @endforeach
                                </div> --}}
                                {{-- <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Golongan</label>
                                    <select class="form-control select" name="id_golongan"
                                        aria-label="Default select example">
                                        <option value="{{ $data->id_golongan }}">{{ $data->nama_golongan }}</option>
                                        @foreach ($tmpeditgolongan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                        @endforeach
                                </div> --}}
                                {{-- <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Agama</label>
                                    <select class="form-control select" name="id_agama" aria-label="Default select example">
                                        <option value="{{ $data->id_agama }}">{{ $data->nama_agama }}</option>
                                        @foreach ($tmpeditagama as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_agama }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </body>
@endsection
