<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_system extends CI_Model{

  function checkdata($data)
  {
    $this->db->select('*');
    $this->db->from('tb_administrator');
    $this->db->where($data);

    return $this->db->get();
  }

}
