@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Projects') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                @if(count($projects)>0)
                                    <table class="table table-responsive-sm table-hover table-outline">
                                        <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Creator') }}</th>
                                            <th>{{ __('Start') }}</th>
                                            <th>{{ __('End') }}</th>
                                            <th>{{ __('Task Status') }}</th>

                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ $project->creator}}</td>
                                                <td>{{ $project->start_date }}</td>
                                                <td>{{ $project->end_date }}</td>
                                                @foreach ($project->task as $task)
                                                    <td>{{$task->status}}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>
                                                <div class="text-muted">
                                                    <p>Your Progress is {{$taskPercentage}} %</p>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="text-center p-3 text-muted">
                                        <h5>No Results</h5>
                                        <p>Looks like you have not added any Tasks yet!</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
