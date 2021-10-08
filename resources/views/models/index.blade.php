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
                                <h3 class="mb-0">Models</h3>
                            </div>
                            @if(auth()->user()->role == 1 || auth()->user()->role == 2)
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>
                                        {{ $model->id }}
                                             
                                        </td>
                                        <td> {{ $model->name }}
                                            
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#edit-{{$model->id}}">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    edit
                                                </button>
                                            </a>
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

{{-- edit --}}

@foreach ($models as $model)
<div class="modal fade" id="edit-{{$model->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">

                {{-- Modal --}}

                              
                <form action="/model/edit/{{ $model->id }}" method="POST">
                    @csrf
        
                    <div class="input-group pb-3">
                        <h3> Model Name :</h3>
                       </div>
                       <div class="input-group pb-3">
                        <input name="id" hidden value="{{$model->id}}"/>
                           <input class="form-control" placeholder="Model name" value="{{$model->name}}" name="name"
                               type="text" required>
                       </div>
                    <textarea class="form-control" name="content" id="description-textarea-{{$model->id}}" rows="8">
                        {{$model->content}}
                    </textarea>
                    <br/>
                    <br/>
                    <div class="input-group pb-3"></div>
                    <button type="submit" class="btn btn-primary" >Save</button>
                    <div class="input-group pb-3"></div>
                </form>

             
            </div>
        </div>
    </div>
</div>

@endforeach


  
{{-- create modal --}}
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
aria-hidden="true">     
<div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">

                <div class="modal-content">

                    <div class="modal-body p-0">
                        <div id="new-modal">
                        {{-- Modal --}}
                        <form action="/model" method="POST">
                        @csrf
                        <div class="input-group pb-3">
                         <h3>
                        </div>
                        <div class="input-group pb-3">
                         
                            <input class="form-control" placeholder="Model name"  name="name"
                                type="text" required>
                        </div>
                        <div class="input-group">
                                <textarea class="form-control" name="content"
                                    id="description-textarea" rows="8">
                      
                                </textarea>
                        </div>   
                                <div class="input-group pb-3"></div>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <div class="input-group pb-3"></div>
                            </form>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
                    <script>
                        tinymce.init({
    selector: '#description-textarea',
    inline: true,
    menubar: false,
    toolbar: 'undo redo'
  });
 
  tinymce.init({
    selector: '#description-textarea',
    inline: true,
    menubar: false,
    toolbar: 'undo redo'
  });
                    </script>
                </div>
            </div>
        </div>

        {{-- @include('layouts.footers.auth') --}}
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
