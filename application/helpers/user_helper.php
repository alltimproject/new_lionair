<?php

  function buatKode($panjang)
  {
    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ124567890';
    $string = '';

    for($i = 0; $i < $panjang; $i++)
    {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
    }

    return $string;
  }


 ?>
