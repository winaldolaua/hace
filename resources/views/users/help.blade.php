@extends('layout.main') @section('container')
<div class="m-5">
    <h1><b>Bantuan!</b></h1>
    <div class="col-12 mt-5">
        <div class="card shadow mb-5">
            <div class="card-header">
                <h4 class="mb-0 text-white py-2"><b>Topik Yang Sering Dicari</b></h4>
            </div>
            <div class="card-body py-2 px-3">
                <ul class="list-group" id="accordionExample">
                    <li class="list-group-item accordion">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Status
                        </button>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Status pengajuan anda dapat dilihat pada menu sertifikasi dimana anda akan melihat
                                pengajuan anda sedang dalam proses apa. Jangan lupa untuk melakukan
                                pengecekan secara berkala.
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item accordion">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Tagihan
                        </button>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Tagihan berisi rincian pembayaran yang harus dilakukan untuk biaya pengecekan
                                laboratorium. Anda dapat meminta berkas pada penyelia anda.
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item accordion">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Beranda
                        </button>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                Anda dapat melihat status-status dari pengajuan yang diajukan sedang dalam proses apa
                                serta jumlahnya berapa, Terima Kasih.
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row mx-4">

</div>

@endsection