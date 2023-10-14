@extends('pro.main')
@section('content')
<main>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    @include('component.message')
                    <div class="card-body">
                       <form method="post" action="{{ '/respas/'.$data->nik}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <h6 for="CurrentPassword">Current Password</h6>
                    <input type="text" class="form-control" id="CurrentPassword" name="CurrentPassword" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <h6 for="NewPassword">New Password</h6>
                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <h6 for="NewPasscom">New Password Confirm</h6>
                    <input type="password" class="form-control" id="NewPasscom" name="NewPasscom" aria-describedby="emailHelp" required>
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
