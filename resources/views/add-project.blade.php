@extends('layouts.app')


@section('script')
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>

    <script src="{{asset('dist/js/demo.js')}}"></script>
@endsection

@section('content')
    @auth()
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @include('components.errors')
                <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Project Add</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Project Add</li>
                                </ol>
                            </div>
                </div>
            </div>
        </section>
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                        <div class="card-body">
                            <form action="/project" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="inputName">Project Name</label>
                                        <input type="text" id="inputName" name="project_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Project Description</label>
                                        <textarea id="inputDescription" class="form-control" name="project_description" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus" name="status"  class="form-control custom-select" required>
                                            <option selected disabled>Select one</option>
                                            <option value="On Hold">On Hold</option>
                                            <option value="Canceled">Canceled</option>
                                            <option value="Success">Success</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">project process</label>
                                        <input type="number" name="project_process" id="inputEstimatedDuration" class="form-control" required>
                                    </div>
                                    <label for="Team" >Invite Team Member</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Email">
                                        <div class="input-group-append">
                                            <button class="btn btn-success" type="button">Invite</button>
                                        </div>
                                    </div>  

                                    <div class="form-group">
                                        <label for="inputClientCompany">Client Company</label>
                                        <input type="text" name="company_name" id="inputClientCompany" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Project Leader</label>
                                        <input type="text" name="project_leader" id="inputProjectLeader" class="form-control" required>
                                     </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-success float-right"> Create new Project </button>
                                    </div>
                            </form>
                                    </div>
                                 </div>
                            </div>
                         </div>
                 </section>
    @endauth
@endsection
