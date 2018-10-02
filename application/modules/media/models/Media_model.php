<?php
class Media_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_media() {
		$this -> db -> select('* FROM media_tab WHERE mstatus=1', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_media_detail($id) {
		$this -> db -> select('* FROM media_tab WHERE mid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_media($data) {
        return $this -> db -> insert('media_tab', $data);
	}
	
	function __update_media($id, $data) {
        $this -> db -> where('mid', $id);
        return $this -> db -> update('media_tab', $data);
	}
}
