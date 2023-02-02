@extends('layout.admin')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pegawai</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahpegawai" button type="button" class="btn btn-success">Tambah Data</a>
            {{-- {{ Session::get('halaman_url') }} --}}

            <div class="row g-3 align-items-center mt-2">
                <div class="col-auto">
                    <form action="/pegawai" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                            aria-describedby="passwordHelpInline">
                    </form>
                </div>
                {{-- <div class="col-auto">
                    <a href="/expdf" button type="button" class="btn btn-info">Export PDF</a>
                </div> --}}
                {{-- <div class="col-auto">
                    <a href="/expexcel" button type="button" class="btn btn-warning">Export Excel</a>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Data Excel
                    </button>
                </div> --}}
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf

                            </form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Dibuat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->jeniskelamin }}</td>
                            <td>0{{ $row->notelp }}</td>
                            <td>
                                <img src="{{ asset('fotopegawai/' . $row->foto) }}" alt="" style="width: 50px;">
                            </td>
                            <td>0{{ $row->created_at }}</td>
                            <td>{{ $row->nama_agama }}</td>
                            <td>{{ $row->tanggal_lahir }}</td>
                            <td>{{ $row->nama_jabatan }}</td>
                            <td>{{ $row->nama_golongan }}</td>
                            </td>

                            <td>
                                <a href="/tampildata/{{ $row->id }}" class="btn btn-warning">Ubah</a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-nama="{{ $row->nama }}">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>


    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </body>
    <script>
        $('.delete').click(function() {
            var pegawaiid = $(this).attr('data-id');
            var pegawainama = $(this).attr('data-nama');

            swal({
                    title: "Yakin?",
                    text: "Kamu akan menghapus data pegawai dengan nama " + pegawainama + " ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete/" + pegawaiid + ""
                        swal("Data berhasil di hapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus");
                    }
                });
        });
    </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
