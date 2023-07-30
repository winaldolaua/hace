@extends('layout.main')
@section('container')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman {{Str::title(Auth::user()->role->name)}}</h1>
    </div>
    <div class="row">
        @foreach ( $status as $index => $value)
        <div class="col-md-4 mb-4">
            <div class="card border-left-{{$value->color}} shadow h-100 py-2">
                <div class="card-body p-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-{{$value->color}} text-uppercase mb-1">
                                {{$value->name}}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$value->sertification->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; HCCI 2023</span>
        </div>
    </div>
</footer>
@endsection