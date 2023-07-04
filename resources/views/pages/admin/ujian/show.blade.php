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
                                                    @foreach ($ujian as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->user->nama }}</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    @if ($ujian->isNotEmpty())
                                                                    <form
                                                                        action="{{ route('admin.detail-ujian.show', $item->id) }}">
                                                                        <button type="submit" class="btn btn-info">
                                                                            <span><i
                                                                                    class="fas fa-eye mr-1"></i><b>View</b></span>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form
                                                                        action="{{ route('ujian.edit', $item->id) }}">
                                                                        <button type="submit"
                                                                            class="btn btn-success">
                                                                            <span><i
                                                                                    class="fas fa-pen mr-1"></i><b>work</b></span>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                                </div>
                                                            </td>
                                                        </tr>
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
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-danger" href="{{ route('admin.ujian.index') }}">Kembali</a>
                                </div>
                            </div>
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
