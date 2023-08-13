@extends('layout.main') @section('container')
<div class="m-5">
    <h1><b>Tambah Sertifikasi</b></h1>
</div>
<form action="{{ route('add-sertif', $id_number) }}" method="post" enctype="multipart/form-data" class="row col-12">
    <div class="row mx-4">
        @csrf
        <div class="col-8">
            <div class="card shadow mb-5">
                <div class="card-header">
                    <h4 class="mb-0 text-white py-2"><b>Data Pengajuan</b></h4>
                </div>
                <div class="card-body py-2 px-3">
                    <div class="row mb-5">
                        <div class="row col-6">
                            <b class="col-6 py-2">Nomor ID</b>
                            <span class="col-6 py-2">xxxxxxx</span>
                            <b class="col-6 py-2">Tanggal</b>
                            <span class="col-6 py-2">{{\Carbon\Carbon::now()->format('d M Y')}}</span>
                            <b class="col-6 py-2">Jenis Pengajuan</b>
                            <span class="col-6 py-2">Baru</span>
                        </div>
                        <div class="col-6 py-2">
                            <b class="col-6 py-2">Jenis Pendaftaran</b>
                            <span class="col-6 py-2">Mandiri</span>
                        </div>
                    </div>
                    {{-- Data Pelaku Usaha --}}
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <h6 class="text-danger col-12">
                                <b>Data pelaku usaha*</b>
                            </h6>
                            <div class="row col-12">
                                <b class="col-6 py-2">Nama</b>
                                <div class="col-6 form-group">
                                    <input
                                        class="form-control form-control-user @error('reg-name') is-invalid @enderror"
                                        type="text" placeholder="Nama pelaku usaha"
                                        value="{{$data ? 'isiin $data->variablenya' : old('reg-name')}}"
                                        name="reg-name" />
                                    @error('reg-name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <b class="col-6 py-2">Alamat</b>
                                <div class="col-6 form-group">
                                    <input
                                        class="form-control form-control-user @error('reg-address') is-invalid @enderror"
                                        type="text" placeholder="Alamat pelaku usaha"
                                        value="{{$data ? 'isiin $data->variablenya' : old('reg-address')}}"
                                        name="reg-address" />
                                    @error('reg-address')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <b class="col-6 py-2">Jenis Usaha</b>
                                <div class="col-6 form-group">
                                    <select name="reg-business-type" class="form-control form-control-user
                                    @error('reg-business-type') is-invalid @enderror">
                                        <option value="makanan" {{($data ? 'isiin $data->variablenya' :
                                            old('reg-business-type'))=='makanan' ? 'selected' : '' }}>
                                            Makanan</option>
                                        <option value="minuman" {{($data ? 'isiin $data->variablenya' :
                                            old('reg-business-type'))=='minuman' ? 'selected' : '' }}>
                                            Minuman</option>
                                    </select>
                                </div>
                                <b class="col-6 py-2">Skala Usaha</b>
                                <div class="col-6 form-group">
                                    <input
                                        class="form-control form-control-user @error('reg-business-scale') is-invalid @enderror"
                                        type="text" placeholder="UMKM"
                                        value="{{$data ? 'isiin $data->variablenya' : old('reg-business-scale')}}"
                                        name="reg-business-scale" />
                                    @error('reg-business-scale')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </h6>
                    </div>
                    <!-- Certification -->
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Pengajuan Sertifikasi*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">No. Surat Permohonan</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user @error('sertif-number') is-invalid @enderror"
                                    type="text" placeholder="No. Surat Permohonan"
                                    value="{{$data ? $data->id : old('sertif-number')}}" name="sertif-number" />
                                @error('sertif-number')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class="col-6 py-2">Jenis Layanan</b>
                            <div class="col-6 form-group">
                                <select name="sertif-layanan" class="form-control form-control-user
                                    @error('sertif-layanan') is-invalid @enderror">
                                    <option value="makanan" {{($data ? $data->service_type :
                                        old('sertif-layanan'))=='makanan' ? 'selected' : '' }}>
                                        Makanan</option>
                                    <option value="minuman" {{($data ? $data->service_type :
                                        old('sertif-layanan'))=='minuman' ? 'selected' : '' }}>
                                        Minuman</option>
                                </select>
                                @error('sertif-layanan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class="col-6 py-2">Jenis Produk</b>
                            <div class="col-6 form-group">
                                <select name="sertif-jenis-produk"
                                    class="form-control form-control-user @error('sertif-jenis-produk') is-invalid @enderror"
                                    style="overflow-x: auto;" value="{{old('sertif-jenis-produk')}}">
                                    @foreach($list_product as $value)
                                    <option value="{{Str::slug($value)}}" {{($data ? $data->product_type :
                                        old('sertif-jenis-produk'))==Str::slug($value) ? 'selected' : '' }}>
                                        {{$value}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('sertif-jenis-produk')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class="col-6 py-2">Jenis Dagang</b>
                            <div class="col-6 form-group" class="form-control form-control-user">
                                {{-- <input type="text" class="form-control form-control-user"
                                    placeholder="Merek Dagang" value="" name="sertif-merek" /> --}}
                                <textarea id="" cols="20" rows="5" type=" text"
                                    class="form-control form-control-user @error('sertif-merek') is-invalid @enderror"
                                    placeholder="Merek Dagang" name="sertif-merek">{{$data ? $data->doc_type :
                                        old('sertif-merek')}}</textarea>
                                @error('sertif-merek')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class=" col-6 py-2">Area Pemasaran</b>
                            <div class="col-6 form-group">
                                <select name="sertif-area"
                                    class="form-control @error('sertif-area') is-invalid @enderror form-control-user"
                                    value="{{old('sertif-area')}}">
                                    <option value="area-pemasaran1" {{($data ? $data->install_area :
                                        old('sertif-area'))=='area-pemasaran1' ? 'selected' : '' }}>
                                        area pemasaran 1
                                    </option>
                                    <option value="area-pemasaran2" {{($data ? $data->install_area :
                                        old('sertif-area'))=='area-pemasaran2' ? 'selected' : '' }}>
                                        area pemasaran 2
                                    </option>
                                    @error('sertif-area')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </select>

                            </div>
                            <b class="col-6 py-2">LPH</b>
                            <div class="col-6 form-group">
                                <select name="sertif-lph" value="{{old('sertif-lph')}}"
                                    class="form-control @error('sertif-lph') is-invalid @enderror form-control-user">
                                    <option value="lph1" {{($data ? $data->lph :
                                        old('sertif-lph'))=='lph1' ? 'selected' : '' }}>lph 1</option>
                                    <option value="lph2" {{($data ? $data->lph :
                                        old('sertif-lph'))=='lph2' ? 'selected' : '' }}>lph 2</option>
                                </select>
                                @error('sertif-lph')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class="col-6 py-2">Tgl Surat Permohonan</b>
                            <div class="col-6 form-group">
                                <input type="date"
                                    class="form-control form-control-user @error('sertif-tgl-surat-permohonan') is-invalid @enderror"
                                    name="sertif-tgl-surat-permohonan"
                                    value="{{$data ?  date('Y-m-d', strtotime($data->date)) : old('sertif-tgl-surat-permohonan')}}" />
                                @error('sertif-tgl-surat-permohonan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Responsibler -->
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Penanggung Jawab*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Nama</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control @error('responsibler-name') is-invalid @enderror form-control-user"
                                    type="text" placeholder="Nama"
                                    value="{{$data ? $data->responsibler->name : old('responsibler-name')}}"
                                    name="responsibler-name" />
                                @error('responsibler-name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class="col-6 py-2">Email</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control @error('responsibler-email') is-invalid @enderror form-control-user"
                                    type="text" placeholder="Email"
                                    value="{{$data ? $data->responsibler->email : old('responsibler-email')}}"
                                    name="responsibler-email" />
                                @error('responsibler-email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <b class="col-6 py-2">No. Telpon</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control @error('responsibler-telp') is-invalid @enderror form-control-user"
                                    type="text" placeholder="No Telepon"
                                    value="{{$data ? $data->responsibler->number : old('responsibler-telp')}}"
                                    name="responsibler-telp" />
                                @error('responsibler-telp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Legal Aspect -->
                    @if (count($errors->get('aspect-doc-number.*')))
                    @foreach ($errors->get('aspect-doc-number.*') as $index => $value)
                    <x-forms.legal-aspect :legal="explode('.',$index)[1]" />
                    @endforeach
                    @elseif($data)
                    @foreach ($data->legalist as $index => $value)
                    <x-forms.legal-aspect :val="$value" :idx="$index" />
                    @endforeach
                    @else
                    <x-forms.legal-aspect />
                    @endif

                    <!-- Factory -->
                    @if (count($errors->get('factory-name.*')))
                    @foreach ($errors->get('factory-name.*') as $index => $value)
                    <x-forms.factory :legal="explode('.',$index)[1]" />
                    @endforeach
                    @elseif($data)
                    @foreach ($data->factories as $index => $value)
                    <x-forms.factory :val="$value" :idx="$index" />
                    @endforeach
                    @else
                    <x-forms.factory />
                    @endif

                    <!-- outlet -->
                    @if (count($errors->get('outlet-name.*')))
                    @foreach ($errors->get('outlet-name.*') as $index => $value)
                    <x-forms.outlet :legal="explode('.',$index)[1]" />
                    @endforeach
                    @elseif($data)
                    @foreach ($data->factories as $index => $value)
                    <x-forms.outlet :val="$value" :idx="$index" />
                    @endforeach
                    @else
                    <x-forms.outlet />
                    @endif

                    <!-- Product -->
                    @if (count($errors->get('product-name.*')))
                    @foreach ($errors->get('product-name.*') as $index => $value)
                    <x-forms.product :legal="explode('.',$index)[1]" />
                    @endforeach
                    @elseif($data)
                    @foreach ($data->factories as $index => $value)
                    <x-forms.product :val="$value" :idx="$index" />
                    @endforeach
                    @else
                    <x-forms.product />
                    @endif

                    <div class="d-flex justify-content-center mb-4">
                        <button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal"
                            data-bs-target="#actionModal">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <!-- Document -->
            <div class="card shadow mb-5">
                <div class="card-header">
                    <h4 class="mb-0 text-white py-2 text-center">
                        <b>Dokumen Persyaratan</b>
                    </h4>
                </div>
                <div class="card-body py-2 px-3">
                    <ul class="pl-0" style="list-style-type: none">
                        @foreach ($list_file as $file => $value)
                        <li class="row">
                            <p class="mb-2 col-6">
                                {{ $value["title"] }}
                                @if($value['name'] !== 'lainnya')
                                <span class="text-danger">*</span>
                                @else
                                @endif
                            </p>
                            <div class="input-group mb-3 col-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="{{ $value['name'] }}"
                                        name="file{{$file}}" />
                                    <label class="custom-file-label" for="{{ $value['name'] }}"
                                        aria-describedby="inputGroupFileAddon02">Pilih File</label>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionModalLabel">
                        <i class="fa fa-angle-left mt-1 mr-2" style="cursor: pointer" data-bs-dismiss="modal"></i>
                        <span id="status_name" class="text-capitalize"></span>
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row p-2">
                        <h5 id="confirm-parent" class="text-center col-12 mb-0">Pastikan Data Yang Anda Kirim Benar!
                        </h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection