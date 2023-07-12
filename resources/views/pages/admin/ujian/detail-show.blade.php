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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Hasil Ujian</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Peserta</label>
                                            <input type="text" class="form-control bg-white" id="nama"
                                                value="{{ $ujian->user->nama }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Mata Pelajaran</label>
                                            <input type="text" class="form-control bg-white" id="nama"
                                                value="{{ $ujian->pelajaran }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Total Soal</label>
                                            <input type="text" class="form-control bg-white" id="nama"
                                                value="{{ $ujian->total_soal }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="col-12">
                                            <div class="small-box bg-info">
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars" style="color: white;"></i>
                                                </div>
                                                <div class="inner">
                                                    <h3>{{ $ujian->nilai }}</h3>
                                                    <p>Nilai</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex">
                                            <div class="col-md-6">
                                                <div class="small-box bg-danger">
                                                    <div class="icon">
                                                        <i class="fas fa-times-circle" style="color: white;"></i>
                                                    </div>
                                                    <div class="inner">
                                                        <h3>{{ $ujian->total_soal - $ujian->soal_benar }}</h3>
                                                        <p>Soal Salah</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="small-box bg-success">
                                                    <div class="icon">
                                                        <i class="fas fa-check-circle" style="color: white;"></i>
                                                    </div>
                                                    <div class="inner">
                                                        <h3>{{ $ujian->soal_benar }}</h3>
                                                        <p>Soal Benar</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- card body --}}
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('admin.ujian.show', $pelajaran->id) }}" method="GET">
                                        <input type="hidden" name="pelajaran_id" id=""
                                            value="{{ $pelajaran->id }}">
                                        <button type="submit" class="btn btn-danger">
                                            Kembali
                                        </button>
                                    </form>
                                </div>
                            </div>
                            {{-- card footer --}}
                            <!-- form start -->
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
