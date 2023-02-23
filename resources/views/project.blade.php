@extends('layouts.app')

    @section('script')
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>

    <script src="{{asset('dist/js/demo.js')}}"></script>
    @endsection
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 20%">
                                Project Name
                            </th>
                            <th style="width: 30%">
                                Team Members
                            </th>
                            <th>
                                Project Progress
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $projects = \App\Models\project::all()?>
                        @if($projects ?? '')
                        @foreach($projects as $project)
                            <?php $i=1; ?>
                            <tr>
                            <td>
                                <?= $i++; ?>
                            </td>
                            <td>
                                <a>
                                    {!! $project->project_name !!}
                                </a>
                                <br/>
                                <small>
                                   {{ $project->created_at }}
                                </small>
                            </td>
                            <td>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                                    </li>
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                                    </li>
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                                    </li>
                                    <li class="list-inline-item">
                                        <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                                    </li>
                                </ul>
                            </td>
                            <td class="project_progress">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $project->project_process }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->project_process }}%">
                                    </div>
                                </div>
                                <small>
                                    {{ $project->project_process }}% completed
                                </small>
                            </td>
                                @if($project->status == 'Success')
                            <td class="project-state">
                                <span class="badge badge-success">Success</span>
                            </td>
                                @elseif($project->status== 'On Hold')
                                    <td class="project-state">
                                        <span class="badge badge-secondary">On hold</span>
                                    </td>
                                @else
                                    <td class="project-state">
                                        <span class="badge badge-danger">Canceled</span>
                                    </td>
                                @endif
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="/project/{{$project->id}}/edit">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                @if($project ?? '')
                                <form  method="post" action="/project/{{$project->id}}" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm ">Delete</button>
                                </form>
                                @else
                                    <h3>There is no project</h3>
                                @endif
{{--                                <a class="btn btn-danger btn-sm" href="/project/{{$project->id}}">--}}
{{--                                    <i class="fas fa-trash">--}}
{{--                                    </i>--}}
{{--                                    Delete--}}
{{--                                </a>--}}
                            </td>
                                @endforeach
                        </tbody>
                            @else
                                        <h3>There is no project</h3>
                            @endif
                    </table>

                </div>

            </div>

        </section>

    </div>


@endsection
