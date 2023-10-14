@extends('pro.main')
@section('content')
    <main>
        <div class="site-section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ '/admin/update' }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <h6 for="name">Name</h6>
                                    <input type="text" value="{{ $data->name }}" class="form-control" id="name"
                                        name="name" aria-describedby="emailHelp" required>
                                </div>
                                @if ($data->nik != '1')
                                    <div class="mb-3">
                                        <label for="role">Role</label>
                                        <select class="form-control" id="role" name="role"
                                            aria-describedby="emailHelp" required>
                                            <option value="operator">operator</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <h6 for="email">Email</h6>
                                    <input type="email" value="{{ $data->email }}" class="form-control" id="email"
                                        name="email" aria-describedby="emailHelp" required>
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
