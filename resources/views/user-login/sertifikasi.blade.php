@extends('layout.main') @section('container')
<div class="container">
    <h1><b>Sertifikasi Mandiri</b></h1>
</div>
<div class="row container">
    <div class="col-12">
        <div class="card shadow mb-5">
            <div class="card-body p-2">
                <ul class="nav nav-tabs row ml-1">
                    <li class="nav-item">
                        <a
                            class="nav-link {{
                                $current_status
                                    ? 'text-secondary'
                                    : 'active text-success border-top-0 border-right-0 border-left-0 border-bottom-success border-bottom-1'
                            }}"
                            aria-current="page"
                            href="/sertifikasi"
                            ><small>Semua</small>
                        </a>
                    </li>
                    @foreach ($status as $st => $value)
                    <li class="nav-item">
                        <a
                            class="nav-link text-capitalize {{
                                $current_status === $value->name ? 'active text-success border-top-0 border-right-0 border-left-0 border-bottom-success border-bottom-1' : 'text-secondary'
                            }}"
                            aria-current="page"
                            href="/sertifikasi?status={{$value->name}}"
                        >
                            <small>{{ $value->name}}</small>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="row my-4 mx-2">
                    <div class="col-10">
                        <input
                            type="text"
                            class="form-control bg-light border-0 small"
                            placeholder="Search "
                            aria-label="Search"
                            aria-describedby="basic-addon2"
                        />
                    </div>
                    <button
                        class="btn btn-primary full-width col-2"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal"
                    >
                        Ajukan Sertifikasi
                    </button>
                </div>
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th>No. Pendaftaran</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jenis Pengajuan</th>
                                <th>Tipe Produk</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>xx</td>
                                <td>15 Mei 2022</td>
                                <td>Rania San</td>
                                <td>Baru</td>
                                <td>Makanan</td>
                                <td>Selesai</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div
    class="modal fade"
    id="addModal"
    tabindex="-1"
    aria-labelledby="addModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">
                    <i
                        class="fa fa-angle-left mt-1 mr-2"
                        style="cursor: pointer"
                        data-bs-dismiss="modal"
                    ></i>
                    Ajukan Sertifikat
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5
                                    class="text-white text-center w-100 d-block mb-0"
                                >
                                    <b>Baru</b>
                                </h5>
                            </div>
                            <div class="card-body my-auto">
                                <p class="p-3 text-center mb-0">
                                    Proses sertifikasi halal untuk produk baru
                                    yang
                                    <b
                                        >belum pernah/belum memiliki
                                        sertifikasi</b
                                    >
                                    halal sebelumnya.
                                </p>
                            </div>
                            <div class="card-footer d-flex">
                                <button class="btn btn-primary mx-auto">
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card h-100">
                            <div class="card-header bg-danger">
                                <h5
                                    class="text-white text-center w-100 d-block mb-0"
                                >
                                    <b>Pembaruan</b>
                                </h5>
                            </div>
                            <div class="card-body my-auto">
                                <p class="p-3 text-center mb-0">
                                    Proses sertifikasi halal untuk
                                    <b class="text-danger"
                                        >memperpanjang masa berlaku</b
                                    >
                                    sertifikasi halal yang akanberakhir pada
                                    produk yang sudah memiliki sertifikasi halal
                                    sebelumnya.
                                </p>
                            </div>
                            <div class="card-footer d-flex">
                                <button
                                    class="btn btn-primary mx-auto"
                                    disabled
                                >
                                    Daftar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card h-100">
                            <div class="card-header bg-primary">
                                <h5
                                    class="text-white text-center w-100 d-block mb-0"
                                >
                                    <b>Baru</b>
                                </h5>
                            </div>
                            <div class="card-body my-auto">
                                <p class="p-3 text-center mb-0">
                                    Proses sertifikasi halal untuk produk baru
                                    yang
                                    <b class="text-primary"
                                        >menambahkan/ mengembangkan</b
                                    >
                                    dari produk yang telah memiliki sertifikasi
                                    halal dan sertifikasi halal masih berlaku.
                                </p>
                            </div>
                            <div class="card-footer d-flex">
                                <button
                                    class="btn btn-primary mx-auto"
                                    disabled
                                >
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
@endsection
