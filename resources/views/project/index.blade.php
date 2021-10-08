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
                                <h3 class="mb-0">Advisory Projects</h3>
                            </div>
                            @if(auth()->user()->role == 2)
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Description </th>
                                    <th scope="col">Lawyer name</th>
                                    <th scope="col">Status </th>
                                    @if(auth()->user()->role == 2)
                                    <th scope="col">Action </th>
                                    @endif
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td> {{ $project->id }} </td>
                                        <td> {{ $project->name }} </td>
                                        <td> {{ $project->descreption }} </td>
                                        <td> {{ $project->user_name }} </td>
                                     
                                        <td> {{ $project->step }} </td>
                                        @if(auth()->user()->role == 2)
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit-{{$project->id}}">
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
   


    @foreach ($projects as $project)
        <div class="modal fade" id="edit-{{$project->id}}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">

                        {{-- Modal --}}

                        <div class="card bg-secondary border-0 mb-0">

                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <h2>Edit project</h2>
                                </div>
                                <form role="form" method="POST" action="/project/edit/{{$project->id}}">
                                    @csrf
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" value="{{$project->name}}"  name="name" placeholder="Project name"
                                                type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <select class="form-control" value="{{$project->step}}" name="step">
                                                <option value="Stage">Status</option>
                                                <option value="todo">To do</option>
                                                <option value="doing">Doing</option>
                                                <option value="done">Done</option>
                                            </select>

                                          

                                            <select class="form-control" value="{{$project->user_id}}" name="user_id">
                                                <option>Lawyer</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->firstname }}
                                                        {{ $user->lastname }}</option>
                                                @endforeach
                                            </select>



                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input class="form-control" name="descreption" placeholder="Description"
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
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
   <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body p-0">
                    {{-- Modal --}}

                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <h2>Create new project</h2>
                            </div>
                            <form role="form" method="POST" action="{{ route('project.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" name="name" placeholder="Project name" type="text">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <select class="form-control" name="step">
                                            <option value="Stage">Status</option>
                                            <option value="todo">To do</option>
                                            <option value="doing">Doing</option>
                                            <option value="done">Done</option>
                                        </select>

                                        <select class="form-control" required name="user_id">
                                            <option>Avocat</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->firstname }}
                                                    {{ $user->lastname }}</option>
                                            @endforeach
                                        </select>



                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="input-group">
                                        <input class="form-control" name="descreption" placeholder="Description"
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
