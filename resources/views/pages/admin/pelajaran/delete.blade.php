<div class="modal fade" id="modal-delete-{{ $item->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Pelajaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah ingin menghapus pelajaran? <b>{{ $item->nama }}</b></p>
            </div>
            <form action="{{ route('pelajaran.destroy', $item->id) }}" method="post">
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
