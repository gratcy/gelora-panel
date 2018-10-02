<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_groups_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('users_groups/Users_groups_model');
    }
    
    function __get_users_groups($id='') {
		$users = $this -> _ci -> Users_groups_model -> __get_users_groups_select();
		$res = '<option value=""></option>';
		foreach($users as $k => $v)
			if ($id == $v -> gid)
				$res .= '<option value="'.$v -> gid.'" selected>'.$v -> gname.'</option>';
			else
				$res .= '<option value="'.$v -> gid.'">'.$v -> gname.'</option>';
		return $res;
	}
}
