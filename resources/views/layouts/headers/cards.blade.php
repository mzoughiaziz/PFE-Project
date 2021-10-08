<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Projets</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$projet}}</span>
                                </div>
                                
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2">{{$project_month}}</span>
                                <span class="text-nowrap">Ce mois</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> Recette du bureau </h5>
                                    <span class="h2 font-weight-bold mb-0">{{$recette}}</span>
                                </div>
                              
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-danger mr-2"> {{$recette_month}}</span>
                                <span class="text-nowrap">Ce mois</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Frais du bureau</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$frais}}</span>
                                </div>
                      
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"> {{$frais_month}}</span>
                                <span class="text-nowrap">Ce mois</span>
                            </p>
                        </div>
                    </div>
                </div>
         
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Avocats</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$avocat}}</span>
                                </div>
                                
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"> {{$avocat_month}}</span>
                                <span class="text-nowrap">Ce mois</span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row pt-4">
           

                @if(auth()->user()->role ==1)
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"> Collaborateurs </h5>
                                    <span class="h2 font-weight-bold mb-0">{{$associate}}</span>
                                </div>
                              
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2">{{$associate_month}}</span>
                                <span class="text-nowrap">Ce mois</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>