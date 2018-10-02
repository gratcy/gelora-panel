<?php
class Users_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_users() {
		$this -> db -> select("a.*,b.gname FROM users_tab a JOIN groups_tab b ON a.ugid=b.gid WHERE (a.ustatus=1 OR a.ustatus=0)", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_users_detail($id) {
		$this -> db -> select('* FROM users_tab WHERE uid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_users($data) {
        return $this -> db -> insert('users_tab', $data);
	}
	
	function __update_users($id, $data) {
        $this -> db -> where('uid', $id);
        return $this -> db -> update('users_tab', $data);
	}
	
	function __check_user($email) {
		$this -> db -> select("uemail FROM users_tab WHERE uemail='".$email."' AND (ustatus=1 or ustatus=0)");
		return $this -> db -> get() -> num_rows();
	}
}
