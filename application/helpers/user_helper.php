<?php

  function buatKode($panjang)
  {
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $string = '';

    for($i = 0; $i < $panjang; $i++)
    {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
    }

    return $string;
  }

  function kodeVerifikasi()
  {
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $string = '';

    for($i = 0; $i < 6; $i++)
    {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
    }

    return $string;
  }


 ?>
