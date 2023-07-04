@extends('base')

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Ujian</h1>
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
                                    <h3 class="card-title">Tabel Ujian</h3>
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
                                                        <th class="sorting sorting_asc">Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pelajaran as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    @if ($item->ujian->isNotEmpty())
                                                                        <form action="{{ route('admin.ujian.show', $item->id) }}">
                                                                            <button type="submit" class="btn btn-info">
                                                                                <span><i
                                                                                        class="fas fa-eye mr-1"></i><b>View</b></span>
                                                                            </button>
                                                                        </form>
                                                                    @else
                                                                    <button type="button" class="btn btn-warning"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-info-{{ $item->id }}">
                                                                    <span style="color: white"><i
                                                                            class="fas fa-info mr-1"></i><b>Info</b></span>
                                                                </button>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @include('pages.admin.ujian.modal')
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">No</th>
                                                        <th rowspan="1" colspan="1">Nama</th>
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
