<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PelangganModel');
	}


	public function index()
	{
		

		$data['allpelanggan'] = $this->PelangganModel->get_all_data_pelanggan();
		$data['title'] = "Daftar Pelanggan";

		$this->load->view('templates/header',$data);
		$this->load->view('pelanggan/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
	
		$data['title'] = "Tambah Pelanggan";
		$this->load->view('templates/header', $data);
		$this->load->view('Pelanggan/create', $data);
		$this->load->view('templates/footer');
	}
	public function simpanpelanggan()
	{
		$data = [
			'nama_pelanggan' =>$this->input->post('nama_pelanggan'),
			'no_tlp' => $this->input->post('no_tlp'),
			'alamat' => $this->input->post('alamat'),
		];
		$this->db->insert('pelanggan',$data);

 $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Data anda berhasil di Tambahkan.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');

		redirect('pelanggan');
	}

		public function edit($pelanggan_id)
	{
	
		$data['title'] = "Edit pelanggan";
		$data['pelanggan'] = $this->db->get_where('pelanggan',['pelanggan_id'=>$pelanggan_id])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/edit', $data);
		$this->load->view('templates/footer');
	}
	public function editpelanggan()
	{
	
		$this->db->set('nama_pelanggan', $this->input->post('nama_pelanggan'));
		$this->db->set('no_tlp', $this->input->post('no_tlp'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->where('pelanggan_id',$this->input->post('pelanggan_id'));
		$this->db->update('pelanggan');

		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Data anda berhasil di Edit.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('pelanggan');
	}

	public function hapus($pelanggan_id)
	{

		
		$this->db->where('pelanggan_id', $pelanggan_id);
		$this->db->delete('pelanggan');

		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> Data anda berhasil di Hapus.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>');
		redirect('pelanggan');
	}

}
