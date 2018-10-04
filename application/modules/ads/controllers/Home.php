<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Ads_model');
		$this -> load -> library('categories_ads/Categories_ads_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Ads_model -> __get_ads();
		$this->load->view('ads', $data);
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$category = (int) $this -> input -> post('category');
			$status = (int) $this -> input -> post('status');
			$title = $this -> input -> post('title');
			$content = $this -> input -> post('content');
			$name = $this -> input -> post('name');
			$price = $this -> input -> post('price');
			$phone = $this -> input -> post('phone');
			$phone2 = $this -> input -> post('phone2');
			$prov = $this -> input -> post('prov');
			$city = $this -> input -> post('city');

			if ($id) {
				if (!$category || !$title || !$content) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('ads/edit/' . $id));
				}
				else {
					$slug = __slugify($title);

					$arr = array('aname' => $name, 'aphone' => $phone, 'acity' => $city, 'aprovince' => $prov, 'aphone2' => $phone2, 'acid' => $category, 'aslug' => $slug.'-'.$id, 'aprice' => $price, 'atitle' => $title, 'adesc' => $content, 'astatus' => $status, 'aupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Ads_model -> __update_ads($id, $arr)) {
						__set_error_msg(array('info' => 'Ads berhasil diubah.'));
						redirect(site_url('ads'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah ads !!!'));
						redirect(site_url('ads'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('ads'));
			}
		}
		else {
			$data['data'] = $this -> Ads_model -> __get_ads_detail($id);
			$data['id'] = $id;
			$data['categories'] = $this -> categories_ads_lib -> __get_categories($data['data'][0] -> acid, 2);
			$this->load->view('ads_' . __FUNCTION__, $data);
		}
	}

	public function imageRemove($id) {
		$imgQuery = $this -> input -> get('img');
		$det = $this -> Ads_model -> __get_ads_img($id);
		if (!$det) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('ads'));
		}
		else {
			$photos = json_decode($det[0] -> aphotos, true);
			$photoArr = array();
			foreach ($photos as $k => $v) {
				if ($v['img'] != $imgQuery) {
		    		$photoArr[] = array('img' => $v['img']);
				}
			}

			$arr = array('aphotos' => json_encode($photoArr), 'aupdatedby' => __set_modification_log([], 0, 2));
			if ($this -> Ads_model -> __update_ads($id, $arr)) {
				__set_error_msg(array('info' => 'Image berhasil di hapus !!!'));
				redirect(site_url('ads/edit/' . $id));
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('ads'));
			}
		}
	}

	public function upload($id) {
		$det = $this -> Ads_model -> __get_ads_img($id);
		if (!$det) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('ads'));
		}
		else {
			if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
				$photos = json_decode($det[0] -> aphotos, true);
				$fname = time() . $_FILES['file']['name'];
				$fname = str_replace(' ', '-', $fname);
				$fname = str_replace('--', '-', $fname);
				$target_file = FCPATH . $this -> config -> config['upload']['ads']['path'] . $fname;

			    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			    	$photoArr = array(array('img' => $fname));
			    	foreach ($photos as $k => $v) {
			    		$photoArr[] = array('img' => $v['img']);
			    	}
					$arr = array('aphotos' => json_encode($photoArr), 'aupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Ads_model -> __update_ads($id, $arr)) {
						echo json_encode(array('messege' => 'Media berhasil ditambahkan.', 'status' => 200));
					}
					else {
						echo json_encode(array('messege' => 'Gagal menambahkan ads !!!', 'status' => 400));
					}
			    }
			    else {
			        echo json_encode(array('messege' => 'Sorry, there was an error uploading your file.', 'status' => 400));
			    }
			}
			else {
				echo json_encode(array('messege' => 'Failed upload data !', 'status' => 400));
			}
			die;
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('ads'));
		}

		if ($this -> Ads_model -> __update_ads($id, array('astatus' => 3, 'aupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'Ads berhasil di hapus.'));
			redirect(site_url('ads'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus ads !!!'));
			redirect(site_url('ads'));
		}
	}
}
