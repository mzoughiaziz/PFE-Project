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
                                <h3 class="mb-0">Office recette</h3>
                            </div>
                            @if(auth()->user()->role == 2)
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
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Description</th>
                                    @if(auth()->user()->role == 2)
                                    <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recettes as $recette)
                                    <tr>
                                        <td> {{ $recette->id }} </td>
                                        <td> {{ $recette->name }} </td>
                                        <td> {{ $recette->amount }} </td>
                                        <td> {{ $recette->user_id }} </td>
                                        <td> {{ $recette->descreption }} </td>
                                        @if(auth()->user()->role == 2)
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit-{{$recette->id}}">
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

@foreach ($recettes as $recette)
        <div class="modal fade" id="edit-{{$recette->id}}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        {{-- Modal --}}

                        <div class="card bg-secondary border-0 mb-0">

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h2>Edit recette : {{$recette->id}}</h2>
                                </div>
                                <form method="POST" action="/res_office/edit/{{$recette->id}}" role="form">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Name" value="{{$recette->name}}" name="name" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Amount" value="{{$recette->amount}}" name="amount" type="number">

                                            <select class="form-control" value="{{$recette->client_id}}" name="client_id">
                                                <option> client name </option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->firstname }}
                                                        {{ $client->lastname }}</option>
                                                @endforeach
                                            </select>

                                        

                                          



                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" value="{{$recette->description}}" placeholder="Description" name="descreption"
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

    @endforeach






{{-- create --}}

        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
            aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">
                        {{-- Modal --}}

                        <div class="card bg-secondary border-0 mb-0">

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h2>Create new recette</h2>
                                </div>
                                <form method="POST" action="{{ route('recette.store') }}" role="form">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Name" name="name" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Amount" name="amount" type="number">

                                            <select class="form-control" name="client_id">
                                                <option> client name </option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->firstname }}
                                                        {{ $client->lastname }}</option>
                                                @endforeach
                                            </select>

                                            <select class="form-control" name="user_id">
                                                <option> user name </option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->firstname }}
                                                        {{ $user->lastname }}</option>
                                                @endforeach
                                            </select>

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
