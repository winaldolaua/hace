@extends('layout.main') @section('container')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session("success") }}
</div>
@endif
<div class="m-5">
    <h1><b>Product</b></h1>
</div>
<div class="row mx-4">
    <div class="col-12">
        <div class="card shadow mb-5">
            <div class="card-body p-2">
                <div class="row my-4 mx-2">
                    <div class="col-12">
                        <form action="{{ $request->url() }}" method="GET">
                            @if (isset($request->status))
                            <input type="hidden" name="status" value="{{$request->status}}" />
                            @endif
                            <input type="text" name="search" class="form-control bg-light border-0 small"
                                placeholder="Search " aria-label="Search" aria-describedby="basic-addon2"
                                value="{{$request->search}}" />
                        </form>
                    </div>
                </div>
                {{--/TODO: PAGINATION--}}
                <div class="table-responsive px-2">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No. Pendaftaran</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jenis Pengajuan</th>
                                <th>Tipe Produk</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Tagihan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $value)
                            <tr>
                                <td>{{$value->id_number}}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($value->date)->format('d M Y')}}
                                </td>
                                <td>{{$value->responsibler->name}}</td>
                                <td>{{$value->service_type}}</td>
                                <td>{{$value->product_type}}</td>
                                <td class="text-capitalize text-center ">
                                    <span class="badge badge-{{$value->status->color}}">

                                        {{$value->status->name}}
                                    </span>
                                </td>
                                <td>{{$value->notes ? $value->notes : '-'}}</td>
                                <td>{{$value->bills ? "Rp. ".number_format($value->bills) : '-'}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- ALL --}}
                                            <a class="dropdown-item"
                                                href="{{url('sertifikasi/detail/'.$value->id_number)}}">Detail</a>
                                            {{-- AUDITOR --}}
                                            @can('auditor')
                                            @if ($value->status->name === "verifikasi")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'file', false, 'perhitungan_biaya')">
                                                Kirim File Perhitungan Biaya
                                            </button>
                                            @endif
                                            @if ($value->status->name === "lunas")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'confirm')">
                                                Verifikasi
                                            </button>
                                            @endif
                                            @if ($value->status->name === "lunas")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'notes', 11)">
                                                Batalkan
                                            </button>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}','notes', 10)">
                                                Kembalikan
                                            </button>
                                            @endif
                                            @endcan

                                            {{-- PENYELIA --}}
                                            @can('penyelia')
                                            @if ($value->status->name === "belum bayar")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'file', false, 'bukti_transfer')">
                                                Kirim Bukti Transfer
                                            </button>
                                            @endif
                                            @if ($value->status->name === "selesai")
                                            <a class="dropdown-item"
                                                href="{{ asset('storage/sertifikat').'/'.$value->document->firstWhere('type' , 'sertifikat' )->name}}"
                                                download>
                                                Unduh Sertifikat
                                            </a>
                                            @endif
                                            @if ($value->status->name === "lunas")
                                            <a class="dropdown-item"
                                                href="{{ asset('storage/sttd').'/'.$value->document->firstWhere('type' , 'sttd' )->name}}"
                                                download>
                                                Unduh STTD
                                            </a>
                                            @endif
                                            @if ($value->status->name !== "selesai")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'confirm', 11)">
                                                Batalkan
                                            </button>
                                            @endif
                                            @endcan

                                            {{-- BPJPH --}}
                                            @can('bpjph')
                                            @if ($value->status->name === "validasi")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'confirm')">
                                                Validasi
                                            </button>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}','notes', 10)">
                                                Kembalikan
                                            </button>
                                            @endif
                                            @if ($value->status->name === "selesai verifikasi")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'number')">
                                                Buat Tagihan
                                            </button>
                                            <a class="dropdown-item"
                                                href="{{ asset('storage/perhitungan_biaya').'/'.$value->document->firstWhere('type' , 'perhitungan_biaya' )->name}}"
                                                download>
                                                Unduh Perhitungan Biaya
                                            </a>
                                            {{-- download --}}
                                            @endif
                                            @if ($value->status->name === "validasi transaksi")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'file', false, 'sttd')">
                                                Kirim STTD
                                            </button>
                                            <a class="dropdown-item"
                                                href="{{ asset('storage/bukti_transfer').'/'.$value->document->firstWhere('type' , 'bukti_transfer' )->name}}"
                                                download>
                                                Cek Bukti Transaksi
                                            </a>
                                            @endif
                                            @if ($value->status->name === "lulus sidang")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal" onclick="openModal({{$value->id}}, ' {{$value->status->id}}',
                                                '{{$value->status->name}}', 'file', false, 'sertifikat')">
                                                Kirim Sertifikat
                                            </button>
                                            @endif
                                            @endcan

                                            {{-- MUI --}}
                                            @can('mui')
                                            @if ($value->status->name === "sidang fatwa")
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#actionModal"
                                                onclick="openModal({{$value->id}}, '{{$value->status->id}}', '{{$value->status->name}}', 'confirm')">
                                                Verifikasi Hasil Fatwa</button>
                                            @endif
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-2">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">
                    <i class="fa fa-angle-left mt-1 mr-2" style="cursor: pointer" data-bs-dismiss="modal"></i>
                    Ajukan Sertifikat
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="text-white text-center w-100 d-block mb-0">
                                    <b>Baru</b>
                                </h5>
                            </div>
                            <div class="card-body my-auto">
                                <p class="p-3 text-center mb-0">
                                    Proses sertifikasi halal untuk produk baru
                                    yang
                                    <b>belum pernah/belum memiliki
                                        sertifikasi</b>
                                    halal sebelumnya.
                                </p>
                            </div>
                            <div class="card-footer d-flex">
                                <a href="{{ url('/sertifikasi/add') }}" class="btn btn-primary mx-auto">
                                    Daftar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card h-100">
                            <div class="card-header bg-danger">
                                <h5 class="text-white text-center w-100 d-block mb-0">
                                    <b>Pembaruan</b>
                                </h5>
                            </div>
                            <div class="card-body my-auto">
                                <p class="p-3 text-center mb-0">
                                    Proses sertifikasi halal untuk
                                    <b class="text-danger">memperpanjang masa berlaku</b>
                                    sertifikasi halal yang akanberakhir pada
                                    produk yang sudah memiliki sertifikasi halal
                                    sebelumnya.
                                </p>
                            </div>
                            <div class="card-footer d-flex">
                                <button class="btn btn-primary mx-auto" disabled>
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card h-100">
                            <div class="card-header bg-primary">
                                <h5 class="text-white text-center w-100 d-block mb-0">
                                    <b>Baru</b>
                                </h5>
                            </div>
                            <div class="card-body my-auto">
                                <p class="p-3 text-center mb-0">
                                    Proses sertifikasi halal untuk produk baru
                                    yang
                                    <b class="text-primary">menambahkan/ mengembangkan</b>
                                    dari produk yang telah memiliki sertifikasi
                                    halal dan sertifikasi halal masih berlaku.
                                </p>
                            </div>
                            <div class="card-footer d-flex">
                                <button class="btn btn-primary mx-auto" disabled>
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Aksi -->
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">
                    <i class="fa fa-angle-left mt-1 mr-2" style="cursor: pointer" data-bs-dismiss="modal"></i>
                    <span id="status_name" class="text-capitalize"></span>
                </h5>
            </div>
            <form action="{{ url('/updateStatus') }}" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="row p-2">
                        <div id="notes-parent" class="form-group col-12">
                            <label for="notes">Catatan</label>
                            <textarea id="notes" name="notes" rows="5" placeholder="Masukkan catatan..."
                                class="form-control form-control-user"></textarea>
                        </div>
                        <div id="number-parent" class="form-group col-12">
                            <label for="number">Nominal</label>
                            <input type="number" name="number" placeholder="masukkan nominal..."
                                class="form-control form-control-user">
                        </div>
                        <div id="file-parent" class="form-group col-12">
                            <label for="file">File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file_input" id="file_input" />
                                <label class="custom-file-label" for="file_input">Pilih File</label>
                            </div>
                            <input id="file_type" type="hidden" name="file_type">
                        </div>
                        <h5 id="confirm-parent" class="text-center col-12 mb-0">Apakah Anda Yakin?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    @csrf
                    <input id="id_sertif" type="hidden" name="id">
                    <input id="status_sertif" type="hidden" name="status" value="3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function openModal(id, status_id, status_name, type = "confirm", custom_status = false, file_type = false) {
        // hide all
        $('#notes-parent').hide()
        $('#file-parent').hide()
        $('#confirm-parent').hide()
        $('#number-parent').hide()

        $(`#${type}-parent`).show()
        if (type === 'file') {
            $('#file_type').val(file_type)
        }

        $('#status_name').text(status_name)
        $('#id_sertif').val(id)
        if (custom_status) {
            $('#status_sertif').val(custom_status)
        } else {
            $('#status_sertif').val(parseInt(status_id) + 1)
        }

    }
</script>
@endsection