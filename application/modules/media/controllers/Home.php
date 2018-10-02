<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Media_model');
	}

	public function index()
	{
		$data['data'] = $this -> Media_model -> __get_media();
		$this->load->view('media', $data);
	}

	public function add()
	{
		if ($_FILES) {
			if (preg_match('/jpeg|jpg|png|gif|svg/i', $_FILES['file']['type'])) {
				$fname = time() . $_FILES['file']['name'];
				$fname = str_replace(' ', '-', $fname);
				$fname = str_replace('--', '-', $fname);
				$target_file = FCPATH . $this -> config -> config['upload']['media']['path'] . $fname;

			    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
					$arr = array('mname' => $_FILES['file']['name'], 'mdate' => date('Y-m-d H:i:s'), 'mfile' => $fname, 'mstatus' => 1);
					if ($this -> Media_model -> __insert_media($arr)) {
						echo json_encode(array('messege' => 'Media berhasil ditambahkan.', 'status' => 200));
					}
					else {
						echo json_encode(array('messege' => 'Gagal menambahkan media !!!', 'status' => 400));
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
		else {
			$this->load->view('media_' . __FUNCTION__, array());
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('media'));
		}

		if ($this -> Media_model -> __update_media($id, array('mstatus' => 0))) {
			__set_error_msg(array('info' => 'Media berhasil di hapus.'));
			redirect(site_url('media'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus media !!!'));
			redirect(site_url('media'));
		}
	}
}
