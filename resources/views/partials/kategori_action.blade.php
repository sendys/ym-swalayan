<a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning">
    <i class="fa fa-solid fa-edit"></i>
</a>
<form class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus data ini?');"
    action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        <i class="fa fa-solid fa-trash"></i>
    </button>
</form>
