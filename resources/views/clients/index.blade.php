@extends('layouts.app')

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        @if (session('Status'))
            <div class="card bg-danger text-white shadow">
                <div class="card-body">

                    {{ session('Status') }}
                </div>
            </div>
        @endif
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Clients</h3>
                            </div>
                            @if (auth()->user()->role == 2)

                                <div class="col-4 text-right">
                                    {{-- lunch modal button --}}
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target=".bd-example-modal-sm">
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
                                    <th scope="col">Id</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">CIN</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Profession </th>
                                    @if(auth()->user()->role == 2 )
                                    <th scope="col">Actions </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td> {{ $client->id }} </td>
                                        <td> {{ $client->firstname }} </td>
                                        <td> {{ $client->lastname }} </td>
                                        <td> {{ $client->cin }} </td>
                                        <td> {{ $client->email }} </td>
                                        <td> {{ $client->phone }} </td>
                                        <td> {{ $client->job }} </td>
                                        @if(auth()->user()->role == 2 )
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit-{{ $client->id }}">
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
    {{-- modal edit --}}


    @foreach ($clients as $client)
        <div class="modal fade" id="edit-{{ $client->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">

                        {{-- Modal --}}

                        <div class="card bg-secondary border-0 mb-0">

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h2>Edit client : {{ $client->firstname }} {{ $client->lastname }}</h2>
                                </div>
                                <form method="POST" action="/clients/edit/{{ $client->id }}" role="form">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="First name"
                                                value="{{ $client->firstname }}" name="firstname" type="text">
                                            <input class="form-control" placeholder="Last name"
                                                value="{{ $client->lastname }}" name="lastname" type="text">
                                            <input class="form-control" placeholder="CIN" value="{{ $client->cin }}"
                                                name="cin" type="number">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Email"
                                                value="{{ $client->email }}" name="email" type="email">
                                            <input class="form-control" placeholder="Phone"
                                                value="{{ $client->phone }}" name="phone" type="number">
                                            <input class="form-control" placeholder="Profession"
                                                value="{{ $client->job }}" name="job" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="passport"
                                                value="{{ $client->passport }}" name="passport" type="text">
                                            <select class="form-control" name="marital status"
                                                value="{{ $client->marital_status }}" name="status">
                                                <option value="marital status"> Marital Status</option>
                                                <option value="single"> Single </option>
                                                <option value="divorced"> Divorced </option>
                                                <option value="maried"> Maried </option>
                                            </select>
                                            <select class="form-control" value="{{ $client->gender }}" name="gender">
                                                <option value="gender"> Gender</option>
                                                <option value="single"> Male </option>
                                                <option value="divorced"> Female </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Date of birth"
                                                value="{{ $client->bday }}" name="bday" type="date">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Adress"
                                                value="{{ $client->adress }}" name="adress" type="text">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary ">edit</button>
                                    </div>

                                </form>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>


    @endforeach




    {{-- Create modal --}}




    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body p-0">

                    {{-- Modal --}}

                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Create new client</h2>
                            </div>
                            <form method="POST" action="{{ route('client.store') }}" role="form">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="First name" name="firstname" type="text">
                                        <input class="form-control" placeholder="Last name" name="lastname" type="text">
                                        <input class="form-control" placeholder="CIN" name="cin" type="number">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Email" name="email" type="email">
                                        <input class="form-control" placeholder="Phone" name="phone" type="number">
                                        <input class="form-control" placeholder="Profession" name="job" type="text">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Passport" name="passeport" type="text">
                                        <select class="form-control" name="marital status" name="status">
                                            <option value="marital status"> Marital Status</option>
                                            <option value="single"> Single </option>
                                            <option value="divorced"> Divorced </option>
                                            <option value="maried"> Maried </option>
                                        </select>
                                        <select class="form-control" name="gender">
                                            <option value="gender"> Gender</option>
                                            <option value="single"> Male </option>
                                            <option value="divorced"> Female </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Date of birth" name="bday" type="date">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Adress" name="adress" type="text">
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
