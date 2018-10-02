<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Posts_model');
		$this -> load -> library('categories/Categories_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Posts_model -> __get_posts();
		$this->load->view('posts', $data);
	}

	public function add()
	{
		if ($_POST) {
			$category = (int) $this -> input -> post('category');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');

			if (!$category || !$title || !$content) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('posts/add'));
			}
			else {
				$arr = array('puid' => $this -> permission_lib -> sesresult['uid'], 'pcid' => $category, 'pdate' => date('Y-m-d H:i:s'), 'ptitle' => $title, 'pcontent' => $content, 'pstatus' => $status, 'pcreatedby' => __set_modification_log([], 0, 2), 'pupdatedby' => __set_modification_log([], 0, 2));
				if ($this -> Posts_model -> __insert_posts($arr)) {
					__set_error_msg(array('info' => 'Post berhasil ditambahkan.'));
					redirect(site_url('posts'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan post !!!'));
					redirect(site_url('posts'));
				}
			}
		}
		else {
			$data['categories'] = $this -> categories_lib -> __get_categories(0);
			$this->load->view('posts_' . __FUNCTION__, $data);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$category = (int) $this -> input -> post('category');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');

			if ($id) {
				if (!$category || !$title || !$content) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('posts/edit/' . $id));
				}
				else {
					$arr = array('pcid' => $category, 'ptitle' => $title, 'pcontent' => $content, 'pstatus' => $status, 'pupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Posts_model -> __update_posts($id, $arr)) {
						__set_error_msg(array('info' => 'Post berhasil diubah.'));
						redirect(site_url('posts'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah post !!!'));
						redirect(site_url('posts'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('posts'));
			}
		}
		else {
			$data['data'] = $this -> Posts_model -> __get_posts_detail($id);
			$data['id'] = $id;
			$data['categories'] = $this -> categories_lib -> __get_categories($data['data'][0] -> pcid);
			$this->load->view('posts_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('posts'));
		}

		if ($this -> Posts_model -> __update_posts($id, array('pstatus' => 3, 'pupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Posts berhasil di hapus.'));
			redirect(site_url('posts'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus posts !!!'));
			redirect(site_url('posts'));
		}
	}
}
