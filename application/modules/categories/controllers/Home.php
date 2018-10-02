<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Categories_model');
		$this -> load -> library('categories/Categories_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Categories_model -> __get_categories();
		$this->load->view('categories', $data);
	}

	public function add()
	{
		if ($_POST) {
			$cparent = (int) $this -> input -> post('cparent');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$desc = $this -> input -> post('desc');

			if (!$title || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('categories/add'));
			}
			else {
				$slug = __slugify($title);
				
				$arr = array('ctype' => 1, 'cname' => $title, 'cdesc' => $desc, 'cstatus' => $status, 'cparent' => $cparent, 'ccreatedby' => __set_modification_log([], 0, 2), 'cupdatedby' => __set_modification_log([], 0, 2));
				if ($this -> Categories_model -> __insert_categories($arr)) {
					$lastId = $this -> db -> insert_id();
					$this -> Categories_model -> __update_categories($lastId, array('cslug' => $slug.'-'.$lastId));
					__set_error_msg(array('info' => 'Category berhasil ditambahkan.'));
					redirect(site_url('categories'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan category !!!'));
					redirect(site_url('categories'));
				}
			}
		}
		else {
			$data['cparent'] = $this -> categories_lib -> __get_categories_level(0);
			$this->load->view('categories_' . __FUNCTION__, $data);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$cparent = (int) $this -> input -> post('cparent');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$desc = $this -> input -> post('desc');
			
			if ($id) {
				if (!$title || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('categories/edit/' . $id));
				}
				else {
					$slug = __slugify($title);
					
					$arr = array('ctype' => 1, 'cslug' => $slug.'-'.$id, 'cname' => $title, 'cdesc' => $desc, 'cstatus' => $status, 'cparent' => $cparent, 'cupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Categories_model -> __update_categories($id, $arr)) {	
						__set_error_msg(array('info' => 'Category berhasil diubah.'));
						redirect(site_url('categories'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah category !!!'));
						redirect(site_url('categories'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('categories'));
			}
		}
		else {
			$data['id'] = $id;
			$data['data'] = $this -> Categories_model -> __get_categories_detail($id);
			$data['cparent'] = $this -> categories_lib -> __get_categories_level($data['data'][0] -> cparent);
			$this->load->view('categories_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('categories'));
		}

		if ($this -> Categories_model -> __update_categories($id, array('cstatus' => 2, 'cupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Category berhasil di hapus.'));
			redirect(site_url('categories'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus category !!!'));
			redirect(site_url('categories'));
		}
	}
}
