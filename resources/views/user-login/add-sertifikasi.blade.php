@extends('layout.main') @section('container')
<div class="container">
    <h1><b>Tambah Sertifikasi</b></h1>
</div>
<div class="row container">
    <form action="{{ route('add-sertif') }}" method="post">
        @csrf
        <div class="col-12">
            <div class="card shadow mb-5">
                <h3>Pengajuan Sertifikasi</h3>
                <input type="text" placeholder="No. Surat Permohonan" value="1241223" name="pengajuan-nama">
                <Select name="pengajuan-layanan">
                    <option value="layanan1">layanan 1</option>
                    <option value="layanan2">layanan 2</option>
                </Select>
                <Select name="pengajuan-jenis-product">
                    <option value="jenis-product1">jenis product 1</option>
                    <option value="jenis-product2">jenis product 2</option>
                </Select>
                <input type="text" placeholder="Merek Dagang" value="Merek {{Str::random(4)}}" name="pengajuan-merek">
                <Select name="pengajuan-area">
                    <option value="area-pemasaran1">area pemasaran 1</option>
                    <option value="area-pemasaran2">area pemasaran 2</option>
                </Select>
                <Select name="pengajuan-lph">
                    <option value="lph1">lph 1</option>
                    <option value="lph2">lph 2</option>
                </Select>
                <input type="date"" name=" pengajuan-tgl-surat-permohonan">
            </div>
            <div class=" card shadow mb-5">
                <h3>Penanggung Jawab</h3>
                <input type="text" placeholder="Nama" value="Nama {{Str::random(10)}}" name="penanggung-nama">
                <input type="text" placeholder="Email" value="{{Str::random(10)}}@gmail.com" name="penanggung-email">
                <input type="number" placeholder="No Telepon" value="{{Str::random(12)}}" name="penanggung-telp">
            </div>
            <div class="card shadow mb-5">
                <h3>Aspek Legal</h3>
                <input type="text" placeholder="Nama" value="Nama {{Str::random(10)}}" name="aspek-nama">
                <Select name="aspek-dok">
                    <option value="jenis-dokumen1">jenis dokumen 1</option>
                    <option value="jenis-dokumen2">jenis dokumen 2</option>
                </Select>
                <input type="number" placeholder="No. Dokumen" value="{{Str::random(10)}}" name="aspek-no-dok">
                <input type="date" name="aspek-date">
                <input type="text" placeholder="Instansi Penerbit" value="penerbit {{Str::random(5)}}"
                    name="aspek-instansi">
            </div>
            <div class="card shadow mb-5">
                <h3>Pabrik</h3>
                <input type="text" placeholder="Nama" value="Pabrik {{Str::random(10)}}" name="pabrik-nama">
                <input type="text" placeholder="Alamat" value="Alamat {{Str::random(10)}}" name="pabrik-alamat">
                <input type="text" placeholder="Kab/Kota" value="kab/kota {{Str::random(10)}}" name="pabrik-kab">
                <input type="text" placeholder="Negara" value="Negara {{Str::random(10)}}" name="pabrik-negara">
                <input type="text" placeholder="Provinsi" value="Provinsi {{Str::random(10)}}" name="pabrik-prov">
                <input type="number" placeholder="Kode Pos" value="kode pos {{Str::random(4)}}" name="pabrik-pos">
                <input type="text" placeholder="status" value="Status {{Str::random(10)}}" name="pabrik-status">
            </div>
            <div class="card shadow mb-5">
                <h3>Outlet</h3>
                <input type="text" placeholder="Nama" value="Outlet {{Str::random(10)}}" name="outlet-nama">
                <input type="text" placeholder="Alamat" value="Alamat {{Str::random(10)}}" name="outlet-alamat">
                <input type="text" placeholder="Kab/Kota" value="Kab/kota {{Str::random(10)}}" name="outlet-kab">
                <input type="text" placeholder="Provinsi" value="Prov {{Str::random(10)}}" name="outlet-prov">
                <input type="text" placeholder="Negara" value="Negara {{Str::random(10)}}" name="outlet-negara">
            </div>
            <div class="card shadow mb-5">
                <h3>Penyelia Halal</h3>
                <input type="text" placeholder="Nama" value="Nama Penyelia {{Str::random(10)}}" name="penyelia-nama">
                <input type="number" placeholder="no sertifikat diklat" value="No.sertif {{Str::random(10)}}"
                    name="penyelia-no-sertif">
                <input type="number" placeholder="no sk penetapan penyelia halal" value="No.sk {{Str::random(10)}}"
                    name="penyelia-sk">
                <input type="number" placeholder="no kontak" value="No.kontak{{Str::random(10)}}"
                    name="penyelia-kontak">
                <input type="number" placeholder="no ktp" value="Ktp.{{Str::random(10)}}" name="penyelia-ktp">
                <input type="date" name="penyelia-tgl-sertif">
                <input type="date" name="penyelia-tgl-sk">
            </div>
            <div class="card shadow mb-5">
                <h3>Nama Produk</h3>
                <input type="text" placeholder="Nama" value="Produk.{{Str::random(10)}}" name="produk-nama">
            </div>
        </div>
        <button>Kirim</button>
    </form>
</div>
@endsection