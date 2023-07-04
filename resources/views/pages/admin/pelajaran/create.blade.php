@extends('base')

@section('isi')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Pelajaran</h1>
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
                            <h3 class="card-title">Form Pelajar</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{route('pelajaran.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="nama">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan Mata Pelajaran" name="nama">
                              </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a class="btn btn-danger" href="{{route('pelajaran.index')}}">Kembali</a>
                                </div>
                            </div>
                          </form>
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
