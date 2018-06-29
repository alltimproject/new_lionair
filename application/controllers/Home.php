<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
  }

  function index()
  {
    $data['title'] = 'Home | Lion Air';
    $this->load->view('user/v_home', $data);
  }

  function term_condition()
  {
    $this->load->view('user/v_term_condition');
  }

  function cari_booking($kd_booking)
  {
    $where = array(
			'tb_booking.kd_booking' => $kd_booking
		);

    $data['booking'] = $kd_booking;
    $data['pessenger'] = $this->m_user->cariPessenger($where)->result();
    $data['penerbangan'] = $this->m_user->cariPenerbangan($where)->result();

    echo json_encode($data);
  }

  function form_refund($kd_booking)
  {
    $data['booking'] = $kd_booking;
    $this->load->view('user/v_form_refund', $data);
  }

  function proses_refund()
  {
    $post = $this->input->post();
    $tiket = array();
    $penerbangan = array();
    // $total_post = count($post['no_tiket']);

    $kode = "RFDIAN";

    $data = array(
      'no_refund' => $kode,
      'kd_booking' => $this->input->post('kd_booking'),
      'refund_name' => $this->input->post('refund_gelar').' '.$this->input->post('refund_first').' '.$this->input->post('refund_last'),
      'refund_alamat' => $this->input->post('refund_alamat'),
      'refund_telepon' => $this->input->post('refund_telepon'),
      'refund_email' => $this->input->post('refund_email'),
      'total_refund' => $this->input->post('total_refund'),
      'refund_status' => 'onproses'
    );

    foreach($post['no_tiket'] AS $key => $val)
    {
      $tiket[] = array(
        'no_refund' => $kode,
        'no_tiket' => $post['no_tiket'][$key]
      );
    }

    foreach($post['no_penerbangan'] AS $key => $val)
    {
      $penerbangan[] = array(
        'no_refund' => $kode,
        'no_penerbangan' => $post['no_penerbangan'][$key]
      );
    }

    $cek = $this->m_user->saveRefund($data);
    if($cek) {
      $cek2 = $this->m_user->saveRefundPessenger($tiket);
      if($cek2) {
        $cek3 = $this->m_user->saveRefundDetail($penerbangan);
        if($cek3) {
          echo "berhasil";
        } else {
          echo "gagal";
        }
      } else {
        echo "gagal";
      }
    } else {
      echo "gagal";
    }
  }

}
