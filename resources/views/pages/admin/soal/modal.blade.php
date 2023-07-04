<div class="modal fade" id="modal-edit-{{ $item->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Soal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('soal.update',$item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Soal</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Soal"
                            name="soal" value="{{$item->soal}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jawaban</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Jawaban"
                            name="jawaban" value="{{$item->jawaban}}">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="modal-delete-{{ $item->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Soal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah ingin menghapus Soal? <b>{{ $item->soal }}</b></p>
            </div>
            <form action="{{ route('soal.destroy', $item->id) }}" method="post">
                @method('DELETE')
                @csrf
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
