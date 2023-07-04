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
                            <div class="col-sm-6">
                                <!-- radio -->
                            </div>
                            <div class="card-body">
                                <form action="{{ route('ujian.update', $pelajaran->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @foreach ($pelajaran->soal as $soal)
                                        <div class="form-group">
                                            <label for="nama">{{ $loop->iteration }}. {{ $soal->soal }}</label>
                                            <ol style="list-style-type: none">
                                                @php
                                                    $choices = ['A', 'B', 'C', 'D'];
                                                @endphp
                                                @foreach ($soal->jawabans as $key => $jawaban)
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban{{ $loop->parent->iteration }}" value="{{ $jawaban['jawaban_' . $choices['0']] }}">
                                                            <label class="form-check-label" for="radio{{ $loop->parent->iteration }}{{ $key + 1 }}">{{ $choices['0'] }}. {{ $jawaban['jawaban_' . $choices['0']] }}</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban{{ $loop->parent->iteration }}" value="{{ $jawaban['jawaban_' . $choices['1']] }}">
                                                            <label class="form-check-label" for="radio{{ $loop->parent->iteration }}{{ $key + 1 }}">{{ $choices['1'] }}. {{ $jawaban['jawaban_' . $choices['1']] }}</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban{{ $loop->parent->iteration }}" value="{{ $jawaban['jawaban_' . $choices['2']] }}">
                                                            <label class="form-check-label" for="radio{{ $loop->parent->iteration }}{{ $key + 1 }}">{{ $choices['2'] }}. {{ $jawaban['jawaban_' . $choices['2']] }}</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban{{ $loop->parent->iteration }}" value="{{ $jawaban['jawaban_' . $choices['3']] }}">
                                                            <label class="form-check-label" for="radio{{ $loop->parent->iteration }}{{ $key + 1 }}">{{ $choices['3'] }}. {{ $jawaban['jawaban_' . $choices['3']] }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                        {{-- card body --}}
                                    @endforeach
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </div>
                                </form>
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
