<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Asset Management</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body{
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .dashboard-card{
            border: none;
            border-radius: 18px;
            overflow: hidden;
        }

        .table thead th{
            white-space: nowrap;
            font-size: 14px;
        }

        .badge-custom{
            font-size: 12px;
            padding: 8px 12px;
            border-radius: 10px;
        }

        .table tbody tr{
            transition: 0.2s ease;
        }

        .table tbody tr:hover{
            background-color: #f8fbff;
            transform: scale(1.002);
        }

        .avatar{
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            background: #6c757d;
            color: white;
            font-size: 14px;
        }

        .search-input{
            border-radius: 50px;
            padding-left: 18px;
        }

        .btn-rounded{
            border-radius: 50px;
        }

        .table td{
            vertical-align: middle;
        }

        .pagination{
            margin-bottom: 0;
        }

        .pagination .page-link{
            border-radius: 10px !important;
            margin: 0 3px;
            border: none;
            color: #0d6efd;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .pagination .page-item.active .page-link{
            background: #0d6efd;
            color: white;
        }

        .pagination .page-link:hover{
            background: #0d6efd;
            color: white;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-pc-display-horizontal"></i>
                IT Asset Dashboard
            </h2>

            <p class="text-muted mb-0">
                Monitoring asset perusahaan secara realtime
            </p>
        </div>

        <a href="{{ route('asset.create') }}"
           class="btn btn-primary btn-rounded px-4 shadow-sm">

            <i class="bi bi-plus-circle"></i>
            Add Asset

        </a>

    </div>

    <!-- Summary -->
    <div class="row mb-4">

        <!-- Total Asset -->
        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">Total Assets</p>

                            <h3 class="fw-bold mb-0">
                                {{ $assets->count() }}
                            </h3>
                        </div>

                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-hdd-network fs-3 text-primary"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Department -->
        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">Departments</p>

                            <h3 class="fw-bold mb-0">
                                {{ \App\Models\Asset::distinct('department')->count('department') }}
                            </h3>
                        </div>

                        <div class="bg-success bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-building fs-3 text-success"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Users -->
        <div class="col-md-4 mb-3">

            <div class="card dashboard-card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <p class="text-muted mb-1">Users</p>

                            <h3 class="fw-bold mb-0">
                                {{ \App\Models\Asset::distinct('user')->count('user') }}
                            </h3>
                        </div>

                        <div class="bg-warning bg-opacity-10 p-3 rounded-circle">
                            <i class="bi bi-people fs-3 text-warning"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Notification -->
    @if(session('success'))

    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">

        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

    @endif

    <!-- Table Card -->
    <div class="card dashboard-card shadow-sm">

        <!-- Card Header -->
        <div class="card-header bg-white border-0 pt-4 pb-0">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <h5 class="fw-semibold mb-0">
                    <i class="bi bi-table"></i>
                    Asset List
                </h5>

                <!-- Search -->
                <form method="GET" class="d-flex">

                    <input 
                        type="text"
                        name="search"
                        class="form-control search-input me-2"
                        placeholder="Search asset..."
                        value="{{ request('search') }}"
                    >

                    <button class="btn btn-dark btn-rounded px-4">
                        <i class="bi bi-search"></i>
                    </button>

                </form>

            </div>

        </div>

        <!-- Card Body -->
        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle table-hover">

                    <thead class="table-light">

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

                            <td class="fw-semibold">
                                {{ $loop->iteration }}
                            </td>

                            <!-- Category -->
                            <td>

                                <span class="badge bg-primary-subtle text-primary badge-custom">
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

                                <div class="d-flex align-items-center gap-2">

                                    <div class="avatar">
                                        {{ strtoupper(substr($asset->user,0,1)) }}
                                    </div>

                                    <div class="fw-semibold">
                                        {{ $asset->user }}
                                    </div>

                                </div>

                            </td>

                            <!-- Department -->
                            <td>

                                <span class="badge bg-success-subtle text-success badge-custom">
                                    {{ $asset->department }}
                                </span>

                            </td>

                            <!-- Info -->
                            <td>
                                {{ $asset->info ?? '-' }}
                            </td>

                            <!-- Date -->
                            <td class="text-muted">
                                {{ $asset->created_at->format('d M Y') }}
                            </td>

                            <!-- Action -->
                            <td>

                                <div class="d-flex gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('asset.edit', $asset->id) }}"
                                       class="btn btn-sm btn-outline-primary rounded-pill">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                    <!-- Delete -->
                                    <a href="{{ route('asset.destroy', $asset->id) }}"
                                       class="btn btn-sm btn-outline-danger rounded-pill"
                                       onclick="return confirm('Yakin ingin menghapus asset ini?')">

                                        <i class="bi bi-trash3-fill"></i>

                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9"
                                class="text-center py-5 text-muted">

                                <i class="bi bi-database-x fs-1 d-block mb-3"></i>

                                <h5>No asset data found</h5>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- <!-- Pagination -->
            {{ $assets->links() }} --}}

        </div>

    </div>

</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>