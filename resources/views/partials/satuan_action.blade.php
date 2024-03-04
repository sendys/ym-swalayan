<a href="{{ route('admin.satuan.edit', $satuan->id) }}" class="btn btn-sm btn-warning" title="Edit">
    <i class="fa fa-solid fa-edit"></i>
</a>
<form class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus data ini?');"
    action="{{ route('admin.satuan.destroy', $satuan->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
        <i class="fa fa-solid fa-trash"></i>
    </button>
</form>
