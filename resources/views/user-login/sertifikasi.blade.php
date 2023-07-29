@extends('layout.main') @section('container')
<div class="container">
    <h1><b>Sertifikasi Mandiri</b></h1>
</div>
<div class="row container">
    <div class="col-12">
        <div class="card shadow mb-5">
            <div class="card-body p-2">
                <ul class="nav nav-tabs">
                    @foreach ($status as $st => $value)
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            aria-current="page"
                            href="#"
                            >{{ $value->name }}</a
                        >
                    </li>
                    @endforeach
                </ul>
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>

                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
