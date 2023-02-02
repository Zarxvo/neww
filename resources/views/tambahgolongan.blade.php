@extends('layout.admin')

@section('content')
<body>
    <br>
    <br>
    <h1 class="text-center mb-5 mt-5" >Tambah Data Golongan</h1>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdatagolongan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInput Email" class="form-label">Golongan</label>
                                <input type="text" name="nama_golongan" class="form-control" id="exampleInputEmail">
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
