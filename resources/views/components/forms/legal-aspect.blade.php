<div class="row mb-5 dynamic-element-parent" data-name="legal-aspect">
    <h6 class="text-danger col-12">
        <b>Aspek Legal*</b>
    </h6>
    <div class="row col-12">
        <b class="col-6 py-2">Jenis Dokumen</b>
        <div class="col-6 form-group">
            <select data-name="aspect-doc" name="aspect-doc[]"
                class="form-control form-control-user @error('aspect-doc.'.$legal) is-invalid @enderror">
                <option value="jenis-dokumen1" {{($legal !=-1 ? old('aspect-doc.'.$legal) : (isset($val->type) ?
                    $val->type
                    :''))
                    ===
                    'jenis-dokumen1'
                    ? 'selected' : ''}}>
                    jenis dokumen 1
                </option>
                <option value="jenis-dokumen2" {{($legal !=-1 ? old('aspect-doc.'.$legal) : (isset($val->type) ?
                    $val->type
                    :''))
                    ===
                    'jenis-dokumen2'
                    ? 'selected' : ''}}>
                    jenis dokumen 2
                </option>
            </select>
            @error('aspect-doc.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">No. Dokumen</b>
        <div class="col-6 form-group">
            <input type="text" placeholder="No. Dokumen" value="{{$legal != -1 ? old('aspect-doc-number.'.$legal) : (isset($val->number) ? $val->number
                :'')}}" class="form-control form-control-user @error('aspect-doc-number.'.$legal) is-invalid @enderror"
                data-name="aspect-doc-number" name="aspect-doc-number[]" />
            @error('aspect-doc-number.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Tanggal Dokumen</b>
        <div class="col-6 form-group">
            <input type="date" data-name="aspect-date" name="aspect-date[]"
                class="form-control form-control-user @error('aspect-date.'.$legal) is-invalid @enderror" value="{{$legal != -1 ? old('aspect-date.'.$legal) : (isset($val->date) ? date('Y-m-d', strtotime($val->date))
                :'') }}" />
            @error('aspect-date.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <b class="col-6 py-2">Instansi Penerbit</b>
        <div class="col-6 form-group">
            <input class="form-control form-control-user @error('aspect-agency.'.$legal) is-invalid @enderror"
                type="text" placeholder="Instansi Penerbit" value="{{$legal != -1 ? old('aspect-agency.'.$legal) : (isset($val->agency_name) ? $val->agency_name
                :'')}}" data-name="aspect-agency" name="aspect-agency[]" />
            @error('aspect-agency.'.$legal)
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-danger col-3 dynamic-element-delete mr-2"
                style="{{$legal != -1 || (isset($val) && $idx != 0) ? '' : 'display: none'}}"
                data-count="#count-legal">Hapus</button>
            <button type="button" class="btn btn-primary col-3 dynamic-element-add"
                data-count="#count-legal">Tambah</button>
        </div>
    </div>
</div>