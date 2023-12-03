<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" class="form-control" name="title" value="{{$title??old('title')}}"  />
    @error('title')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Tagline</label>
    <input type="text" class="form-control" name="tagline" value="{{$tagline??old('tagline')}}" />
    @error('tagline')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Lokasi Kegiatan</label>
        <input type="text" class="form-control" name="location" value="{{$location??old('location')}}" />
        @error('location')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label">Sub Lokasi Kegiatan</label>
        <input type="text" class="form-control" name="sub_location" value="{{$sub_location??old('sub_location')}}" />
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Lokasi Map (Sumber Google Map)</label>
    <input type="text" class="form-control" name="map_location" value="{{$map_location??old('map_location')}}"/>
</div>


<div class="mb-3">
    <label class="form-label">Biaya Kontribusi</label>
    <input type="number" class="form-control" name="contribution_value" value="{{$contribution_value??old('contribution_value')}}" />
</div>

<div class="mb-3">
    <label class="form-label">Biaya Kontribusi (untuk di display ke halaman web.)</label>
    <input type="text" class="form-control" name="contribution_text" placeholder="mis. 100K" value="{{$contribution_text??old('contribution_text')}}"/>
</div>
<div class="mb-3">
    <label class="form-label">Deskripsi Biaya Kontribuasi</label>
    <input type="text" class="form-control" name="contribution_description" value="{{$contribution_description??old('contribution_description')}}"/>
</div>

<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" name="date_start" value="{{$date_start??old('date_start')}}" />
    </div>
    <div class="mb-3  col-md-6">
        <label class="form-labell">Tanggal Selesai</label>
        <input type="date" class="form-control" name="date_end" value="{{$date_end??old('date_end')}}"/>
    </div>
</div>
<div class="row">
    <div class="mb-3 col-md-6">
        <label class="form-label">Jam Mulai</label>
        <input type="time" class="form-control" name="time_start" value="{{$time_start??old('time_start')}}"/>
    </div>
    <div class="mb-3 col-md-6">
        <label class="form-label">Jam Selesai</label>
        <input type="time" class="form-control" name="time_end" value="{{$time_end??old('time_end')}}"/>
    </div>
</div>
