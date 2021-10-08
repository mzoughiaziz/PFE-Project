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
                                <h3 class="mb-0">Publications</h3>
                            </div>
                            <div class="col-4 text-right">
                                {{-- lunch modal button --}}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-form">
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
                                    <th scope="col">Id</th>
                                    <th scope="col">Process Data</th>
                                    <th scope="col">Publication Content </th>
                                    <th scope="col">Classification</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                                                    <tr>
                                        <td>Admin Admin</td>
                                        <td>
                                            <a href="mailto:admin@argon.com">admin@argon.com</a>
                                        </td>
                                        <td>TEST</td>
                                        <td>12/02/2020 11:00</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                            <a class="dropdown-item" href="">Edit</a>
                                                                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
        </div>
      </div>
        </div>
    
        <div class="col-md-4">
       
       <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
     <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             
             <div class="modal-body p-0">
     
  {{-- Modal  --}}
  
  <div class="card bg-secondary border-0 mb-0">
     
      <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
              <small>Create new ras zebi</small>
          </div>
          <form role="form">
              <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email">
                  </div>
              </div>
              <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" type="password">
                  </div>
              </div>
              {{-- <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                      <span class="text-muted">Remember me</span>
                  </label>
              </div> --}}
              <div class="text-center">
                  <button type="button" class="btn btn-primary my-4">Create</button>
              </div>
          </form>
      </div>
  </div>

        @include('layouts.footers.auth')

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush