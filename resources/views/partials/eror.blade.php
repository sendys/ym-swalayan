@if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show p-4" role="alert"
            style="max-width: 600px; width: 80%; margin: 0 auto;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <strong>Error!</strong> Terdapat kesalahan saat mengisi form:
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif