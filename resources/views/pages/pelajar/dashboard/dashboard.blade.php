@extends('base')

@section('isi')

@php
use App\Models\Pelajaran;
use App\Models\User;
use App\Models\Ujian;
@endphp
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{Ujian::where('user_id',Auth::user()->id)->count()}}</h3>
                                <p>Ujian</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{route('ujian.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-success py-3">
                            <div class="inner">
                                <h3>{{Pelajaran::count()}}</h3>

                                <p>Pelajaran</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </section>
    </div>
@endsection
