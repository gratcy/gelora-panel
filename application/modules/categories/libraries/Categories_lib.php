<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('categories/Categories_model');
    }
    
    function __get_categories($id='') {
		$users = $this -> _ci -> Categories_model -> __get_categories_select(1, 0);

		$res = '<option value=""></option>';
		foreach($users as $k => $v) :
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
	
			$usersChild = $this -> _ci -> Categories_model -> __get_categories_select(2, $v -> cid);
			foreach($usersChild as $k1 => $v1) :
				if ($id == $v1 -> cid)
					$res .= '<option value="'.$v1 -> cid.'" selected>-- '.$v1 -> cname.'</option>';
				else
					$res .= '<option value="'.$v1 -> cid.'">-- '.$v1 -> cname.'</option>';
			endforeach;
		endforeach;

		return $res;
	}
    
    function __get_categories_level($id='') {
		$users = $this -> _ci -> Categories_model -> __get_categories_select(1, 0);

		$res = '<option value="0">Main</option>';
		foreach($users as $k => $v) :
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
	
			$usersChild = $this -> _ci -> Categories_model -> __get_categories_select(2, $v -> cid);
			foreach($usersChild as $k1 => $v1) :
				if ($id == $v1 -> cid)
					$res .= '<option value="'.$v1 -> cid.'" selected>-- '.$v1 -> cname.'</option>';
				else
					$res .= '<option value="'.$v1 -> cid.'">-- '.$v1 -> cname.'</option>';
			endforeach;
		endforeach;

		return $res;
	}
}
