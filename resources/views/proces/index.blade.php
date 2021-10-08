@extends('layouts.app')

@section('content')

    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Process</h3>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <iframe src="http://localhost:8080/drag-and-drop-taskboard/"
                        style="height: 80vh;width: inherit;"
                        allowfullscreen="allowfullscreen"></iframe>
                    </div>

                </div>
            </div>
        </div>
    </div>
 


    {{-- @include('layouts.footers.auth') --}}
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
