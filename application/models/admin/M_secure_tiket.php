<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_secure_tiket extends CI_Model{

  function check_tiket($secure_code)
  {
    $this->db->select('*');
    $this->db->from('tb_refund');
    $this->db->where('secure_code', $secure_code);

    return $this->db->get();
  }



}
