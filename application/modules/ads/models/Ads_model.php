<?php
class Ads_model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function __get_ads() {
		$this -> db -> select("a.*, b.cname FROM ads_tab a LEFT JOIN categories_tab b ON a.acid=b.cid WHERE b.ctype=2 AND (a.astatus=1 OR a.astatus=0 OR a.astatus=2) ORDER BY a.aid DESC", FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_ads_detail($id) {
		$this -> db -> select('* FROM ads_tab WHERE aid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_ads_img($id) {
		$this -> db -> select('aphotos FROM ads_tab WHERE aid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_ads($data) {
        return $this -> db -> insert('ads_tab', $data);
	}
	
	function __update_ads($id, $data) {
        $this -> db -> where('aid', $id);
        return $this -> db -> update('ads_tab', $data);
	}
}
