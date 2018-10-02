<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('Users_model');
		$this -> load -> library('users_groups/Users_groups_lib');
	}

	public function index()
	{
		$data['data'] = $this -> Users_model -> __get_users();
		$this->load->view('users', $data);
	}

	public function add()
	{
		if ($_POST) {
			$group = (int) $this -> input -> post('group');
			$status = (int) $this -> input -> post('status');
			$email = $this -> input -> post('email');
			$name = $this -> input -> post('name');
			$desc = $this -> input -> post('desc');
			$newpass = $this -> input -> post('newpass');
			$confpass = $this -> input -> post('confpass');

			if (!$group || !$name || !$email || !$newpass || !$confpass) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('users/add'));
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				__set_error_msg(array('error' => 'Penulisan email salah !!!'));
				redirect(site_url('users/add'));
			}
			else if ($this -> Users_model -> __check_user($email) > 0) {
				__set_error_msg(array('error' => 'Email sudah terdaftar !!!'));
				redirect(site_url('users/add'));
			}
			else if (strlen($newpass) < 6) {
				__set_error_msg(array('error' => 'Password minimal 6 karakter !!!'));
				redirect(site_url('users/add'));
			}
			else {
				if ($newpass !== $confpass) {
					__set_error_msg(array('error' => 'Password dan Konfirmasi Password tidak sesuai !!!'));
					redirect(site_url('users/add'));
				}
				else {
					$arr = array('ugid' => $group, 'uemail' => $email, 'uname' => $name, 'udesc' => $desc, 'upass' => md5(sha1($confpass, true)), 'ustatus' => $status, 'ucreatedby' => __set_modification_log([], 0, 2), 'uupdatedby' => __set_modification_log([], 0, 2));
					if ($this -> Users_model -> __insert_users($arr)) {
						__set_error_msg(array('info' => 'User berhasil ditambahkan.'));
						redirect(site_url('users'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan user !!!'));
						redirect(site_url('users'));
					}
				}
			}
		}
		else {
			$data['groups'] = $this -> users_groups_lib -> __get_users_groups(0);
			$this->load->view('users_' . __FUNCTION__, $data);
		}
	}

	public function edit($id)
	{
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$group = (int) $this -> input -> post('group');
			$status = (int) $this -> input -> post('status');
			$email = $this -> input -> post('email');
			$name = $this -> input -> post('name');
			$desc = $this -> input -> post('desc');
			$newpass = $this -> input -> post('newpass');
			$confpass = $this -> input -> post('confpass');
			
			if ($id) {
				if (!$group || !$name || !$email) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('users/edit/' . $id));
				}
				else {
					if ($newpass && $confpass) {
						if ($newpass !== $confpass) {
							__set_error_msg(array('error' => 'Password dan Konfirmasi Password tidak sesuai !!!'));
							redirect(site_url('users/edit/' . $id));
						}						
					}
					else {
						if ($newpass && $confpass) {
							$arr = array('ugid' => $group, 'uname' => $name, 'udesc' => $desc, 'upass' => md5(sha1($confpass, true)), 'ustatus' => $status, 'uupdatedby' => __set_modification_log([], 0, 2));
						}
						else {
							$arr = array('ugid' => $group, 'uname' => $name, 'udesc' => $desc, 'ustatus' => $status, 'uupdatedby' => __set_modification_log([], 0, 2));
						}

						if ($this -> Users_model -> __update_users($id, $arr)) {
							__set_error_msg(array('info' => 'User berhasil diubah.'));
							redirect(site_url('users'));
						}
						else {
							__set_error_msg(array('error' => 'Gagal mengubah user !!!'));
							redirect(site_url('users'));
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('users'));
			}
		}
		else {
			$data['id'] = $id;
			$data['data'] = $this -> Users_model -> __get_users_detail($id);
			$data['groups'] = $this -> users_groups_lib -> __get_users_groups($data['data'][0] -> ugid);
			$this->load->view('users_' . __FUNCTION__, $data);
		}
	}

	public function remove($id)
	{
		if (!$id) {
			__set_error_msg(array('error' => 'Kesalahan input data !!!'));
			redirect(site_url('users'));
		}

		if ($this -> Users_model -> __update_users($id, array('ustatus' => 2, 'uupdatedby' => __set_modification_log([], 0, 2)))) {
			__set_error_msg(array('info' => 'User berhasil di hapus.'));
			redirect(site_url('users'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus user !!!'));
			redirect(site_url('users'));
		}
	}
}
