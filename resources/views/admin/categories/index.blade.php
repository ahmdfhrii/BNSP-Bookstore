<x-layout>

    <x-slot name="page_content">

        <div class="dashboard-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="fw-bold mb-1" style="color: #2b3046;">
                        Data Kategori
                    </h4>

                    <p class="text-muted mb-0">
                        Kelola seluruh kategori buku FahriBooks
                    </p>
                </div>

                <a href="{{ route('admin.categories.create') }}"
                   class="btn btn-primary fw-semibold px-4 py-2 rounded-3 shadow-sm">

                    <i class="bi bi-plus-circle me-2"></i>
                    Tambah Kategori
                </a>
            </div>

            {{-- Alert --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                    </button>
                </div>
            @endif

            {{-- Card --}}
            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <div class="table-responsive">

                        <table class="table align-middle table-hover">

                            <thead class="table-light">

                                <tr>
                                    <th width="70" class="text-center">No</th>
                                    <th>Nama Kategori</th>
                                    <th class="text-center">Dibuat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($categories as $category)

                                    <tr>

                                        <td class="text-center fw-semibold">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>

                                            <div class="fw-semibold text-dark">
                                                {{ $category->name }}
                                            </div>

                                        </td>

                                        <td class="text-center text-muted">
                                            {{ \Carbon\Carbon::parse($category->created_at)->format('d M Y') }}
                                        </td>

                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-2">


                                                {{-- Edit --}}
                                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                   class="btn btn-sm btn-warning text-white rounded-3">

                                                    <i class="bi bi-pencil-square"></i>
                                                </a>

                                                {{-- Hapus --}}
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger rounded-3">

                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center py-5 text-muted">

                                            <i class="bi bi-folder-x fs-1 d-block mb-3"></i>

                                            Belum ada kategori tersedia.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </x-slot>

</x-layout>
