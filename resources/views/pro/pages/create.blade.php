@extends('pro.main')

@section('content')
<main>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        @include('component.message')
                        <h3 class="text-center">Tambah Data Produksi</h3>
                        <form method="post" action="/data" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h6 for="so"> SO</h6>
                                <input type="text" class="form-control" id="so" name="so" value="{{ Session::get('so') }}" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <h6 for="brand">Brand</h6>
                                <input type="text" class="form-control" id="brand" name="brand" value="{{ Session::get('brand') }}" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <h6 for="artikel">Artikel</h6>
                                <input type="text" class="form-control" id="artikel" name="artikel" value="{{ Session::get('artikel') }}" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <h6 for="total">Total</h6>
                                <input type="text" class="form-control" id="total" name="total" value="{{ Session::get('total') }}" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <h6 for="output">Output</h6>
                                <input type="text" class="form-control" id="output" name="output" value="{{ Session::get('output') }}" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <h6 for="foto">Foto</h6>
                                <img class="py-3" id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                                <input type="file" class="form-control" id="foto" name="foto" aria-describedby="emailHelp" onchange="previewImage(this)">
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="/data" class="btn btn-primary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
