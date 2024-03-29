<div class="row mb-5 dynamic-element-parent" data-name="factory">
    <h6 class="text-danger col-12">
        <b>Pabrik</b>
    </h6>
    <div class="row col-12">
        <b class="col-6 py-2">Nama Pabrik</b>
        <div class="col-6 form-group">
            <input class="form-control @error('factory-name.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Nama"
                value="{{$legal != -1 ? old('factory-name.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="factory-name[]" data-name="factory-name" />
            @error('factory-name.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Alamat</b>
        <div class="col-6 form-group">
            <input class="form-control @error('factory-address.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Alamat"
                value="{{$legal != -1 ? old('factory-address.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="factory-address[]" data-name="factory-address" />
            @error('factory-address.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Kab/Kota</b>
        <div class="col-6 form-group">
            <input class="form-control @error('factory-city.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Kab/Kota"
                value="{{$legal != -1 ? old('factory-city.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="factory-city[]" data-name="factory-city" />
            @error('factory-city.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Negara</b>
        <div class="col-6 form-group">
            <input class="form-control @error('factory-country.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Negara"
                value="{{$legal != -1 ? old('factory-country.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="factory-country[]" data-name="factory-country" />
            @error('factory-country.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Provinsi</b>
        <div class="col-6 form-group">
            <input class="form-control @error('factory-region.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Provinsi"
                value="{{$legal != -1 ? old('factory-region.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="factory-region[]" data-name="factory-region" />
            @error('factory-region.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Kode Pos</b>
        <div class="col-6 form-group">
            <input class="form-control @error('factory-pos.'.$legal) is-invalid @enderror form-control-user" type="text"
                placeholder="Kode Pos"
                value="{{$legal != -1 ? old('factory-pos.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="factory-pos[]" data-name="factory-pos" />
            @error('factory-pos.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-danger col-3 dynamic-element-delete mr-2"
                style="{{$legal >= 1 || (isset($val) && $idx != 0) ? '' : 'display: none'}}"
                data-count="#count-factory">Hapus</button>
            <button type="button" class="btn btn-primary col-3 dynamic-element-add"
                data-count="#count-factory">Tambah</button>
        </div>
    </div>
</div>