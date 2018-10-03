<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Pages_model');
		$this -> load -> library('pages/Pages_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Pages_model -> __get_pages(0);
		$this->load->view('pages', $data);
	}

	public function add()
	{
		if ($_POST) {
			$pparent = (int) $this -> input -> post('pparent');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');

			if (!$title || !$content) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('pages/add'));
			}
			else {
				$slug = __slugify($title);
					
				$arr = array('ptitle' => $title, 'pcontent' => $content, 'pstatus' => $status, 'pparent' => $pparent, 'pcreatedby' => __set_modification_log([], 0, 2), 'pupdatedby' => __set_modification_log([], 0, 2));
				if ($this -> Pages_model -> __insert_pages($arr)) {
					$lastId = $this -> db -> insert_id();
					$this -> Pages_model -> __update_pages($lastId, array('pslug' => $slug.'-'.$lastId));
					__set_error_msg(array('info' => 'Page berhasil ditambahkan.'));
					redirect(site_url('pages'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan page !!!'));
					redirect(site_url('pages'));
				}
			}
		}
		else {
			$data['pages'] = $this -> pages_lib -> __get_pages(0);
			$this->load->view('pages_' . __FUNCTION__, $data);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$pparent = (int) $this -> input -> post('pparent');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');

			if ($id) {
				if (!$title || !$content) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('pages/edit/' . $id));
				}
				else {
					$slug = __slugify($title);

					$arr = array('ptitle' => $title, 'pslug' => $slug.'-'.$id, 'pcontent' => $content, 'pstatus' => $status, 'pparent' => $pparent, 'pupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Pages_model -> __update_pages($id, $arr)) {
						__set_error_msg(array('info' => 'Page berhasil diubah.'));
						redirect(site_url('pages'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah page !!!'));
						redirect(site_url('pages'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('pages'));
			}
		}
		else {
			$data['id'] = $id;
			$data['data'] = $this -> Pages_model -> __get_pages_detail($id);
			$data['pages'] = $this -> pages_lib -> __get_pages($data['data'][0] -> pparent);
			$this->load->view('pages_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('pages'));
		}

		if ($this -> Pages_model -> __update_pages($id, array('pstatus' => 3, 'pupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Page berhasil di hapus.'));
			redirect(site_url('pages'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus page !!!'));
			redirect(site_url('pages'));
		}
	}
}
