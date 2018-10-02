<?php
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_login($uemail, $upass) {
		$this -> db -> select("a.uid,a.uemail,a.ugid FROM users_tab a WHERE a.uemail='".$uemail."' AND a.upass='".md5(sha1($upass, true))."' AND a.ustatus=1", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_permission($id) {
		$this -> db -> select('a.pname,a.purl,b.aaccess FROM permission_tab a JOIN access_tab b ON a.pid=b.apid WHERE b.agid= ' . $id, FALSE);
		return $this -> db -> get() -> result_array();
	}
	
	function __update_history_login($id, $data) {
        $this -> db -> where('uid', $id);
        return $this -> db -> update('users_tab', $data);
	}
}
