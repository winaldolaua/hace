@extends('layout.main') @section('container')
<div class="m-5">
    <h1><b>Detail Sertifikasi</b></h1>
</div>
<div class="row mx-4">
    <div class="row col-12">
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
                            <span class="col-6 py-2">{{ \Carbon\Carbon::now()->format('d M Y') }}</span>
                            <b class="col-6 py-2">Jenis Pengajuan</b>
                            <span class="col-6 py-2">Baru</span>
                        </div>
                        <div class="col-6 py-2">
                            <b class="col-6 py-2">Jenis Pendaftaran</b>
                            <span class="col-6 py-2">Mandiri</span>
                        </div>
                    </div>
                    <!-- Certification -->
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Pengajuan Sertifikasi*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">No. Surat Permohonan</b>
                            <span class="col-6 py-2">{{ $data->id_number }}</span>
                            <b class="col-6 py-2">Jenis Layanan</b>
                            <span class="col-6 py-2">{{ $data->service_type }}</span>
                            <b class="col-6 py-2">Jenis Produk</b>
                            <span class="col-6 py-2">{{ $data->product_type }}</span>
                            <b class="col-6 py-2">Jenis Dagang</b>
                            <span class="col-6 py-2">{{ $data->doc_type }}</span>
                            <b class="col-6 py-2">Area Pemasaran</b>
                            <span class="col-6 py-2">{{ $data->install_area }}</span>
                            <b class="col-6 py-2">LPH</b>
                            <span class="col-6 py-2">{{ $data->lph }}</span>
                            <b class="col-6 py-2">Tgl Surat Permohonan</b>
                            <span class="col-6 py-2">{{ \Carbon\Carbon::parse($data->created_at)->format('d M
                                Y') }}</span>
                        </div>
                    </div>
                    <!-- Responsibler -->
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Penanggung Jawab*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Nama</b>
                            <span class="col-6 py-2">{{ $data->responsibler->name }}</span>
                            <b class="col-6 py-2">Email</b>
                            <span class="col-6 py-2">{{ $data->responsibler->email }}</span>
                            <b class="col-6 py-2">No. Telpon</b>
                            <span class="col-6 py-2">{{ $data->responsibler->number }}</span>
                        </div>
                    </div>
                    <!-- Legal Aspect -->
                    <div class="row mb-5 dynamic-element-parent" data-name="legal-aspect">
                        <h6 class="text-danger col-12">
                            <b>Aspek Legal*</b>
                        </h6>
                        @foreach ($data->legalist as $index => $legal)
                        <div class="row col-12 my-3">
                            <b class="col-6 py-2">Jenis Dokumen</b>
                            <span class="col-6 py-2">{{ $legal->type }}</span>
                            <b class="col-6 py-2">No. Dokumen</b>
                            <span class="col-6 py-2">{{ $legal->number }}</span>
                            <b class="col-6 py-2">Tanggal Dokumen</b>
                            <span class="col-6 py-2">{{ \Carbon\Carbon::parse($legal->date)->format('d M Y') }}</span>
                            <b class="col-6 py-2">Instansi Penerbit</b>
                            <span class="col-6 py-2">{{ $legal->agency_name }}</span>
                        </div>
                        @endforeach
                    </div>
                    <!-- Factory -->
                    <div class="row mb-5 dynamic-element-parent" data-name="factory">
                        <h6 class="text-danger col-12">
                            <b>Pabrik*</b>
                        </h6>
                        @foreach ($data->factories as $index => $fac)
                        <div class="row col-12 my-3">
                            <b class="col-6 py-2">Nama Pabrik</b>
                            <span class="col-6 py-2">{{ $fac->name }}</span>
                            <b class="col-6 py-2">Alamat</b>
                            <span class="col-6 py-2">{{ $fac->address }}</span>
                            <b class="col-6 py-2">Kab/Kota</b>
                            <span class="col-6 py-2">{{ $fac->city }}</span>
                            <b class="col-6 py-2">Negara</b>
                            <span class="col-6 py-2">{{ $fac->country }}</span>
                            <b class="col-6 py-2">Provinsi</b>
                            <span class="col-6 py-2">{{ $fac->region }}</span>
                            <b class="col-6 py-2">Kode Pos</b>
                            <span class="col-6 py-2">{{ $fac->pos }}</span>
                        </div>
                        @endforeach
                    </div>
                    <!-- outlet -->
                    <div class="row mb-5 dynamic-element-parent" data-name="outlet">
                        <h6 class="text-danger col-12">
                            <b>Outlet*</b>
                        </h6>
                        @foreach ($data->outlet as $index => $out)
                        <div class="row col-12 my-3">
                            <b class="col-6 py-2">Nama Outlet</b>
                            <span class="col-6 py-2">{{ $out->name }}</span>
                            <b class="col-6 py-2">Alamat</b>
                            <span class="col-6 py-2">{{ $out->address }}</span>
                            <b class="col-6 py-2">Kab/Kota</b>
                            <span class="col-6 py-2">{{ $out->city }}</span>
                            <b class="col-6 py-2">Provinsi</b>
                            <span class="col-6 py-2">{{ $out->region }}</span>
                            <b class="col-6 py-2">Negara</b>
                            <span class="col-6 py-2">{{ $out->country }}</span>
                        </div>
                        @endforeach
                    </div>
                    <!-- Product -->
                    <div class="row mb-5 dynamic-element-parent" data-name="outlet">
                        <h6 class="text-danger col-12">
                            <b>Nama Produk*</b>
                        </h6>
                        @foreach ($data->product as $index => $prod)
                        <div class="row col-12 my-3">
                            <b class="col-6 py-2">Nama Produk</b>
                            <span class="col-6 py-2">{{ $prod->product_name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            {{--<div class="card shadow mb-5">
                <div class="card-header">
                    <h4 class="mb-0 text-white py-2">
                        <b>Data Pelaku Usaha</b>
                    </h4>
                </div>
                <div class="card-body py-2 px-3">
                    <div class="mb-2 d-flex flex-column">
                        <span>Nama</span>
                        <b>xxxxxxx</b>
                    </div>
                    <div class="mb-2 d-flex flex-column">
                        <span>Alamat</span>
                        <b>Jl. xxxxxxx</b>
                    </div>
                    <div class="mb-2 d-flex flex-column">
                        <span>Jenis Usaha</span>
                        <b>xxxxxxx</b>
                    </div>
                    <div class="mb-2 d-flex flex-column">
                        <span>Skala Usaha</span>
                        <b>xxxxxxx</b>
                    </div>
                </div>
            </div>--}}
            <!-- Document -->
            <div class="card shadow mb-5">
                <div class="card-header">
                    <h4 class="mb-0 text-white py-2 text-center">
                        <b>Dokumen Persyaratan</b>
                    </h4>
                </div>
                <div class="card-body py-2 px-3">
                    <ul class="pl-0" style="list-style-type: none">
                        @foreach ($file_data as $file => $value)
                        <li class="row align-items-center mt-2 mb-2">
                            <p class="mb-2 col-6">
                                {{$file+1}}. {{ $value->type }}
                            </p>
                            <a class="btn btn-primary" href="{{asset('storage/'.$value->type.'/'.$value->name)}}"
                                target="_blank" download>Download</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection