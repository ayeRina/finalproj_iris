@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Audit Logs</h3>
    </div>

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search user, model, or ID..." value="{{ request('search') }}">
        </div>

        <div class="col-md-2">
            <select name="action" class="form-select">
                <option value="">All Actions</option>
                @foreach($actions as $action)
                    <option value="{{ $action }}" {{ request('action') == $action ? 'selected' : '' }}>
                        {{ ucfirst($action) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <select name="model" class="form-select">
                <option value="">All Models</option>
                @foreach($models as $model)
                    <option value="{{ $model }}" {{ request('model') == $model ? 'selected' : '' }}>
                        {{ $model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-success w-100">Filter</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('client.audit_logs.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Date & Time</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Model</th>
                    <th>Record ID</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->user }}</td>
                    <td>{{ ucfirst($log->action) }}</td>
                    <td>{{ $log->model }}</td>
                    <td>{{ $log->record_id }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $log->id }}">
                            View
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="detailsModal{{ $log->id }}" tabindex="-1" aria-labelledby="detailsModalLabel{{ $log->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailsModalLabel{{ $log->id }}">Log Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <pre>{{ json_encode(json_decode($log->details), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">No logs found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $logs->links() }}
    </div>
</div>
@endsection
