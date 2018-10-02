<?php
class Home_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_stats($type) {
    	if ($type == 1)
			$sql = $this -> db -> query("SELECT * FROM pages_tab WHERE (pstatus=1 OR pstatus=0)", FALSE);
		else if ($type == 2)
			$sql = $this -> db -> query("SELECT * FROM posts_tab WHERE (pstatus=1 OR pstatus=0 OR pstatus=2)", FALSE);
		else if ($type == 3)
			$sql = $this -> db -> query("SELECT * FROM categories_tab WHERE (cstatus=1 OR cstatus=0)", FALSE);
		else
			$sql = $this -> db -> query("SELECT * FROM users_tab WHERE (ustatus=1 OR ustatus=0)", FALSE);
		return $sql -> num_rows();
	}
}
