<div class="mb-3">
    <label class="form-label">Sesi Kegiatan</label>
    <select name="session_activity_id" class="form-control">
        <option value="">-Pilih salah satu-</option>
        @foreach ($session_activities as $row)
            <option value="{{ $row->id }}" @selected(($session_activity_id??old('session_activity_id')) == $row->id)>
                {!! $row->title !!}
            </option>
        @endforeach
    </select>
    @error('session_activity_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama Undangan</label>
    <input type="text" class="form-control" name="name" value="{{$name??old('name')}}"  />
    @error('name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nomor Hp</label>
    <input type="text" class="form-control" name="phone_number" value="{{$phone_number??old('phone_number')}}"  />
    @error('phone_number')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Jumlah Anggota</label>
    <input type="text" class="form-control" name="total_member" value="{{$total_member??old('total_member')}}"  />
    @error('total_member')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Apakah akan  Hadir?</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="will_attend" value="" id="flexRadioDefault1" @checked(($will_attend??old('will_attend')) == "")>
        <label class="form-check-label" for="flexRadioDefault1">
            Belum Konfirmasi
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="will_attend" value="1" id="flexRadioDefault2" @checked(($will_attend??old('will_attend')) == "1")>
        <label class="form-check-label" for="flexRadioDefault2">
            Ya
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="will_attend" value="0" id="flexRadioDefault3" @checked(($will_attend??old('will_attend')) == "0")>
        <label class="form-check-label" for="flexRadioDefault3">
            Tidak
        </label>
    </div>
    @error('willAttend')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Jumlah Dibayarkan</label>
    <input type="number" class="form-control" name="total_paid" value="{{$total_paid??old('total_paid')}}"  />
    @error('total_paid')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Apakah Sudah Lunas?</label>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="paid_off" value="1"  @checked(($paid_off??old('paid_off')) == "1")>
        <label class="form-check-label" for="flexRadioDefault2">
            Ya
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="paid_off" value="0" @checked(($paid_off??(old('paid_off')??"0")) == "0")>
        <label class="form-check-label" for="flexRadioDefault3">
            Tidak
        </label>
    </div>
    @error('willAttend')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
