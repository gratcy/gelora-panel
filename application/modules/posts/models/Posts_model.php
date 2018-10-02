<?php
class Posts_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_posts() {
		$this -> db -> select("a.*, b.cname FROM posts_tab a LEFT JOIN categories_tab b ON a.pcid=b.cid WHERE b.ctype=1 AND (a.pstatus=1 OR a.pstatus=0 OR a.pstatus=2)", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_posts_detail($id) {
		$this -> db -> select('* FROM posts_tab WHERE pid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_posts($data) {
        return $this -> db -> insert('posts_tab', $data);
	}
	
	function __update_posts($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('posts_tab', $data);
	}
}
