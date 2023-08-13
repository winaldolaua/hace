<div class="row mb-5 dynamic-element-parent" data-name="outlet">
    <h6 class="text-danger col-12">
        <b>Nama Produk*</b>
    </h6>
    <div class="row col-12">
        <b class="col-6 py-2">Nama Produk</b>
        <div class="col-6 form-group">
            <input class="form-control @error('product-name.'.$legal) is-invalid @enderror form-control-user"
                type="text" placeholder="Nama"
                value="{{$legal != -1 ? old('product-name.'.$legal) : (isset($val->number) ? $val->number:'')}}"
                name="product-name[]" data-name="product-name" />
            @error('product-name.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-danger col-3 dynamic-element-delete mr-2"
                style="{{$legal >= 1 || (isset($val) && $idx != 0) ? '' : 'display: none'}}"
                data-count="#count-product">Hapus</button>
            <button type="button" class="btn btn-primary col-3 dynamic-element-add"
                data-count="#count-product">Tambah</button>
        </div>
    </div>
</div>