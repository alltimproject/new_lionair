<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model{
  function getbooking()
  {
    $this->db->distinct('tb_booking.kd_booking');
    $this->db->select('tb_booking.kd_booking,
                       tb_booking.tgl_booking,
                       tb_booking.tipe_booking,
                       tb_booking.nama_depan,
                       tb_booking.nama_belakang,
                       tb_booking.no_tlp,
                       tb_booking.status
                       ');
    $this->db->from('tb_booking');
    $this->db->join('tb_pessenger', 'tb_pessenger.kd_booking = tb_booking.kd_booking','left');
    return $this->db->get()->result();
  }
  function getdatabooking($where2)
  {
    $this->db->select('*');
    $this->db->from('tb_booking');
    $this->db->where($where2);
    return $this->db->get();
  }

  function get_passenger_id($kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_pessenger');
    $this->db->where($kd_booking);

   return $this->db->get()->result();
  }

  function get_penerbangan_id($where)
  {
    $this->db->select('*');
    $this->db->from('tb_detail');
    $this->db->join('tb_booking','tb_booking.kd_booking = tb_detail.kd_booking', 'left');
    $this->db->join('tb_penerbangan', 'tb_penerbangan.no_penerbangan = tb_detail.no_penerbangan', 'left');
    $this->db->where($where);
    return $this->db->get()->result();
  }


  // function getKodebooking()
  // {
  //   $this->db->distinct('kd_booking');
  //   $this->db->select('kd_booking');
  //   $this->db->from('tb_pessenger');
  //   $this->db->join('tb_refund', 'tb_refund.no_tiket = tb_pessenger.no_tiket');
  //   $this->db->where('refund_status','on proses');
  //   return $this->db->get()->result();
  // }

  //get No refund
  function getrefund()
  {
     $this->db->select('*');
     $this->db->from('tb_refund');
     $this->db->where('refund_status', 'onproses');
     return $this->db->get()->result();
  }
  //get detail tiket no refund
  function getrefundtiket($where, $kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_refund_pessenger');
    $this->db->join('tb_refund', 'tb_refund.no_refund = tb_refund_pessenger.no_refund');
    $this->db->join('tb_pessenger', 'tb_pessenger.no_tiket = tb_refund_pessenger.no_tiket');
    $this->db->where($where);
    $this->db->where('tb_pessenger.kd_booking', $kd_booking);
    return $this->db->get()->result();
  }
  function getemailUser($kd_booking)
  {
    $this->db->select('*');
    $this->db->from('tb_booking');
    $this->db->where('kd_booking', $kd_booking);

    return $this->db->get()->result();
  }



}
