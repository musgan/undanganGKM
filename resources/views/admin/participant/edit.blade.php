@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include("admin.component.message")
                <div class="card">
                    <div class="card-header">Edit Data</div>
                    <form method="POST" action="{{route("admin.participant.update",$id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @include("admin.participant.form",$data)
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="{{route("admin.participant.index")}}" class="m-2 btn btn-secondary">KEMBALI</a>
                            <button type="submit" class="btn btn-primary m-2">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
