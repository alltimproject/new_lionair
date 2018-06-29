<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

  function cariPessenger($kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_booking');
    $this->db->join('tb_pessenger', 'tb_pessenger.kd_booking = tb_booking.kd_booking', 'left');

    $this->db->where($kd_booking);

    return $this->db->get();
  }

  function cariPenerbangan($kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_detail');
    $this->db->join('tb_booking', 'tb_booking.kd_booking = tb_detail.kd_booking', 'left');
    $this->db->join('tb_penerbangan', 'tb_penerbangan.no_penerbangan = tb_detail.no_penerbangan', 'left');

    $this->db->where($kd_booking);

    return $this->db->get();
  }

  function saveRefund($result)
  {

      return $this->db->insert('tb_refund', $result);

  }

  function saveRefundPessenger($result = array())
  {
    $total_array = count($result);

    if($total_array != 0)
    {
      return $this->db->insert_batch('tb_refund_pessenger', $result);
    }
  }

  function saveRefundDetail($result = array())
  {
    $total_array = count($result);

    if($total_array != 0)
    {
      return $this->db->insert_batch('tb_refund_detail', $result);
    }
  }

}
