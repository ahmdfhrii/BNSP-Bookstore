<x-layout>
    <x-slot name="page_content">

        <div class="dashboard-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h3 class="fw-bold mb-1" style="color: #1f2940;">
                        Detail Pengguna
                    </h3>
                    <p class="text-muted mb-0">
                        Informasi lengkap data pengguna FahriBooks
                    </p>
                </div>

                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-light border shadow-sm px-4 py-2 fw-semibold">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>

            {{-- Card Detail --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                {{-- Header Card --}}
                <div class="p-4 text-white"
                     style="background: linear-gradient(135deg, #1f2940, #2f3c5f);">

                    <div class="d-flex align-items-center gap-4 flex-wrap">

                        {{-- Avatar --}}
                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow"
                             style="
                                width: 90px;
                                height: 90px;
                                background-color: rgba(255,255,255,0.15);
                                border: 3px solid rgba(255,255,255,0.2);
                             ">
                            <i class="fas fa-user text-white" style="font-size: 2.3rem;"></i>
                        </div>

                        {{-- User Info --}}
                        <div>
                            <h3 class="fw-bold mb-1">
                                {{ $user->name }}
                            </h3>

                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                <span class="badge rounded-pill px-3 py-2"
                                      style="background-color: rgba(255,255,255,0.15);">
                                    {{ ucfirst($user->role) }}
                                </span>

                                <span class="text-white-50">
                                    ID Pengguna :
                                    #USR-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Body --}}
                <div class="card-body p-4 p-lg-5">

                    <div class="row g-4">

                        {{-- Nama --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Nama Lengkap
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->name }}
                                </h6>
                            </div>
                        </div>

                        {{-- Username --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Username
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->username }}
                                </h6>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Email
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->email }}
                                </h6>
                            </div>
                        </div>

                        {{-- Role --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Role
                                </small>

                                <span class="badge rounded-pill px-3 py-2 fs-6"
                                      style="background-color: #1f2940;">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Tanggal Lahir
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->dob ?? '-' }}
                                </h6>
                            </div>
                        </div>

                        {{-- Gender --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Jenis Kelamin
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->gender ?? '-' }}
                                </h6>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Nomor Telepon
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->phone ?? '-' }}
                                </h6>
                            </div>
                        </div>

                        {{-- Dibuat --}}
                        <div class="col-md-6">
                            <div class="border rounded-4 p-4 h-100 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Bergabung Sejak
                                </small>

                                <h6 class="fw-bold mb-0 text-dark">
                                    {{ $user->created_at->format('d F Y') }}
                                </h6>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="col-12">
                            <div class="border rounded-4 p-4 bg-light-subtle">
                                <small class="text-muted d-block mb-2">
                                    Alamat
                                </small>

                                <p class="mb-0 fw-semibold text-dark" style="line-height: 1.8;">
                                    {{ $user->address ?? '-' }}
                                </p>
                            </div>
                        </div>

                    </div>

                    {{-- Button Action --}}
                    <div class="d-flex gap-3 mt-5 flex-wrap">

                        <a href="{{ route('admin.users.edit', $user->id) }}"
                           class="btn btn-warning px-4 py-2 fw-semibold text-dark shadow-sm">
                            <i class="fas fa-edit me-2"></i>
                            Edit Pengguna
                        </a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger px-4 py-2 fw-semibold shadow-sm"
                                    onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                <i class="fas fa-trash-alt me-2"></i>
                                Hapus Pengguna
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        </div>

    </x-slot>
</x-layout>
