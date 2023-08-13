<div class="row mb-5 dynamic-element-parent" data-name="outlet">
    <h6 class="text-danger col-12">
        <b>Outlet*</b>
    </h6>
    <div class="row col-12">
        <b class="col-6 py-2">Nama Outlet</b>
        <div class="col-6 form-group">
            <input class="form-control @error('outlet-name.'.$legal) is-invalid @enderror form-control-user" type="text"
                placeholder="Nama" value="" name="outlet-name[]" data-name="outlet-name" />
            @error('outlet-name.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Alamat</b>
        <div class="col-6 form-group">
            <input class="form-control @error('outlet-address.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Alamat" value="" name="outlet-address[]" data-name="outlet-address" />
            @error('outlet-address.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Kab/Kota</b>
        <div class="col-6 form-group">
            <input class="form-control @error('outlet-city.'.$legal) is-invalid @enderror form-control-user" type="text"
                placeholder="Kab/Kota" value="" name="outlet-city[]" data-name="outlet-city" />
            @error('outlet-city.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Provinsi</b>
        <div class="col-6 form-group">
            <input class="form-control @error('outlet-region.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Provinsi" value="" name="outlet-region[]" data-name="outlet-region" />
            @error('outlet-region.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Negara</b>
        <div class="col-6 form-group">
            <input class="form-control @error('outlet-country.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Negara" value="" name="outlet-country[]" data-name="outlet-country" />
            @error('outlet-country.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-danger col-3 dynamic-element-delete mr-2"
                style="display: none">Hapus</button>
            <button type="button" class="btn btn-primary col-3 dynamic-element-add">Tambah</button>
        </div>
    </div>
</div>