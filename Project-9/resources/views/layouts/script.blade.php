<script src="{{ asset('js/script.js') }}"></script>

{{-- <script>
    // popup
    const logOut = document.getElementById('logout-btn');
    // event
    logOut.addEventListener('click', function() {
        const pilihan = confirm('Ingin ke halaman Index?');
        if (pilihan == false) {
            alert('Pengguna membatalkan')
            event.preventDefault();
        } else {
            console.log('Mengalihkan Anda ke Index');
        }
    });
</script> --}}
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif

        @if (session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '{{ session('info') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif
    });

    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.btn-delete');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); 

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); 
                    }
                });
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.btn-logout');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); 

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "ingin logout dari sistem!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); 
                    }
                });
            });
        });
    });
</script>
