@extends('base')

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Soal</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Soal</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('soal.store', $pelajaran->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Soal</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Masukan Soal"
                                            name="soal">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Jawaban</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukan Jawaban" name="jawaban">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <a class="btn btn-danger" href="{{ route('soal.index') }}">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        {{-- tabel --}}
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Soal</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc">No</th>
                                            <th class="sorting sorting_asc">Soal</th>
                                            <th class="sorting sorting_asc">Jawaban</th>
                                            <th class="sorting sorting_asc">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($soal as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->soal }}</td>
                                                <td>{{ $item->jawaban }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{ route('jawaban.index', $item->id) }}"
                                                            method="get">
                                                            @csrf
                                                            <button type="submit" class="btn btn-info">
                                                                <span><i class="fas fa-plus-circle mr-1"></i><b>Create
                                                                        Answers</b></span>
                                                            </button>
                                                        </form>

                                                        <button type="button" class="btn btn-success mx-3"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit-{{ $item->id }}">
                                                            <span> <i class="fas fa-edit mr-1"></i><b>Edit</b></span>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#modal-delete-{{ $item->id }}">
                                                            <span><i class="fas fa-trash mr-1"></i><b>Delete</b></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('pages.admin.soal.modal')
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Soal</th>
                                            <th rowspan="1" colspan="1">Jawaban</th>
                                            <th rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{-- end tabel --}}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
