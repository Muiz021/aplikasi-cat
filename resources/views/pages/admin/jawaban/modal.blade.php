<div class="modal fade" id="modal-edit-{{ $item->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jawaban</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('jawaban.update',$item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Jawaban A</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Jawaban A"
                            name="jawaban_A" value="{{$item->jawaban_A}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jawaban B</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Jawaban B"
                            name="jawaban_B" value="{{$item->jawaban_B}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jawaban C</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Jawaban C"
                            name="jawaban_C" value="{{$item->jawaban_C}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jawaban D</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Jawaban D"
                            name="jawaban_D" value="{{$item->jawaban_D}}">
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
                <h4 class="modal-title">Hapus jawaban</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah ingin menghapus jawaban dari soal? <b>{{ $item->soal->soal }}</b></p>
            </div>
            <form action="{{ route('jawaban.destroy', $item->id) }}" method="post">
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
