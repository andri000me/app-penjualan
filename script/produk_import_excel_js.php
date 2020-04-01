<script>
   $(document).ready(function() {
      // Add the following code if you want the name of the file appear on select
      $(".custom-file-input").on("change", function() {
         var fileName = $(this).val().split("\\").pop();
         $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });
   });

   // validasi form (hanya file .xls yang diijinkan)
   function hasExtension(inputID, exts) {
      var fileName = document.getElementById(inputID).value;
      return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
   }

   function validateForm() {
      if (!hasExtension('file_excel', ['.xls'])) {
         alert("Hanya file XLS (Excel 2003) yang diijinkan.");
         return false;
      }
   }
</script>