@extends('layouts.app')

@section('content')

<!-- Content Header -->
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0">
                    IT Ticket Dashboard
                </h1>

            </div>

            <div class="col-sm-6 text-right">

                <a href="{{ route('ticket.create') }}"
                   class="btn btn-primary">

                    <i class="fas fa-plus-circle"></i>
                    Create Ticket

                </a>

            </div>

        </div>

    </div>

</div>

<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

        <!-- Summary -->
        <div class="row">

            <!-- Total Tickets -->
            <div class="col-lg-4 col-12">

                <div class="small-box bg-info">

                    <div class="inner">

                        <h3>
                            {{ $tickets->count() }}
                        </h3>

                        <p>Total Tickets</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>

                </div>

            </div>

            <!-- Departments -->
            <div class="col-lg-4 col-12">

                <div class="small-box bg-success">

                    <div class="inner">

                        <h3>
                            {{ \App\Models\Ticket::distinct('department')->count('department') }}
                        </h3>

                        <p>Departments</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>

                </div>

            </div>

            <!-- Users -->
            <div class="col-lg-4 col-12">

                <div class="small-box bg-warning">

                    <div class="inner">

                        <h3>
                            {{ \App\Models\Ticket::distinct('user')->count('user') }}
                        </h3>

                        <p>Users</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- Notification -->
        @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

            <i class="fas fa-check-circle"></i>

            {{ session('success') }}

        </div>

        @endif

        <!-- Table Card -->
        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-table"></i>
                    Ticket List

                </h3>

                <div class="card-tools">

                    <!-- Search -->
                    <form method="GET" action="{{ route('ticket.search') }}">

                        <div class="input-group input-group-sm"
                             style="width: 250px;">

                            <input 
                                type="text"
                                name="search"
                                class="form-control float-right"
                                placeholder="Search ticket..."
                                value="{{ request('search') }}"
                            >

                            <div class="input-group-append">

                                <button type="submit"
                                        class="btn btn-default">

                                    <i class="fas fa-search"></i>

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <!-- Card Body -->
            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Department</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="100">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($tickets as $ticket)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <!-- User -->
                            <td>
                                {{ $ticket->user }}
                            </td>

                            <!-- Department -->
                            <td>

                                <span class="badge badge-success">
                                    {{ $ticket->department }}
                                </span>

                            </td>

                            <!-- Description -->
                            <td>
                                {{ $ticket->description }}
                            </td>

                            <!-- Location -->
                            <td>
                                {{ $ticket->location }}
                            </td>

                            <!-- Status -->
                            <td>

                                @if($ticket->status == 'Open')

                                    <span class="badge badge-danger">
                                        Open
                                    </span>

                                @elseif($ticket->status == 'Progress')

                                    <span class="badge badge-warning">
                                        Progress
                                    </span>

                                @else

                                    <span class="badge badge-success">
                                        Done
                                    </span>

                                @endif

                            </td>

                            <!-- Created -->
                            <td>
                                {{ $ticket->created_at->format('d M Y') }}
                            </td>

                            <!-- Action -->
                            <td>

                                <div class="btn-group">

                                    <!-- Edit -->
                                    <a href="{{ route('ticket.edit', $ticket->id) }}"
                                       class="btn btn-sm btn-primary">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <!-- Delete -->
                                    <a href="{{ route('ticket.destroy', $ticket->id) }}"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus ticket ini?')">

                                        <i class="fas fa-trash"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center text-muted py-4">

                                <i class="fas fa-database"></i>

                                <br><br>

                                No ticket data found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection