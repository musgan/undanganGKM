@extends('layouts.app')

@section('content')
    <?php
        function textWillAttend($var){
            if($var === null)
                return "Belum konfirmasi";
            else if ($var === 1)
                return "Hadir";
            else
                return "Tidak Hadir";
        }
        function textPaidOff($var){
            if ($var === 1)
                return "Lunas";
            else
                return "Belum di Bayar";
        }
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include("admin.component.message")
                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-primary" href="{{route("admin.participant.create")}}"><i class="fa-solid fa-plus"></i> Tambah</a>
                </div>
                <div class="card mb-3">
                    <h5 class="card-header fw-normal pt-3 pb-3">Filter</h5>
                    <form method="GET" action="{{route('admin.participant.index')}}">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Sesi Kegiatan</label>
                                <select name="session_activity_id" class="form-control">
                                    @foreach ($session_activities as $row)
                                        <option value="{{ $row->id }}" @selected(old('session_activity_id') == $row->id)>
                                            {!! $row->title !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary m-2">Submit</button>
                        </div>
                    </form>
                </div>

                @if(isset($session_activity_id))
                    <div class="card">
                        <h5 class="card-header fw-normal pt-3 pb-3">Peserta Undangan</h5>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable">
                                <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Nomor HP</th>
                                    <th class="text-center">Jumlah Peserta</th>
                                    <th class="text-center">Apakah Hadir ?</th>
                                    <th class="text-center">Jumlah Dibayarkan</th>
                                    <th class="text-center">Lunas</th>
                                    <th class="text-center" >Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td>
                                            {!! $row->name !!}
                                        </td>
                                        <td class="text-center">
                                            {!! $row->phone_number !!}</td>
                                        <td class="text-end">
                                            {!! $row->total_member !!}
                                        </td>
                                        <td class="text-center">
                                            {!! textWillAttend($row->will_attend) !!}
                                        </td>
                                        <td class="text-end">
                                            {!! $row->total_paid !!}
                                        </td>
                                        <td class="text-center">
                                            {!! textPaidOff($row->paid_off)  !!}
                                        </td>
                                        <td class="text-center">

                                            <span>
                                                <form class="delete" action="{{route("admin.participant.delete",$row->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <a href="{{route("admin.participant.edit",$row->id)}}" class="btn btn-warning m-1">Edit</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    <a href="{{url("/".$row->key)}}" target="_blank" class="btn btn-info m-1">Link</a>
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
                @endif
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
