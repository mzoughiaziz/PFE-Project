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
                                <h3 class="mb-0">Collaborateurs</h3>
                            </div>
                            @if (auth()->user()->role == 1)
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
                                    <th scope="col">identifient </th>
                                    <th scope="col">Actions </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($associates as $associate)
                                    <tr>
                                        <td> {{ $associate->id }} </td>
                                        <td> {{ $associate->firstname }} </td>
                                        <td> {{ $associate->lastname }} </td>
                                        <td> {{ $associate->cin }} </td>
                                        <td> {{ $associate->email }} </td>
                                        <td> {{ $associate->phone }} </td>
                                        <td> {{ $associate->identifient }} </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit-{{ $associate->id }}">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    edit
                                                </button>
                                            </a>
                                            @if ($associate->status == 'active')
                                                <a href="/associate/delete/{{ $associate->id }}">
                                                    <button type="button" class="btn btn-sm btn-danger">
                                                        delete
                                                    </button>
                                                </a>
                                            @elseif ($associate->status == 'inactive')
                                                <a href="/associate/restore/{{ $associate->id }}">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        restore
                                                    </button>
                                                </a>
                                            @endif
                                        </td>



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


    @foreach ($associates as $associate)
        <div class="modal fade" id="edit-{{ $associate->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">

                        {{-- Modal --}}

                        <div class="card bg-secondary border-0 mb-0">

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h2>Edit associate : {{ $associate->firstname }} {{ $associate->lastname }}</h2>
                                </div>
                                <form method="POST" action="/associate/edit/{{ $associate->id }}" role="form">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input value="{{ $associate->firstname }}" class="form-control"
                                                placeholder="First name" name="firstname" type="text">
                                            <input value="{{ $associate->lastname }}" class="form-control"
                                                placeholder="Last name" name="lastname" type="text">
                                            <input value="{{ $associate->cin }}" class="form-control" placeholder="CIN"
                                                name="cin" type="number">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input value="{{ $associate->email }}" class="form-control"
                                                placeholder="Email" name="email" type="email">
                                            <input value="{{ $associate->phone }}" class="form-control"
                                                placeholder="Phone" name="phone" type="number">
                                            <input value="{{ $associate->adress }}" class="form-control"
                                                placeholder="Adress" name="adress" type="text">


                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input value="{{ $associate->identifient }}" class="form-control"
                                                placeholder="Identifiant" name="identifiant" type="text">
                                            <select value="{{ $associate->status }}" class="form-control"
                                                name="marital status" name="status">
                                                <option value="marital status"> Marital Status</option>
                                                <option value="single"> Single </option>
                                                <option value="divorced"> Divorced </option>
                                                <option value="maried"> Maried </option>
                                            </select>
                                            <select value="{{ $associate->gender }}" class="form-control" name="gender">
                                                <option value="gender"> Gender</option>
                                                <option value="single"> Male </option>
                                                <option value="divorced"> Female </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input value="{{ $associate->birthday }}" class="form-control"
                                                placeholder="Date of birth" name="bday" type="date">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary ">Update</button>
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
                                <h2>Create new associate</h2>
                            </div>
                            <form method="POST" action="{{ route('associate.store') }}" role="form">
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
                                        <input class="form-control" placeholder="Password" name="password"
                                            type="password">

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Identifiant" name="identifiant"
                                            type="text">
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
