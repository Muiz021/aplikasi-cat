@extends('base')

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Jawaban</h1>
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
                            @if ($jawaban->count() != 1)
                            <div class="card-header">
                                <h3 class="card-title">Form Jawaban</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('jawaban.store', $soal->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                        <div class="form-group">
                                            <label for="nama">Jawaban</label>
                                            <input type="text" class="form-control my-2" id="nama"
                                                placeholder="Masukan Jawaban A" name="jawaban_A"
                                                value="{{ old('jawaban_A') }}">
                                            <input type="text" class="form-control my-2" id="nama"
                                                placeholder="Masukan Jawaban B" name="jawaban_B"
                                                value="{{ old('jawaban_B') }}">
                                            <input type="text" class="form-control my-2" id="nama"
                                                placeholder="Masukan Jawaban C" name="jawaban_C"
                                                value="{{ old('jawaban_C') }}">
                                            <input type="text" class="form-control my-2" id="nama"
                                                placeholder="Masukan Jawaban D" name="jawaban_D"
                                                value="{{ old('jawaban_D') }}">


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <a class="btn btn-danger"
                                            href="{{ route('soal.show', $pelajaran->id) }}">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                        <!-- /.card -->

                        {{-- tabel --}}
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Tabel Jawaban</h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                    aria-describedby="example2_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc">No</th>
                                            <th class="sorting sorting_asc">Jawaban A</th>
                                            <th class="sorting sorting_asc">Jawaban B</th>
                                            <th class="sorting sorting_asc">Jawaban C</th>
                                            <th class="sorting sorting_asc">Jawaban D</th>
                                            <th class="sorting sorting_asc">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jawaban as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ Str::limit($item->jawaban_A, 20) }}</td>
                                                <td>{{ Str::limit($item->jawaban_B, 20) }}</td>
                                                <td>{{ Str::limit($item->jawaban_C, 20) }}</td>
                                                <td>{{ Str::limit($item->jawaban_D, 20) }}</td>
                                                <td>
                                                    <div class="d-flex">

                                                        <button type="button" class="btn btn-success mx-3"
                                                            data-toggle="modal"
                                                            data-target="#modal-edit-{{ $item->id }}">
                                                            <span><i class="fas fa-edit mr-1"></i><b>Edit</b></span>
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modal-delete-{{ $item->id }}">
                                                        <span><i class="fas fa-trash mr-1"></i></i><b>Delete</b></span>

                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @include('pages.admin.jawaban.modal')
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Jawaban A</th>
                                            <th class="sorting sorting_asc">Jawaban B</th>
                                            <th class="sorting sorting_asc">Jawaban C</th>
                                            <th class="sorting sorting_asc">Jawaban D</th>
                                            <th rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            @if ($jawaban->count() == 1)
                                <div class="card-footer">
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-danger"
                                            href="{{ route('soal.show', $pelajaran->id) }}">Kembali</a>
                                    </div>
                                </div>
                            @endif
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
