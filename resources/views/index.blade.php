@extends('layouts.app')

@section('content')

<!-- Content Header -->
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1 class="m-0">
                    IT Asset Dashboard
                </h1>

            </div>

            <div class="col-sm-6 text-right">

                <a href="{{ route('asset.create') }}"
                   class="btn btn-primary">

                    <i class="fas fa-plus-circle"></i>
                    Add Asset

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

            <!-- Total Assets -->
            <div class="col-lg-4 col-12">

                <div class="small-box bg-info">

                    <div class="inner">

                        <h3>
                            {{ $assets->count() }}
                        </h3>

                        <p>Total Assets</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-laptop"></i>
                    </div>

                </div>

            </div>

            <!-- Departments -->
            <div class="col-lg-4 col-12">

                <div class="small-box bg-success">

                    <div class="inner">

                        <h3>
                            {{ \App\Models\Asset::distinct('department')->count('department') }}
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
                            {{ \App\Models\Asset::distinct('user')->count('user') }}
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

        <!-- Table -->
        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="fas fa-table"></i>
                    Asset List

                </h3>

                <div class="card-tools">

                    <form method="GET" action="{{ route('asset.search') }}">

                        <div class="input-group input-group-sm"
                             style="width: 250px;">

                            <input 
                                type="text"
                                name="search"
                                class="form-control float-right"
                                placeholder="Search asset..."
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

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Type</th>
                            <th>Serial Number</th>
                            <th>User</th>
                            <th>Department</th>
                            <th>Info</th>
                            <th>Created</th>
                            <th width="100">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($assets as $asset)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <!-- Category -->
                            <td>

                                <span class="badge badge-primary">
                                    {{ $asset->category }}
                                </span>

                            </td>

                            <!-- Type -->
                            <td>
                                {{ $asset->type }}
                            </td>

                            <!-- Serial -->
                            <td>
                                {{ $asset->serial_number ?? '-' }}
                            </td>

                            <!-- User -->
                            <td>
                                {{ $asset->user }}
                            </td>

                            <!-- Department -->
                            <td>

                                <span class="badge badge-success">
                                    {{ $asset->department }}
                                </span>

                            </td>

                            <!-- Info -->
                            <td>
                                {{ $asset->info ?? '-' }}
                            </td>

                            <!-- Date -->
                            <td>
                                {{ $asset->created_at->format('d M Y') }}
                            </td>

                            <!-- Action -->
                            <td>

                                <div class="btn-group">

                                    <!-- Edit -->
                                    <a href="{{ route('asset.edit', $asset->id) }}"
                                       class="btn btn-sm btn-primary">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <!-- Delete -->
                                    <a href="{{ route('asset.destroy', $asset->id) }}"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus asset ini?')">

                                        <i class="fas fa-trash"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9"
                                class="text-center text-muted py-4">

                                <i class="fas fa-database"></i>

                                <br><br>

                                No asset data found

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