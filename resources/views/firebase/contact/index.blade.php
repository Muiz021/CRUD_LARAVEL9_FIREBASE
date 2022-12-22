@extends('firebase.inc.app')

@section('title', 'dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h4 class="alert alert-warning mb-2">{{session('status')}}</h4>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Contact List
                        <a href="{{url('add-contact')}}" class="btn btn-sm btn-primary float-end">Add Contact</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @foreach ($contact as $key => $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item['nama_depan']}}</td>
                                        <td>{{$item['nama_belakang']}}</td>
                                        <td>{{$item['nomor_hp']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td>
                                            <a href="{{url('/edit-contact/'.$key)}}" class="btn btn-success">edit</a>
                                            <form action="{{url('/delete-contact/'.$key)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
