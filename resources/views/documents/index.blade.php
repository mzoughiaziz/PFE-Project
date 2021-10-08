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
                                <h3 class="mb-0">Documents</h3>
                            </div>
                            <div class="col-4 text-right">
                                {{-- lunch modal button --}}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#modal-form">
                                    Create new
                                </button>
                            </div>
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
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>
                                        {{ $document->id }}
                                             
                                        </td>
                                        <td> {{ $document->name }}
                                            
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
    <div class="col-md-10">

        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">

                <div class="modal-content">

                    <div class="modal-body p-0">
                        @livewireStyles

                        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap">
                        <link href="{{ asset('multiform.css') }}" rel="stylesheet" id="bootstrap">
                
                            <livewire:wizard />
                     
                    
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                    @livewireScripts

                    </div>
                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
                    <script>
                        var editor_config = {
                            selector: '#description-textarea',
                            directionality: document.dir,
                            path_absolute: "/",
                            menubar: 'edit insert view format table',
                            plugins: [
                                "advlist autolink lists link image charmap preview hr anchor pagebreak",
                                "searchreplace wordcount visualblocks visualchars code fullscreen",
                                "insertdatetime media save table contextmenu directionality",
                                "paste textcolor colorpicker textpattern"
                            ],
                            toolbar: "insertfile undo redo | formatselect styleselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen code",
                            relative_urls: false,
                            language: document.documentElement.lang,
                            height: 300,
                        }
                        tinymce.init(editor_config);
                    </script> --}}
                </div>
            </div>
        </div>

        {{-- @include('layouts.footers.auth') --}}
    @endsection

    @push('js')
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush
