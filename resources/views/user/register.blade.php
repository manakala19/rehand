@extends('pro.main')
@section('content')
<main>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                       <form method="post" action="/register/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <h6 for="nik"> NIK</h6>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ Session::get('nik') }}" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <h6 for="name">Name</h6>
                    <input type="text" class="form-control" id="name" name="name" value="{{ Session::get('name') }}" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <h6 for="email">Email</h6>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Session::get('email') }}" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <h6 for="password">Password</h6>
                    <input type="password" class="form-control" id="password" name="password" value="{{ Session::get('password') }}" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role"
                        aria-describedby="emailHelp" required>
                        <option value="operator">operator</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <h6 for="foto">Foto</h6>
                    <img class="py-3" id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px; display: none;">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="emailHelp" onchange="previewImage(this)" required>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/admin" class="btn btn-primary">Back</a>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
