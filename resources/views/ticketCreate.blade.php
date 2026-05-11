<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        body{
            background: #f4f7fb;
        }

        .card{
            border: none;
            border-radius: 20px;
        }

        .form-control,
        .form-select,
        textarea{
            border-radius: 12px;
            padding: 12px;
        }

        .btn{
            border-radius: 12px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm">

                <div class="card-header bg-white border-0 pt-4">

                    <h3 class="fw-bold mb-1">
                        <i class="bi bi-ticket-detailed"></i>
                        Create New Ticket
                    </h3>

                    <p class="text-muted mb-0">
                        Input ticket IT support perusahaan
                    </p>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('ticket.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            <!-- User -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    User
                                </label>

                                <input 
                                    type="text"
                                    name="user"
                                    class="form-control"
                                    placeholder="Nama user"
                                    required
                                >

                            </div>

                            <!-- Department -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Department
                                </label>

                                <select 
                                    name="department"
                                    class="form-select"
                                    required
                                >

                                    <option value="">-- Choose Department --</option>
                                    <option value="Finance">Finance</option>
                                    <option value="IT">IT</option>
                                    <option value="HRD">HRD</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Production">Production</option>
                                    <option value="Purchasing">Purchasing</option>

                                </select>

                            </div>

                            <!-- Description -->
                            <div class="col-12 mb-3">

                                <label class="form-label fw-semibold">
                                    Problem Description
                                </label>

                                <textarea 
                                    name="description"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Contoh: Tidak bisa print, internet disconnect, aplikasi error, dll"
                                    required
                                ></textarea>

                            </div>

                            <!-- Location -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Location
                                </label>

                                <input 
                                    type="text"
                                    name="location"
                                    class="form-control"
                                    placeholder="Contoh: Office HRD"
                                    required
                                >

                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Status
                                </label>

                                <select 
                                    name="status"
                                    class="form-select"
                                    required
                                >

                                    <option value="Open">Open</option>
                                    <option value="Progress">Progress</option>
                                    <option value="Done">Done</option>

                                </select>

                            </div>

                            <!-- Buttons -->
                            <div class="col-12 mt-3">

                                <div class="d-flex gap-2">

                                    <button type="submit" class="btn btn-primary">

                                        <i class="bi bi-save"></i>
                                        Save Ticket

                                    </button>

                                    <a href="{{ route('ticket.index') }}" class="btn btn-secondary">

                                        <i class="bi bi-arrow-left"></i>
                                        Back

                                    </a>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>