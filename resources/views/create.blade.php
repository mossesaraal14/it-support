@extends('layouts.app')

@section('content')
<!-- Main Content -->
<section class="content">

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card card-primary">

                    <!-- Card Header -->
                    <div class="card-header">

                        <h3 class="card-title">

                            <i class="fas fa-plus-circle"></i>
                            Asset Form

                        </h3>

                    </div>

                    <!-- Form -->
                    <form action="{{ route('asset.store') }}"
                          method="POST">

                        @csrf

                        <div class="card-body">

                            <div class="row">

                                <!-- Category -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Category
                                        </label>

                                        <input 
                                            type="text"
                                            name="category"
                                            class="form-control"
                                            placeholder="Contoh: PC Lengkap"
                                            required
                                        >

                                    </div>

                                </div>

                                <!-- Type -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Type / Brand
                                        </label>

                                        <input 
                                            type="text"
                                            name="type"
                                            class="form-control"
                                            placeholder="Contoh: Rakitan / Lenovo"
                                            required
                                        >

                                    </div>

                                </div>

                                <!-- Serial Number -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Serial Number
                                        </label>

                                        <input 
                                            type="text"
                                            name="serial_number"
                                            class="form-control"
                                            placeholder="Optional"
                                        >

                                    </div>

                                </div>

                                <!-- User -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
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

                                </div>

                                <!-- Department -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Department
                                        </label>

                                        <select 
                                            name="department"
                                            class="form-control"
                                            required
                                        >

                                            <option value="">
                                                -- Choose Department --
                                            </option>

                                            <option value="Finance">
                                                Finance
                                            </option>

                                            <option value="IT">
                                                IT
                                            </option>

                                            <option value="HRD">
                                                HRD
                                            </option>

                                            <option value="Marketing">
                                                Marketing
                                            </option>

                                            <option value="Production">
                                                Production
                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <!-- Info -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Info
                                        </label>

                                        <input 
                                            type="text"
                                            name="info"
                                            class="form-control"
                                            placeholder="Keterangan tambahan"
                                        >

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Save Asset

                            </button>

                            <a href="{{ route('asset.index') }}"
                               class="btn btn-secondary">

                                <i class="fas fa-arrow-left"></i>
                                Back

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection