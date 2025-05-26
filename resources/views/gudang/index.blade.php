@extends('layouts.admin')
@section('main-content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Daftar Gudang</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0" style="overflow: auto hidden !important">
                            <table class="table datatables align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            Nama Gudang</th>
                                        <th>
                                            Alamat</th>
                                        <th>
                                            Kota</th>
                                        <th>
                                            Provinsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gudangs as $gudang)
                                        <tr>
                                            <td>
                                                {{ $gudang->nama_gudang }}
                                            </td>
                                            <td>
                                                {{ $gudang->alamat }}
                                            </td>
                                            <td>
                                                {{ $gudang->kota }}
                                            </td>
                                            <td>
                                                {{ $gudang->provinsi }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('gudang.edit', $gudang->id) }}"
                                                    class="btn btn-sm btn-primary" data-toggle="tooltip"
                                                    title="Edit Gudang">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>

                                                <form action="{{ route('gudang.index', $gudang->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus gudang ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        data-toggle="tooltip" title="Hapus Gudang">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
