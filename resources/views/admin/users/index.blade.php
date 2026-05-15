<x-layout>
    <x-slot name="page_content">

        <div class="dashboard-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="fw-bold" style="color: #2b3046;">
                    Daftar Pengguna
                </h4>

                <a href="{{ route('admin.users.create') }}"
                   class="btn btn-primary fw-bold px-3"
                   style="border-radius: 10px;">

                    <i class="fas fa-user-plus me-2"></i>
                    Tambah Pengguna

                </a>

            </div>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-2 fs-5"></i>

                        <span class="fw-semibold">
                            {{ session('success') }}
                        </span>
                    </div>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-times-circle me-2 fs-5"></i>

                        <span class="fw-semibold">
                            {{ session('error') }}
                        </span>
                    </div>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                    </button>
                </div>
            @endif

            <div class="card border-0 shadow-sm rounded-4 p-3">

                <div class="table-responsive">

                    <table id="userTable"
                           class="table table-hover align-middle">

                        <thead class="bg-light">

                            <tr>

                                <th class="text-center border-0 py-3 fw-bold text-secondary">
                                    No
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary">
                                    Nama Pengguna
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary">
                                    Tanggal Lahir
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary">
                                    Email
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary text-center">
                                    Gender
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary">
                                    Nomor Telepon
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary">
                                    Alamat
                                </th>

                                <th class="border-0 py-3 fw-bold text-secondary text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($users as $index => $user)

                                <tr>

                                    <td class="text-center fw-bold text-dark">
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        <span class="fw-semibold text-dark">
                                            {{ $user->name }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $user->dob ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td class="text-center">
                                        <span class="badge rounded-pill px-3 py-2"
                                              style="background-color: #eef2ff; color: #4338ca;">

                                            {{ $user->gender ?? '-' }}

                                        </span>
                                    </td>

                                    <td>
                                        {{ $user->phone ?? '-' }}
                                    </td>

                                    <td style="max-width: 250px;">
                                        {{ $user->address ?? '-' }}
                                    </td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- LIHAT --}}
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                               class="btn btn-sm btn-info text-white"
                                               style="border-radius: 8px;"
                                               title="Lihat">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                            {{-- EDIT --}}
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                               class="btn btn-sm btn-warning text-white"
                                               style="border-radius: 8px;"
                                               title="Edit">

                                                <i class="fas fa-edit"></i>

                                            </a>

                                            {{-- HAPUS --}}
                                            <form action="{{ route('admin.users.destroy', $user->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        style="border-radius: 8px;"
                                                        title="Hapus">

                                                    <i class="fas fa-trash-alt"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8"
                                        class="text-center py-5 text-muted">

                                        <i class="fas fa-users fs-2 d-block mb-3 opacity-25"></i>

                                        Belum ada pengguna terdaftar.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </x-slot>
</x-layout>
