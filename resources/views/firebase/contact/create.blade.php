@extends('firebase.inc.app')

@section('title','create')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if (session('status'))
                <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Add Contact
                        <a href="{{url('/')}}" class="btn btn-sm btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('add-contact')}}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nama Depan</label>
                            <input type="text" class="form-control" name="nama_depan">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nama Belakang</label>
                            <input type="text" class="form-control" name="nama_belakang">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" name="nomor_hp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
