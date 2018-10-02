<?php
class Settings_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __update_profile($uemail, $id, $updated) {
		return $this -> db -> query("UPDATE users_tab SET uemail='".$uemail."', uupdatedby='".$updated."' WHERE uid=" . $id);
	}
	
	function __check_password($id) {
		$this -> db -> select('upass FROM users_tab WHERE uid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __update_password($password, $id, $updated) {
		return $this -> db -> query("UPDATE users_tab SET upass='".md5(sha1($password, true))."', uupdatedby='".$updated."' WHERE uid=" . $id);
	}
}
