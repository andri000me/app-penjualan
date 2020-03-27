<script>
   $(document).ready(function() {

      // konfigurasi DataTable
      table = $('.dataTable').DataTable({
         "processing": true,
         "serverside": true,
         "ordering": false,
         "ajax": "../lib/penjualan/penjualan_data.php",
         "language": {
            sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
            sProcessing: "Sedang memproses...",
            sLengthMenu: "Tampilkan _MENU_ data",
            sZeroRecords: "Tidak ditemukan data yang sesuai",
            sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            sInfoEmpty: "Tampil 0 sampai 0 dari 0 entri",
            sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
            sInfoPostFix: "",
            sSearch: "Pencarian:",
            sUrl: "",
            oPaginate: {
               sFirst: "Awal",
               sPrevious: "Sebelumnya",
               sNext: "Selanjutnya",
               sLast: "Akhir"
            }
         }
      });
   });

   // menghapus data berdasarkan ID
   function hapusData(id) {
      Swal.fire({
         text: "Apakah yakin ingin menghapus data ini ?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#dc3545',
         cancelButtonColor: '#343a40',
         confirmButtonText: 'Ya, hapus',
         cancelButtonText: 'Tidak, batal',
      }).then((result) => {
         if (result.value) {
            $.ajax({
               type: "GET",
               url: "../lib/penjualan/penjualan_hapus.php/?id=" + id,
               success: function(response) {
                  table.ajax.reload();
               },
               error: function() {
                  alert("function hapusData error");
               }
            });
         }
      });
   }
</script>