<script>
   $(document).ready(function() {
      $(".btn-print").bind("click", function(event) {
         $('#area-print').printArea();
      });
   });
   // function keluar aplikasi
   function keluarApp() {
      Swal.fire({
         text: "Apakah yakin ingin keluar dari aplikasi ini ?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#dc3545',
         cancelButtonColor: '#343a40',
         confirmButtonText: 'Ya, keluar',
         cancelButtonText: 'Tidak, batal',
      }).then((result) => {
         if (result.value) {
            window.location.href = '?view=keluar';
         }
      });
   }

   // menampilkan modal form profil
   function profilModal() {
      var id = <?= $_SESSION['id_user'] ?>;

      $.ajax({
         type: "POST",
         url: "../lib/pengaturan/profil_data.php/?id=" + id,
         dataType: "JSON",
         success: function(response) {
            $('#modal-profil').modal('show');

            $('#id_profil').val(response.id_usr);
            $('#nama_profil').val(response.nama_usr);
            $('#user_profil').val(response.user_usr);
         },
         error: function() {
            alert("request ajax jquery modal profil error");
         }
      });

   }

   // menampilkan modal form profil
   function ubahpassModal() {
      $('#modal-pass').modal('show');
      $('#modal-pass form')[0].reset();
   }

   $(document).ready(function() {
      // menyimpan data profil dengan ajax jquery
      $('#modal-profil form').submit(function(e) {
         e.preventDefault();
         var id = $('#id_profil').val();

         $.ajax({
            type: "POST",
            url: "../lib/pengaturan/profil_ubah.php/?id=" + id,
            data: {
               'id': $('#id_profil').val(),
               'nama': $('#nama_profil').val(),
               'user': $('#user_profil').val(),
            },
            success: function(response) {
               $('#modal-profil').modal('hide');
            },
            error: function() {
               alert("request ajax jquery modal profil error");
            }
         });

         return false;
      });

      // menyimpan data ubah password dengan ajax jquery
      $('#modal-pass form').submit(function(e) {
         e.preventDefault();
         var id_pass = <?= $_SESSION['id_user'] ?>;

         $.ajax({
            type: "POST",
            url: "../lib/pengaturan/password_ubah.php/?id=" + id_pass,
            data: {
               'id': id_pass,
               'pass': $('#ubah_password').val(),
            },
            success: function(response) {
               $('#modal-pass').modal('hide');
            },
            error: function() {
               alert("request ajax jquery modal ubah password error");
            }
         });

         return false;
      });
   });
</script>