<?php

function diskon($total, $diskon)
{
   $bayar = $total - ($diskon / 100 * $total);

   return $bayar;
}
