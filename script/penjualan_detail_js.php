<script>
   var table, produk;

   $(document).ready(function() {

      // konfigurasi DataTable
      table = $('.tabel-detail').DataTable({
         "dom": 'Brt',
         "bSort": false,
         "processing": true,
         "serverside": true,
         "ajax": {
            "url": "../lib/penjualan/penjualan_detail_data.php",
            "type": "GET"
         },
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
      }).on('draw.dt', function() {
         loadCart($('#diskon').val());
      });

      // ambil data diskon
      $('#diskon').change(function(e) {
         e.preventDefault();
         if ($(this).val() == "") $(this).val(0).select();
         loadCart($(this).val());
      });

      // ambil data produk 
      $('#id_produk').keyup(function(e) {
         e.preventDefault();

         $.ajax({
            type: "GET",
            url: "../lib/penjualan/penjualan_produk.php?id=" + $(this).val(),
            dataType: "JSON",
            beforeSend: function() {
               $('#produk').html('<option value="sedang memuat">');
            },
            success: function(result) {
               $('#produk').html('');

               var i;
               var produk = '';

               for (i = 0; i < result.length; i++) {
                  produk += '<option value=' + result[i].id + '>' + result[i].nama + '</option>';
               }

               $('#produk').html(produk);
            },
            error: function() {
               alert('tidak dapat change id produk');
            }
         });
      });


      $('.btn-tambah').click(function(e) {
         e.preventDefault();

         $.ajax({
            type: "POST",
            url: "../lib/penjualan/penjualan_tambah_keranjang.php",
            data: {
               id_produk: $('#id_produk').val()
            },
            success: function(result) {
               $('#id_produk').val("");
               table.ajax.reload();
            },
            error: function() {
               alert('gagal .btn-tambah click');
            }
         });
      });
   });

   // function untuk edit jumlah produk pada keranjang
   function ubahJumlah(productID) {
      $.ajax({
         type: "POST",
         url: "../lib/penjualan/penjualan_ubah_keranjang.php",
         data: {
            id_produk: productID,
            jumlah: $('#prd-' + productID).val()
         },
         success: function(response) {
            table.ajax.reload(function() {
               loadCart($('#disk').val());
            });
         },
         error: function() {
            alert('gagal ubahJumlah');
         }
      });
   }

   // function untuk hapus keranjang
   function deleteItem(productID) {
      $.ajax({
         type: "POST",
         url: "../lib/penjualan/penjualan_hapus_keranjang.php",
         data: {
            id_produk: productID
         },
         success: function(response) {
            table.ajax.reload(function() {
               loadCart($('#disk').val());
            });
         },
         error: function() {
            alert('tidak dapat deleteItem');
         }
      });
   }

   // function load keranjang
   function loadCart(diskon = 0) {

      $('#item').val($('.total_item').val());
      $('#total').val($('.total').val());

      $.ajax({
         type: "GET",
         url: "../lib/penjualan/penjualan_load.php?diskon=" + diskon + "&total=" + $('.total').val(),
         dataType: "JSON",
         success: function(data) {
            $('#grandtotal').val(data.bayar);
            $('.text-total').text(data.text_total);
         },
         error: function() {
            alert('tidak dapat loadCart');
         }
      });
   }
</script>