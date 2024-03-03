<!-- jQuery 3 -->
<script src="{{ url('theme/dist/js/jquery.min.js') }}"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{ url('theme/dist/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- template -->
<script src="{{ url('theme/dist/js/niche.js') }}"></script>

<!-- Morris JavaScript -->
<script src="{{ url('theme/dist/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ url('theme/dist/plugins/morris/morris.js') }}"></script>

<!-- Include jQuery and DataTables scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}


{{ $script ?? '' }}
{{ $modal ?? '' }}

{{-- Sweetalert if error exist --}}
{{-- @if (session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        })
    </script>
@endif --}}

{{-- Sweetalert if success exist --}}
{{-- @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
        })
    </script>
@endif --}}

<script>
    $(document).ready(function() {
        $('#harga').on('input', function() {
            var inputValue = $(this).val();

            // Hapus semua karakter selain angka
            var numericValue = inputValue.replace(/[^\d]/g, '');

            // Format sebagai angka dengan pemisah ribuan
            var formattedValue = parseFloat(numericValue).toLocaleString('id-ID');

            // Tampilkan kembali nilai yang telah diformat
            $(this).val('Rp ' + formattedValue);
        });

        $('#harga').on('blur', function() {
            // Ambil nilai angka saja
            var numericValue = parseFloat($(this).val().replace(/[^\d]/g, ''));

            if (isNaN(numericValue)) {
                // Jika input tidak berupa angka, atur nilainya menjadi 0
                numericValue = 0;
            }

            // Tampilkan kembali nilai sebagai mata uang dengan format
            var formattedValue = numericValue.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            // Tetapkan nilai yang telah diformat ke input
            $(this).val(formattedValue);

            // Simpan nilai numerik aktual (tanpa format) di atribut data
            $(this).data('numeric-value', numericValue);
        });

        // Tambahkan event listener untuk submit form
        $('form').submit(function() {
            // Ambil nilai numerik dari atribut data dan tetapkan ke input
            $('#harga').val($('#harga').data('numeric-value'));
        });
    });






    // Script untuk menampilkan dan menyembunyikan notifikasi
    document.addEventListener('DOMContentLoaded', function() {
        var notification = document.getElementById('notification');

        if (notification) {
            // Munculkan notifikasi dengan animasi
            setTimeout(function() {
                notification.style.right = '20px';
            }, 100);

            // Sembunyikan notifikasi setelah beberapa detik
            setTimeout(function() {
                notification.style.right = '-300px';
            }, 4000);
        }
    });

    jQuery(document).ready(function() {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function(f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var html =
                                    "<div class='upload__img-box'><div style='background-image: url(" +
                                    e.target.result + ")' data-number='" + $(
                                        ".upload__img-close").length + "' data-file='" + f
                                    .name +
                                    "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }
</script>
