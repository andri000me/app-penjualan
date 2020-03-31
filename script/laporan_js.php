<script>
   $(document).ready(function() {
      $(".btn-print").bind("click", function(event) {
         $('#area-print').printArea();
      });
   });
</script>