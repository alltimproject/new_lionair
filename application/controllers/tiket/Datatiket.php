<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatiket extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/m_dashboard');
    $this->load->model('admin/m_refund');
    $this->load->model('admin/m_secure_tiket');
    //Codeigniter : Write Less Do More
  }

  function gettiket()
  {
    if(isset($_GET['secure_code'])){
      $codetiket = $_GET['secure_code'];
      $check = $this->m_secure_tiket->check_tiket($codetiket);
      if($check->num_rows() > 0 ){
        foreach($check->result() as $datarefund){
          $no_refund    = $datarefund->no_refund;
          $kd_booking   = $datarefund->kd_booking;
          $tgl_refund   = $datarefund->tgl_refund;
          $total_refund = $datarefund->total_refund;

        }

        $data['no_refund']    = $no_refund;
        $data['tgl_refund']   = $tgl_refund;
        $data['total_refund'] = $total_refund;
        //get penerbangan refund
        $where3 = array(
          'tb_detail.kd_booking' => $kd_booking
        );
         $data['getpenerbanganRefund'] = $this->m_refund->getpenerbanganRefund($no_refund, $where3);
        //----------------------
        $where = array(
          'tb_refund_pessenger.no_refund' => $no_refund
        );
        $data['checkdataid']  = $this->m_dashboard->getrefundtiket($where,$kd_booking);
        $this->load->view('tiket/v_tiket_refund', $data);



      }else{
        redirect(base_url());
      }
    }else{
      redirect(base_url());
    }
  }

}
