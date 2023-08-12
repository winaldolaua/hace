<div class="row mb-5 dynamic-element-parent" data-name="legal-aspect">
    {{$val}}
    <h6 class="text-danger col-12">
        <b>Aspek Legal*</b>
    </h6>
    <div class="row col-12">
        <b class="col-6 py-2">Jenis Dokumen</b>
        <div class="col-6 form-group">
            <select data-name="aspect-doc" name="aspect-doc[]" class="form-control form-control-user">
                <option value="jenis-dokumen1">
                    jenis dokumen 1
                </option>
                <option value="jenis-dokumen2">
                    jenis dokumen 2
                </option>
            </select>
        </div>
        <b class="col-6 py-2">No. Dokumen</b>
        <div class="col-6 form-group">
            <input type="text" placeholder="No. Dokumen" value="{{old('aspect-doc-number.'.$legal)}}"
                class="form-control form-control-user @error('aspect-doc-number.'.$legal) is-invalid @enderror"
                data-name="aspect-doc-number" name="aspect-doc-number[]" />
            @error('aspect-doc-number.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Tanggal Dokumen</b>
        <div class="col-6 form-group">
            <input type="date" data-name="aspect-date" name="aspect-date[]" class="form-control form-control-user" />
        </div>
        <b class="col-6 py-2">Instansi Penerbit</b>
        <div class="col-6 form-group">
            <input class="form-control form-control-user" type="text" placeholder="Instansi Penerbit" value=""
                data-name="aspect-agency" name="aspect-agency[]" />
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-danger col-3 dynamic-element-delete mr-2"
                style="display: none">Hapus</button>
            <button type="button" class="btn btn-primary col-3 dynamic-element-add">Tambah</button>
        </div>
    </div>
</div>