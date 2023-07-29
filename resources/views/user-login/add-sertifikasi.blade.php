@extends('layout.main') @section('container')
<div class="m-5">
    <h1><b>Tambah Sertifikasi</b></h1>
</div>
<div class="row mx-4">
    <form action="{{ route('add-sertif') }}" method="post" class="row col-12">
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
                            <span class="col-6 py-2">xx</span>
                            <b class="col-6 py-2">Tanggal</b>
                            <span class="col-6 py-2">04/06/2023</span>
                            <b class="col-6 py-2">Jenis Pengajuan</b>
                            <span class="col-6 py-2">Baru</span>
                        </div>
                        <div class="col-6 py-2">
                            <b class="col-6 py-2">Jenis Pendaftaran</b>
                            <span class="col-6 py-2">Mandiri</span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Pengajuan Sertifikasi*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">No. Surat Permohonan</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="No. Surat
                                Permohonan"
                                    value="1241223"
                                    name="pengajuan-nama"
                                />
                            </div>
                            <b class="col-6 py-2">Jenis Layanan</b>
                            <div class="col-6 form-group">
                                <select
                                    name="pengajuan-layanan"
                                    class="form-control form-control-user"
                                >
                                    <option value="layanan1">layanan 1</option>
                                    <option value="layanan2">layanan 2</option>
                                </select>
                            </div>
                            <b class="col-6 py-2">Jenis Produk</b>
                            <div class="col-6 form-group">
                                <select
                                    name="pengajuan-jenis-product"
                                    class="form-control form-control-user"
                                >
                                    <option value="jenis-product1">
                                        jenis product 1
                                    </option>
                                    <option value="jenis-product2">
                                        jenis product 2
                                    </option>
                                </select>
                            </div>
                            <b class="col-6 py-2">Jenis Dagang</b>
                            <div
                                class="col-6 form-group"
                                class="form-control form-control-user"
                            >
                                <input
                                    type="text"
                                    class="form-control form-control-user"
                                    placeholder="Merek Dagang"
                                    value="Merek {{Str::random(4)}}"
                                    name="pengajuan-merek"
                                />
                            </div>
                            <b class="col-6 py-2">Area Pemasaran</b>
                            <div class="col-6 form-group">
                                <select
                                    name="pengajuan-area"
                                    class="form-control form-control-user"
                                >
                                    <option value="area-pemasaran1">
                                        area pemasaran 1
                                    </option>
                                    <option value="area-pemasaran2">
                                        area pemasaran 2
                                    </option>
                                </select>
                            </div>
                            <b class="col-6 py-2">LPH</b>
                            <div class="col-6 form-group">
                                <select
                                    name="pengajuan-lph"
                                    class="form-control form-control-user"
                                >
                                    <option value="lph1">lph 1</option>
                                    <option value="lph2">lph 2</option>
                                </select>
                            </div>
                            <b class="col-6 py-2">Tgl Surat Permohonan</b>
                            <div class="col-6 form-group">
                                <input
                                    type="date"
                                    class="form-control form-control-user"
                                    name=" pengajuan-tgl-surat-permohonan"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Penanggung Jawab*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Nama</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Nama"
                                    value="Nama {{Str::random(10)}}"
                                    name="penanggung-nama"
                                />
                            </div>
                            <b class="col-6 py-2">Email</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Email"
                                    value="{{Str::random(10)}}@gmail.com"
                                    name="penanggung-email"
                                />
                            </div>
                            <b class="col-6 py-2">No. Telpon</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="No Telepon"
                                    value="{{Str::random(12)}}"
                                    name="penanggung-telp"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Aspek Legal*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Jenis Dokumen</b>
                            <div class="col-6 form-group">
                                <select
                                    name="aspek-dok"
                                    class="form-control form-control-user"
                                >
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
                                <input
                                    type="text"
                                    placeholder="No. Dokumen"
                                    value="{{Str::random(10)}}"
                                    class="form-control form-control-user"
                                    name="aspek-no-dok"
                                />
                            </div>
                            <b class="col-6 py-2">Tanggal Dokumen</b>
                            <div class="col-6 form-group">
                                <input
                                    type="date"
                                    name="aspek-date"
                                    class="form-control form-control-user"
                                />
                            </div>
                            <b class="col-6 py-2">Instansi Penerbit</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Instansi Penerbit"
                                    value="penerbit {{Str::random(5)}}"
                                    name="aspek-instansi"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Aspek Legal*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Jenis Dokumen</b>
                            <div class="col-6 form-group">
                                <select
                                    name="aspek-dok"
                                    class="form-control form-control-user"
                                >
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
                                <input
                                    type="text"
                                    placeholder="No. Dokumen"
                                    value="{{Str::random(10)}}"
                                    class="form-control form-control-user"
                                    name="aspek-no-dok"
                                />
                            </div>
                            <b class="col-6 py-2">Tanggal Dokumen</b>
                            <div class="col-6 form-group">
                                <input
                                    type="date"
                                    name="aspek-date"
                                    class="form-control form-control-user"
                                />
                            </div>
                            <b class="col-6 py-2">Instansi Penerbit</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Instansi Penerbit"
                                    value="penerbit {{Str::random(5)}}"
                                    name="aspek-instansi"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Pabrik*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Nama Pabrik</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Nama"
                                    value="Pabrik {{Str::random(10)}}"
                                    name="pabrik-nama"
                                />
                            </div>
                            <b class="col-6 py-2">Alamat</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Alamat"
                                    value="Alamat {{Str::random(10)}}"
                                    name="pabrik-alamat"
                                />
                            </div>
                            <b class="col-6 py-2">Kab/Kota</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Kab/Kota"
                                    value="kab/kota {{Str::random(10)}}"
                                    name="pabrik-kab"
                                />
                            </div>
                            <b class="col-6 py-2">Negara</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Negara"
                                    value="Negara {{Str::random(10)}}"
                                    name="pabrik-negara"
                                />
                            </div>
                            <b class="col-6 py-2">Provinsi</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Provinsi"
                                    value="Provinsi {{Str::random(10)}}"
                                    name="pabrik-prov"
                                />
                            </div>
                            <b class="col-6 py-2">Kode Pos</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Kode Pos"
                                    value="kode pos {{Str::random(4)}}"
                                    name="pabrik-pos"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Outlet*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Nama Outlet</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Nama"
                                    value="Outlet {{Str::random(10)}}"
                                    name="outlet-nama"
                                />
                            </div>
                            <b class="col-6 py-2">Alamat</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Alamat"
                                    value="Alamat {{Str::random(10)}}"
                                    name="outlet-alamat"
                                />
                            </div>
                            <b class="col-6 py-2">Kab/Kota</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Kab/Kota"
                                    value="Kab/kota {{Str::random(10)}}"
                                    name="outlet-kab"
                                />
                            </div>
                            <b class="col-6 py-2">Provinsi</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Provinsi"
                                    value="Prov {{Str::random(10)}}"
                                    name="outlet-prov"
                                />
                            </div>
                            <b class="col-6 py-2">Negara</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Negara"
                                    value="Negara {{Str::random(10)}}"
                                    name="outlet-negara"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h6 class="text-danger col-12">
                            <b>Nama Produk*</b>
                        </h6>
                        <div class="row col-12">
                            <b class="col-6 py-2">Nama Produk</b>
                            <div class="col-6 form-group">
                                <input
                                    class="form-control form-control-user"
                                    type="text"
                                    placeholder="Nama"
                                    value="Produk.{{Str::random(10)}}"
                                    name="produk-nama"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <button class="btn btn-primary mx-auto">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-5">
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
                        <b>Jl. in aja dulu</b>
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
            </div>
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
                                <span class="text-danger">*</span>
                            </p>
                            <div class="input-group mb-3 col-6">
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        id="{{ $value['name'] }}"
                                    />
                                    <label
                                        class="custom-file-label"
                                        for="{{ $value['name'] }}"
                                        aria-describedby="inputGroupFileAddon02"
                                        >Pilih File</label
                                    >
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
