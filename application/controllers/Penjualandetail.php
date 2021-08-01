<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualandetail extends CI_Controller 
{
	public function __construct()
	{
			parent::__construct();
		
		$this->load->model('PenjualanModel');
		$this->load->model('PelangganModel');
		$this->load->model('BarangModel');
	}
	public function proses($penjualan_id)
	{
		

	$data['penjualan'] = $this->db->get_where('penjualan',['penjualan_id'=> $penjualan_id])->row_array();
	$data['allbarang'] = $this->BarangModel->get_all_data_barang();
		$data['allpelanggan'] = $this->PelangganModel->get_all_data_pelanggan();

	$data['title'] = "Detail penjualan";

		$this->load->view('templates/header',$data);
		$this->load->view('penjualandetail/create', $data);
		$this->load->view('templates/footer');
	}

	
	public function simpandetailpenjualan()
	{
		$barang = $this->db->get_where('barang', ['barang_id' => $this->input->post('barang_id')])->row_array();

		if($this->input->post('diskon') != 0){
			$harga = $barang['harga_barang'] *	$this->input->post('jumlah') *  $this->input->post('diskon') / 100;
			$hargatotal = $barang['harga_barang'] * $this->input->post('jumlah') - $harga;

		}else{
		$hargatotal = $barang['harga_barang'] * $this->input->post('jumlah');
		}


		//proses update grand total
		$barang = $this->db->get_where('penjualan_detail', ['penjualan_id' => $this->input->post('penjualan_id')])->row_array();

		$grandtotal = $barang['harga_total'] + $hargatotal;
		$this->db->set('total', $grandtotal); 
		$this->db->where('penjualan_id',$this->input->post('penjualan_id'));
		$this->db->update('penjualan');


		$data = [

			'penjualan_id' =>	$this->input->post('penjualan_id'),
			'barang_id' => $this->input->post('barang_id'),
			'jumlah' => $this->input->post('jumlah'),
			'diskon' => $this->input->post('diskon'),
			'harga_total' => $hargatotal,
		];
		$this->db->insert('penjualan_detail',$data);

 $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Data anda berhasil di Tambahkan.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

		redirect('penjualan/detail/'. $this->input->post('penjualan_id'));
	}

		public function edit($penjualan_id)
	{
	
		$data['title'] = "Edit penjualan";
		$data['penjualan'] = $this->db->get_where('penjualan',['penjualan_id'=>$penjualan_id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('penjualan/edit', $data);
		$this->load->view('templates/footer');
	}
	public function editpenjualan()
	{
	
		$this->db->set('nama_penjualan', $this->input->post('nama_penjualan'));
		$this->db->set('harga_penjualan', $this->input->post('harga'));
		$this->db->set('stok', $this->input->post('stok'));
		$this->db->set('keterangan', $this->input->post('keterangan'));
		$this->db->where('penjualan_id',$this->input->post('penjualan_id'));
		$this->db->update('penjualan');

		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Data anda berhasil di Edit.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('penjualan');
	}

	public function hapus($penjualan_id)
	{

		
		$this->db->where('penjualan_id', $penjualan_id);
		$this->db->delete('penjualan');

		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Data anda berhasil di Hapus.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('penjualan');
	}

}
