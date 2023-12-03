@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include("admin.component.message")
                <div class="card">
                    <h5 class="card-header fw-normal pt-3 pb-3">Sesi Kegiatan</h5>

                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{route("admin.sessionactivity.create")}}"><i class="fa-solid fa-plus"></i> Tambah</a>
                        </div>
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                            <tr>
                                <th class="text-center">Judul</th>
                                <th class="text-center">tagline</th>
                                <th class="text-center">Lokasi</th>
                                <th class="text-center">Tanggal Mulai</th>
                                <th class="text-center" >Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                <tr>
                                    <td>
                                        {!! $row->title !!}
                                    </td>
                                    <td>
                                        {!! $row->tagline !!}</td>
                                    <td>
                                        {!! $row->location !!}</td>
                                    <td class="text-center">
                                        {!! date('d F Y',strtotime($row->date_start)) !!}
                                    </td>
                                    <td class="text-center">

                                        <span>
                                            <form class="delete" action="{{route("admin.sessionactivity.delete",$row->id)}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <a href="{{route("admin.sessionactivity.edit",$row->id)}}" class="btn btn-warning m-1">Edit</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
<script type="text/javascript">
    new DataTable('#dataTable');

    $(".delete").on('submit',function(e){
        if(confirm("Apakah anda ingin menghapus data terpilih?")){
            return true;
        }else{
            e.preventDefault()
        }
    })
</script>
@endsection
