@extends('layouts.app_sneat')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">{{ $title }}</div>

            <div class="card-body">

                <a href="{{ route($routePrefix . '.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>

                {!! Form::open(['route' => $routePrefix.'.index', 'method' => 'GET']) !!}

                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="q" placeholder="cari nama mahasiswa"
                        value="{{ request('q') }}" />
                    <button class="btn btn-outline-primary" type="submit"><i class="bx bx-search"></i></button>
                </div>

                {!! Form::close() !!}

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <td>No</td>
                                <td>Wali Murid</td>
                                <td>Nama</td>
                                <td>Nim</td>
                                <td>Prodi</td>
                                <td>Angkatan</td>
                                <td>Total Tagihan</td>
                                {{-- <td>Status Akun</td> --}}
                                <td>Aksi</td>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($models as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->wali->name == 'Belum dilengkapi')
                                    <small class="text-danger"><b>Belum dilengkapi</b></small>
                                    @else
                                    {{ $item->wali->name }}
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->angkatan }}</td>
                                <td><small>{{ format_rupiah($item->biaya->childern->sum('jumlah')) }}</small></td>
                                {{-- <td>{{ $item->status->getStatus() }}</td> --}}
                                <td width="250" class="text-center">

                                    {!! Form::open([
                                    'route' => [$routePrefix . '.destroy', $item->id],
                                    'method' => 'DELETE',
                                    'onsubmit' => 'return confirm("Apakah yakin akan menghapus data ini.?")',
                                    ]) !!}

                                    <a href="{{ route($routePrefix . '.show', $item->id) }}"
                                        class="btn btn-info btn-sm mb-2" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Detail"><i
                                            class="fa-regular fa-eye"></i>
                                    </a>

                                    <a href="{{ route($routePrefix . '.edit', $item->id) }}"
                                        class="btn btn-success btn-sm mb-2" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Edit"><i
                                            class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger btn-sm mb-2" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Hapus"><i
                                            class="fa-solid fa-trash"></i></button>


                                    {!! Form::close() !!}
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse



                        </tbody>
                    </table>

                    {{-- pagination --}}
                    {!! $models->links() !!}

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
