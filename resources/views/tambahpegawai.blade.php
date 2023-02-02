@extends('layout.admin')

@section('content')

    <body>
        <br>
        <br>
        <h1 class="text-center mb-5 mt-5">Tambah Data Pegawai</h1>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInput Email" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Jenis kelamin</label>
                                    <select class="form-control select" name="jeniskelamin"
                                        aria-label="Default select example">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="pria">pria</option>
                                        <option value="wanita">wanita</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">No Telepon</label>
                                    <input type="number" name="notelp" class="form-control" id="exampleInputEmail">
                                    @error('notelp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Masukkan Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Agama</label>
                                    <select class="form-control select" name="id_agama" aria-label="Default select example">
                                        <option selected>Pilih Agama</option>
                                        @foreach ($dataagama as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Tanggal lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" id="exampleInputEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Jabatan</label>
                                    <select class="form-control select" name="id_jabatan"
                                        aria-label="Default select example">
                                        <option selected>Pilih Jabatan</option>
                                        @foreach ($datajabatan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInput Email" class="form-label">Golongan</label>
                                    <select class="form-control select" name="id_golongan"
                                        aria-label="Default select example">
                                        <option selected>Pilih Golongan</option>
                                        @foreach ($datagolongan as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                        @endforeach
                                    </select>
                                </div>

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
