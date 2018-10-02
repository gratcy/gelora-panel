<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __set_error_msg($arr) {
	$CI =& get_instance();
	return $CI -> cache -> memcached -> save('__msg', $arr, '60');
}

function __get_roles($key) {
    $arr = array();
    $CI =& get_instance();
    $permission = $CI -> permission_lib -> sesresult['permission'];
    foreach($permission as $k => $v)
        $arr[$v['pname']] = $v['aaccess'];
    return (isset($arr[$key]) ? $arr[$key] : '');
}

function __get_error_msg() {
	$CI =& get_instance();
	$css = (isset($CI -> cache -> memcached -> get('__msg')['error']) == '' ? 'success' : 'danger');
	if (isset($CI -> cache -> memcached -> get('__msg')['info'])) $CI -> cache -> memcached -> save('__msg_tmp', array('info' => true), '60');
	if (isset($CI -> cache -> memcached -> get('__msg')['error']) || isset($CI -> cache -> memcached -> get('__msg')['info'])) {
		$res = '<div class="alert alert-'.$css.' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$res .= (isset($CI -> cache -> memcached -> get('__msg')['error']) ? $CI -> cache -> memcached -> get('__msg')['error'] : $CI -> cache -> memcached -> get('__msg')['info']);
		$res .= '</div>';
		$CI -> cache -> memcached -> delete('__msg');
		return $res;
	}
}

function __get_status($status, $type) {
	if ($type <= 2)
		$flagstatus = array('Inactive', 'Published', 'Draft');
	else
		$flagstatus = array('Inactive', 'Active');
	
	if ($type == 1) {
		return $flagstatus[$status];
	}
	elseif ($type == 2) {
		$res = '<br />';
		foreach ($flagstatus as $key => $value) {
			if ($status != '' && $status == $key)
				$res .= '<input class="" type="radio" name="status" value="'.$key.'" checked> <label>'.$value.'</label> <br />';
			else
				$res .= '<input class="" type="radio" name="status" value="'.$key.'"> <label>'.$value.'</label> <br />';
		}
		return $res;
	}
	elseif ($type == 3) {
		return $flagstatus[$status];
	}
	else {
		$res = '<br />';
		foreach ($flagstatus as $key => $value) {
			if ($status != '' && $status == $key)
				$res .= '<input class="" type="radio" name="status" value="'.$key.'" checked> <label>'.$value.'</label> <br />';
			else
				$res .= '<input class="" type="radio" name="status" value="'.$key.'"> <label>'.$value.'</label> <br />';
		}
		return $res;
	}
}

function __get_rupiah($num,$type=1) {
	if ($type == 1) return "Rp. " . number_format($num,0,',','.');
	elseif ($type == 2) return number_format($num,0,',',',');
	elseif ($type == 3) return number_format($num,2,',','.');
	else return "Rp. " . number_format($num,2,',','.');
}

function __get_roles_by_id($key) {
    $CI =& get_instance();
    return $CI -> cache -> memcached -> sesresult['gid'] !=  $key ? 'no' : '';
}

function __sortArrayByDate( $a, $b ) {
    return strtotime($a -> ttanggal) - strtotime($b -> ttanggal);
}

function __set_modification_log($data, $type, $ttype) {
	if ($ttype === 1) {
		$data = json_decode($data);
		return $type == 1 ? $data -> user : __get_date(strtotime($data -> date), 3);
	}
	else {
	    $CI =& get_instance();
		return json_encode(array('user' => $CI -> permission_lib -> sesresult['uemail'], 'date' => date('Y-m-d H:i:s')));
	}
}

function __get_date($str, $type=1) {
	if ($type == 1) return date('d/m/Y', $str);
	elseif ($type == 2) return date('d ',$str).__get_month(date('m',$str)).date(' Y', $str);
	elseif ($type == 3) return date('d/m/Y H:i', $str);
	else return date('d ',$str).__get_month(date('m',$str)).date(' Y H:i',$str);
}

function __get_upload_file($file, $type) {
    $CI =& get_instance();
    if ($type == 1)
    	return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['media']['path'] . $file;
    else
    	return $CI -> config -> config['upload']['host'] . $CI -> config -> config['upload']['ads']['path'] . $file;
}