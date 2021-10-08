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
                                <h3 class="mb-0">Office Frais</h3>
                            </div>
                            @if (auth()->user()->role == 2)
                                <div class="col-4 text-right">
                                    {{-- lunch modal button --}}
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#modal-form">
                                        Create new
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Associates</th>
                                    <th scope="col">Description</th>
                                    @if (auth()->user()->role == 2)
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($frais as $frai)
                                    <tr>
                                        <td> {{ $frai->id }} </td>
                                        <td> {{ $frai->name }} </td>
                                        <td> {{ $frai->amount }} </td>
                                        <td style=" display: block;
                                                width: 300px;
                                                overflow: hidden;
                                                white-space: nowrap;
                                                text-overflow: ellipsis;"> {{ $frai->type }} </td>
                                        <td> {{ $frai->user_name }} </td>
                                        <td style=" display: block;
                                                width: 300px;
                                                overflow: hidden;
                                                white-space: nowrap;
                                                text-overflow: ellipsis;"> {{ $frai->descreption }} </td>
                                        @if (auth()->user()->role == 2)
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit-{{ $frai->id }}">
                                                    <button type="button" class="btn btn-sm btn-primary">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>


















    {{-- edit --}}

    @foreach ($frais as $frai)
        <div class="modal fade" id="edit-{{ $frai->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">

                        {{-- Modal --}}

                        <div class="card bg-secondary border-0 mb-0">

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h2>EDit frais : {{ $frai->id }}</h2>
                                </div>
                                <form role="form" method="POST" action="/frais_office/edit/{{ $frai->id }}">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Name" value="{{ $frai->name }}"
                                                name="name" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Amount" min=0
                                                value="{{ $frai->amount }}" name="amount" type="number">
                                            <select class="form-control" name="user_id">
                                                <option> Others </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->firstname }}
                                                        {{ $user->lastname }}</option>
                                                @endforeach
                                            </select>

                                            <input class="form-control" value="{{ $frai->type }}" name="type"
                                                placeholder="Type (Cloud services, Electronics...)" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Description"
                                                value="{{ $frai->descreption }}" name="descreption" type="text">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary ">Edit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach













    {{-- modal Create --}}


    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body p-0">

                    {{-- Modal --}}

                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Create new frais</h2>
                            </div>
                            <form role="form" method="POST" action="{{ route('frais.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Name" name="name" type="text">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Amount" min=0 name="amount"
                                            type="number">

                                        <input class="form-control" name="type"
                                            placeholder="Type (Cloud services, Electronics...)" type="text">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Description" name="descreption"
                                            type="text">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary ">Create</button>
                                </div>

                            </form>
                        </div>
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
