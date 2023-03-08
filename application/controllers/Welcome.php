<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
// 	public function index()
// 	{
// 		$data['auctions']= $this->M_lelang->all();
// 		$lelangEndTime = false;

// 		foreach ($data['auctions'] as $auction) {
// 			$product = $this->M_lelang->first($auction->id_lelang);
// 			date_default_timezone_set("Asia/Jakarta");
// 			$currentDateTime = date('Y-m-d H:i:s');
// 			$currentDateTime = strtotime($currentDateTime);

// 			if ($product->tanggal_akhir != null) {
// 				$batas_waktu = strtotime($product->tanggal_akhir);

// 				if ($currentDateTime >= $batas_waktu && $product->status == 'dibuka') {
// 					$max_bid = $this->M_lelang->max_bid($product->id_lelang);

// 					$this->db->set('status', 'ditutup');
// 					if ($max_bid != null) {
// 						$this->db->set('harga_akhir', $max_bid->penawaran_harga);
// 						$this->db->set('pelelang', $max_bid->nama_lengkap);
// 					}
// 					$this->db->where('id_lelang', $product->id_lelang);
// 					$this->db->update('tb_lelang');
// 					$lelangEndTime = true;
// 				}
// 			}
// 		}
// 		if ($this->input->post('keyword')){
// 			$data['auctions'] = $this->M_lelang->cariDataLelang();
// 		}
// 		$data['title'] = 'masyarakat';
// 		$this->load->view('templates/user_header', $data);
// 		$this->load->view('masyarakat/dashboard', $data);
// 		$this->load->view('templates/user_footer');
// 	}
// }

public function index()
	{
		$data['auctions']= $this->M_lelang->all();
		$lelangEndTime = false;

        foreach ($data['auctions'] as $auction) {
            $product = $this->M_lelang->first($auction->id_lelang);
            
            date_default_timezone_set("Asia/Jakarta");
            $currentDateTime = date('Y-m-d H:i:s');
            $currentDateTime = strtotime($currentDateTime);


            if ($product->tanggal_akhir != null) {
                $batas_waktu = strtotime($product->tanggal_akhir);

                if ($currentDateTime >= $batas_waktu && $product->status == 'dibuka') {
                    $max_bid = $this->M_lelang->max_bid($product->id_lelang);

                    $this->db->set('status','ditutup');
                    if ($max_bid !=null) {
                        $this->db->set('harga_akhir', $max_bid->penawaran_harga);
                        $this->db->set('id_user',$max_bid->id_user);
                    }

                    $this->db->where('id_lelang', $product->id_lelang);
                    $this->db->update('tb_lelang');
                    $lelangEndTime = true;
                }
            }

        }

		if ($this->input->post('keyword')){
			$data['auctions'] = $this->M_lelang->cariDataLelang();
		}
		$data['title'] = 'masyarakat';
		$this->load->view('templates/user_header', $data);
		$this->load->view('masyarakat/dashboard', $data);
		$this->load->view('templates/user_footer');
	}
}	
