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

                            <i class="fas fa-edit"></i>
                            Edit Asset Form

                        </h3>

                    </div>

                    <!-- Form -->
                    <form action="{{ route('asset.update', $asset->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

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
                                            value="{{ $asset->category }}"
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
                                            value="{{ $asset->type }}"
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
                                            value="{{ $asset->serial_number }}"
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
                                            value="{{ $asset->user }}"
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

                                            <option value="Finance"
                                                {{ $asset->department == 'Finance' ? 'selected' : '' }}>
                                                Finance
                                            </option>

                                            <option value="IT"
                                                {{ $asset->department == 'IT' ? 'selected' : '' }}>
                                                IT
                                            </option>

                                            <option value="HRD"
                                                {{ $asset->department == 'HRD' ? 'selected' : '' }}>
                                                HRD
                                            </option>

                                            <option value="Marketing"
                                                {{ $asset->department == 'Marketing' ? 'selected' : '' }}>
                                                Marketing
                                            </option>

                                            <option value="Production"
                                                {{ $asset->department == 'Production' ? 'selected' : '' }}>
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
                                            value="{{ $asset->info }}"
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
                                Update Asset

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