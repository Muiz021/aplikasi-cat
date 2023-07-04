@extends('base')

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Mahasiswa</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Tabel Mahasiswa</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2"
                                                class="table table-bordered table-hover dataTable dtr-inline"
                                                aria-describedby="example2_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc">No</th>
                                                        <th class="sorting sorting_asc">Nama</th>
                                                        <th class="sorting sorting_asc">Username</th>
                                                        <th class="sorting sorting_asc">Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($mahasiswa as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->username }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    <form action="{{ route('pelajaran.edit', $item->id) }}">
                                                                        <button type="submit" class="btn btn-success mx-2">
                                                                            <span><i class="fas fa-edit mr-1"></i><b>Edit</b></span>
                                                                        </button>
                                                                    </form>

                                                                    <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-delete-{{ $item->id }}">
                                                                    <span><i class="fas fa-trash mr-1"></i><b>Delete</b></span>
                                                                    </button>


                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @include('pages.admin.pelajaran.delete')
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">Nama</th>
                                                        <th rowspan="1" colspan="1">Username</th>
                                                        <th rowspan="1" colspan="1">Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
