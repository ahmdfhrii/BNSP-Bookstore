<x-layout>
    <x-slot name="page_content">

        <div class="dashboard-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h3 class="fw-bold mb-1" style="color: #1f2940;">
                        Edit Pengguna
                    </h3>
                    <p class="text-muted mb-0">
                        Ubah informasi data pengguna FahriBooks
                    </p>
                </div>

                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-light border shadow-sm px-4 py-2 fw-semibold">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
            </div>

            {{-- Card --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                {{-- Header Card --}}
                <div class="p-4 text-white"
                     style="background: linear-gradient(135deg, #1f2940, #2f3c5f);">

                    <div class="d-flex align-items-center gap-4 flex-wrap">

                        <div class="rounded-circle d-flex align-items-center justify-content-center shadow"
                             style="
                                width: 90px;
                                height: 90px;
                                background-color: rgba(255,255,255,0.15);
                                border: 3px solid rgba(255,255,255,0.2);
                             ">
                            <i class="fas fa-user-edit text-white" style="font-size: 2rem;"></i>
                        </div>

                        <div>
                            <h3 class="fw-bold mb-1">
                                {{ $user->name }}
                            </h3>

                            <span class="badge rounded-pill px-3 py-2"
                                  style="background-color: rgba(255,255,255,0.15);">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>

                    </div>
                </div>

                {{-- Body --}}
                <div class="card-body p-4 p-lg-5">

                    {{-- Alert Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            {{-- Nama --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Nama Lengkap
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control form-control-lg rounded-4 shadow-sm border-0 bg-light"
                                       value="{{ old('name', $user->name) }}"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            {{-- Username --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Username
                                </label>

                                <input type="text"
                                       name="username"
                                       class="form-control form-control-lg rounded-4 shadow-sm border-0 bg-light"
                                       value="{{ old('username', $user->username) }}"
                                       placeholder="Masukkan username"
                                       required>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control form-control-lg rounded-4 shadow-sm border-0 bg-light"
                                       value="{{ old('email', $user->email) }}"
                                       placeholder="Masukkan email"
                                       required>
                            </div>

                            {{-- Role --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Role
                                </label>

                                <select name="role"
                                        class="form-select form-select-lg rounded-4 shadow-sm border-0 bg-light">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>

                                    <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>
                                        Customer
                                    </option>
                                </select>
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Tanggal Lahir
                                </label>

                                <input type="date"
                                       name="dob"
                                       class="form-control form-control-lg rounded-4 shadow-sm border-0 bg-light"
                                       value="{{ old('dob', $user->dob) }}">
                            </div>

                            {{-- Gender --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark d-block">
                                    Jenis Kelamin
                                </label>

                                <div class="d-flex gap-4 mt-2">

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="gender"
                                               id="genderL"
                                               value="Laki-Laki"
                                               {{ $user->gender == 'Laki-Laki' ? 'checked' : '' }}>

                                        <label class="form-check-label" for="genderL">
                                            Laki-Laki
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="gender"
                                               id="genderP"
                                               value="Perempuan"
                                               {{ $user->gender == 'Perempuan' ? 'checked' : '' }}>

                                        <label class="form-check-label" for="genderP">
                                            Perempuan
                                        </label>
                                    </div>

                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Nomor Telepon
                                </label>

                                <input type="text"
                                       name="phone"
                                       class="form-control form-control-lg rounded-4 shadow-sm border-0 bg-light"
                                       value="{{ old('phone', $user->phone) }}"
                                       placeholder="Masukkan nomor telepon">
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">
                                    Password Baru
                                </label>

                                <input type="password"
                                       name="password"
                                       class="form-control form-control-lg rounded-4 shadow-sm border-0 bg-light"
                                       placeholder="Kosongkan jika tidak diubah">
                            </div>

                            {{-- Address --}}
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark">
                                    Alamat
                                </label>

                                <textarea name="address"
                                          rows="5"
                                          class="form-control rounded-4 shadow-sm border-0 bg-light"
                                          placeholder="Masukkan alamat">{{ old('address', $user->address) }}</textarea>
                            </div>

                        </div>

                        {{-- Button --}}
                        <div class="d-flex justify-content-end gap-3 mt-5 flex-wrap">

                            <a href="{{ route('admin.users.index') }}"
                               class="btn btn-light border px-4 py-2 fw-semibold">
                                Batal
                            </a>

                            <button type="submit"
                                    class="btn px-5 py-2 fw-semibold text-white shadow-sm"
                                    style="background-color: #1f2940;">
                                <i class="fas fa-save me-2"></i>
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </x-slot>
</x-layout>
