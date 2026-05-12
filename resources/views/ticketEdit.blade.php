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

                            <i class="fas fa-ticket-alt"></i>
                            Edit Ticket Form

                        </h3>

                    </div>

                    <!-- Form -->
                    <form action="{{ route('ticket.update', $ticket->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="row">

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
                                            value="{{ $ticket->user }}"
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

                                            <option value="Finance"
                                                {{ $ticket->department == 'Finance' ? 'selected' : '' }}>
                                                Finance
                                            </option>

                                            <option value="IT"
                                                {{ $ticket->department == 'IT' ? 'selected' : '' }}>
                                                IT
                                            </option>

                                            <option value="HRD"
                                                {{ $ticket->department == 'HRD' ? 'selected' : '' }}>
                                                HRD
                                            </option>

                                            <option value="Marketing"
                                                {{ $ticket->department == 'Marketing' ? 'selected' : '' }}>
                                                Marketing
                                            </option>

                                            <option value="Production"
                                                {{ $ticket->department == 'Production' ? 'selected' : '' }}>
                                                Production
                                            </option>

                                            <option value="Purchasing"
                                                {{ $ticket->department == 'Purchasing' ? 'selected' : '' }}>
                                                Purchasing
                                            </option>

                                        </select>

                                    </div>

                                </div>

                                <!-- Description -->
                                <div class="col-12">

                                    <div class="form-group">

                                        <label>
                                            Problem Description
                                        </label>

                                        <textarea 
                                            name="description"
                                            class="form-control"
                                            rows="5"
                                            placeholder="Contoh: Tidak bisa print, internet disconnect, aplikasi error, dll"
                                            required
                                        >{{ $ticket->description }}</textarea>

                                    </div>

                                </div>

                                <!-- Location -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Location
                                        </label>

                                        <input 
                                            type="text"
                                            name="location"
                                            class="form-control"
                                            placeholder="Contoh: Office HRD"
                                            value="{{ $ticket->location }}"
                                            required
                                        >

                                    </div>

                                </div>

                                <!-- Status -->
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label>
                                            Status
                                        </label>

                                        <select 
                                            name="status"
                                            class="form-control"
                                            required
                                        >

                                            <option value="Open"
                                                {{ $ticket->status == 'Open' ? 'selected' : '' }}>
                                                Open
                                            </option>

                                            <option value="Progress"
                                                {{ $ticket->status == 'Progress' ? 'selected' : '' }}>
                                                Progress
                                            </option>

                                            <option value="Done"
                                                {{ $ticket->status == 'Done' ? 'selected' : '' }}>
                                                Done
                                            </option>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Card Footer -->
                        <div class="card-footer">

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fas fa-save"></i>
                                Update Ticket

                            </button>

                            <a href="{{ route('ticket.index') }}"
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