<x-layout>
    <x-slot name="page_content">

        <div class="dashboard-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

                <div>
                    <h3 class="fw-bold mb-1" style="color: #1f2940;">
                        Data Buku
                    </h3>

                    <p class="text-muted mb-0">
                        Kelola seluruh data buku FahriBooks
                    </p>
                </div>

                <a href="{{ route('admin.books.create') }}"
                   class="btn text-white fw-semibold px-4 py-2 shadow-sm"
                   style="
                        background-color: #1f2940;
                        border-radius: 12px;
                   ">
                    <i class="fas fa-plus me-2"></i>
                    Tambah Buku
                </a>

            </div>

            {{-- Alert Success --}}
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
                            data-bs-dismiss="alert">
                    </button>

                </div>
            @endif

            {{-- Card Table --}}
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-body p-4">

                    <div class="table-responsive">

                        <table class="table align-middle table-hover">

                            <thead style="background-color: #f8fafc;">

                                <tr>
                                    <th class="border-0 py-3 text-center" width="70">
                                        No
                                    </th>

                                    <th class="border-0 py-3">
                                        Cover
                                    </th>

                                    <th class="border-0 py-3">
                                        Judul Buku
                                    </th>

                                    <th class="border-0 py-3 text-center">
                                        Penulis
                                    </th>

                                    <th class="border-0 py-3 text-center">
                                        Harga
                                    </th>

                                    <th class="border-0 py-3 text-center">
                                        Stock
                                    </th>

                                    <th class="border-0 py-3 text-center">
                                        Aksi
                                    </th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($books as $book)

                                    <tr>

                                        {{-- Nomor --}}
                                        <td class="text-center fw-semibold text-secondary">
                                            {{ $loop->iteration }}
                                        </td>

                                        {{-- Cover --}}
                                        <td>
                                            <img src="{{ asset('storage/' . $book->image) }}"
                                                 alt="{{ $book->title }}"
                                                 class="rounded-3 shadow-sm border"
                                                 style="
                                                    width: 70px;
                                                    height: 100px;
                                                    object-fit: cover;
                                                 ">
                                        </td>

                                        {{-- Judul --}}
                                        <td>

                                            <div class="fw-bold text-dark mb-1">
                                                {{ $book->title }}
                                            </div>

                                            <small class="text-muted">
                                                {{ Str::limit($book->description, 70) }}
                                            </small>

                                        </td>

                                        {{-- Author --}}
                                        <td class="text-center">
                                            <span class="text-secondary fw-medium">
                                                {{ $book->author }}
                                            </span>
                                        </td>

                                        {{-- Harga --}}
                                        <td class="text-center">

                                            <span class="badge rounded-pill px-3 py-2"
                                                  style="
                                                    background-color: #ecfdf3;
                                                    color: #027a48;
                                                    font-size: 0.85rem;
                                                  ">

                                                Rp {{ number_format($book->price, 0, ',', '.') }}

                                            </span>

                                        </td>

                                        {{-- Stock --}}
                                        <td class="text-center">

                                            @if($book->stock > 20)

                                                <span class="badge rounded-pill px-3 py-2 bg-success">
                                                    {{ $book->stock }} Buku
                                                </span>

                                            @elseif($book->stock > 0)

                                                <span class="badge rounded-pill px-3 py-2 bg-warning text-dark">
                                                    {{ $book->stock }} Buku
                                                </span>

                                            @else

                                                <span class="badge rounded-pill px-3 py-2 bg-danger">
                                                    Habis
                                                </span>

                                            @endif

                                        </td>

                                        {{-- Aksi --}}
                                        <td class="text-center">

                                            <div class="d-flex justify-content-center gap-2">

                                                {{-- Detail --}}
                                                <a href="{{ route('admin.books.show', $book->id) }}"
                                                   class="btn btn-sm btn-primary rounded-3 shadow-sm"
                                                   title="Detail">

                                                    <i class="fas fa-eye"></i>

                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('admin.books.edit', $book->id) }}"
                                                   class="btn btn-sm btn-warning rounded-3 shadow-sm text-dark"
                                                   title="Edit">

                                                    <i class="fas fa-edit"></i>

                                                </a>

                                                {{-- Hapus --}}
                                                <form action="{{ route('admin.books.destroy', $book->id) }}"
                                                      method="POST"
                                                      class="d-inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger rounded-3 shadow-sm"
                                                            title="Hapus"
                                                            onclick="return confirm('Yakin ingin menghapus buku ini?')">

                                                        <i class="fas fa-trash-alt"></i>

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="text-center py-5">

                                            <i class="fas fa-book-open fs-1 text-muted opacity-25 mb-3 d-block"></i>

                                            <h6 class="fw-semibold text-muted">
                                                Belum ada data buku
                                            </h6>

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
