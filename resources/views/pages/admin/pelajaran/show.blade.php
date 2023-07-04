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
                                <h3 class="card-title">Form Ujian</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                @foreach ($pelajaran->soal as $soal)
                                <form action="#">
                                    <div class="form-group">
                                        <label for="nama">{{$loop->iteration}}.  {{$soal->soal}}</label>
                                        <ol type="A">
                                            @foreach ($soal->jawabans as $jawaban)
                                            <li>{{$jawaban->jawaban_A}}</li>
                                            <li>{{$jawaban->jawaban_B}}</li>
                                            <li>{{$jawaban->jawaban_C}}</li>
                                            <li>{{$jawaban->jawaban_D}}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                            {{-- card body --}}
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-danger" href="{{route('pelajaran.index')}}">Kembali</a>
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
