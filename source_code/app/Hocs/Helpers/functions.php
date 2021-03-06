<?php
/**
 * Make Delete Button
 *
 * @param  string $link
 * @return string
 */
function makeDeleteButton($link) {
	return '<a class="btn btn-xs btn-danger btn-delete-action" href="'. $link .'"><i class="fa fa-trash-o"></i></a>';
}


/**
 * Make Edit button
 *
 * @param  string $link
 * @return string
 */
function makeEditButton($link) {
	return '<a class="btn btn-xs btn-default" href="'. $link .'"><i class="fa fa-pencil"></i></a>';
}


/**
 * Make active button
 *
 * @param  string $link
 * @param  integer $currentActiveValue
 * @return string
 */
function makeActiveButton($link, $currentActiveValue) {
	$classActive = $currentActiveValue == 1 ? 'fa-check-square' : 'fa-square-o';
	return '<a class="btn-action btn-xs btn-active-action" href="'. $link .'"><i class="fa '. $classActive .' fa-2x"></i></a>';
}


/**
 * Convert date sang integer
 *
 * @param  string $dateStr  Chuá»—i Ä‘á»‹nh dáº¡ng ngÃ y thÃ¡ng
 * @param  string $hour     Chuá»—i Ä‘á»‹nh dáº¡ng giá»::phÃºt::giÃ¢y ná»‘i vÃ o Ä‘á»ƒ láº¥y time chÃ­nh xÃ¡c
 *
 * @return integer
 */
function convertDateToTime($dateStr, $hour = '00:00:00') {
	$dateStr = str_replace('/', '-', $dateStr);
	return strtotime($dateStr . ' ' . trim($hour));
}


/**
 * Tao chu khong dau & thay the dau cach bang dau -
 * @param  [type] $string     [description]
 * @param  string $keyReplace [description]
 * @return string
 */
function removeTitle($string, $keyReplace = "/"){
	$string = removeAccent($string);
	$string =  trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	$string =  str_replace(" ","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace("--","-",$string);
	$string = str_replace($keyReplace,"-",$string);
	return strtolower($string);
}

/**
 * Remove tieng viet thanh khong dau
 * @param  $string
 * @return string
 */
function removeAccent($string) {
	$marTViet = array(
	// Chữ thường
	"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
	"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ","Đ","'",
	// Chữ hoa
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ","Đ","'",
	);
	$marKoDau=array(
		/// Chữ thường
		"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
		"e","e","e","e","e","e","e","e","e","e","e",
		"i","i","i","i","i",
		"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
		"u","u","u","u","u","u","u","u","u","u","u",
		"y","y","y","y","y",
		"d","D","",
		//Chữ hoa
		"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
		"E","E","E","E","E","E","E","E","E","E","E",
		"I","I","I","I","I",
		"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
		"U","U","U","U","U","U","U","U","U","U","U",
		"Y","Y","Y","Y","Y",
		"D","D","",
		);
	return str_replace($marTViet, $marKoDau, $string);
}


/**
 * Tao link sort
 *
 * @param  string $field
 * @param  string|null $url
 * @example http://example.com => http://example.com?name=desc&age=asc
 *
 * @throws \Exception
 * @return string
 */
function createLinkSort($field, $url = null) {

	if(!isUrl($url)) {
		throw new \Exception("Url is not valid", 1);
	}

	$get      = $_GET;
	$parseUrl = parse_url($url);

	if(strpos($url, '?') !== false) {
		parse_str($parseUrl['query'], $urlParams);
	}

	if(isset($get[$field])) {
		if($get[$field] == 'asc') {
			$get[$field] = 'desc';
		} else {
			$get[$field] = 'asc';
		}
	} else {
		$get[$field] = 'desc';
	}

	$urlReturn = $parseUrl['scheme'] . '://' . $parseUrl['host'];
	$urlReturn .= '?' . http_build_query($get);

	return $urlReturn;
}

/**
 * Check URL
 *
 * @param  string  $url
 * @return boolean
 */
function isUrl($url) {
	return filter_var($url, FILTER_VALIDATE_URL);
}


/*
* $key - Field data need validate
* @return boolean
*/
function hasError($key) {
	$errors = Session::get('errors');
	if (@count($errors) && $errors->has($key)) {
	  return true;
	}
	return false;
}
/*
* $key - Field data need validate
* @return string
*/
function hasValidator($key) {
	$status = '';
	if (hasError($key)) {
	  $status = 'has-error';
	} elseif (Session::has('errors') && !hasError($key)) {
	  $status = 'has-success';
	}
	return $status;
}

function alertError($key) {
	$errors = Session::get('errors');
	if (hasError($key)) {
		return $errors->first($key, '<p class="help-inline text-danger text-left">:message</p>');
	}
	return '';
}

/**
 * Hàm format định dạng số
 * @param  number  $number
 * @return string
 */
function format_number($number, $sufix = ''){

	if(is_numeric($number)) {
	   $return  = number_format($number, 2, ".", ",");
	   if(intval(substr($return, -2, 2)) == 0) $return = number_format($number, 0, ".", ".");
	   elseif(intval(substr($return, -1, 1)) == 0) $return = number_format($number, 1, ".", ".");

	   	if ($sufix == 'đ') {
	   		$return = $return . '<sup>' . $sufix . '</sup>';
	   	}

	   return $return;
	}

	return null;
}

/**
 * Format currency
 *
 * @param  double|float|integer $number
 * @param  string $prefix
 * @param  string $sufix
 * @return string
 */
function formatCurrency($number, $prefix = '', $sufix = '') {
	return $prefix . number_format($number, 0, '.', '.') . $sufix;
}

/**
 * @param mixed $data
 * Debug function
 */
function _debug($data) {

	echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
	echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

	$debug_backtrace = debug_backtrace();
	$debug = array_shift($debug_backtrace);

	echo '<div>File: ' . $debug['file'] . '</div>';
	echo '<div>Line: ' . $debug['line'] . '</div>';

	if(is_array($data) || is_object($data)) {
		print_r($data);
	}
	else {
		var_dump($data);
	}
	echo '</pre>';
}

/**
 * Add params to url
 * @param array  $params [key => value]
 * @param string $url
 *
 * @return string
 */
function url_add_params(array $params = array(), $url = null) {
	if(is_null($url)) {
        $url = url()->full();
    }

    $parseUrl = parse_url($url);

    $query = isset($parseUrl['query']) ? $parseUrl['query'] : "";
    if($query) {
        parse_str($query, $parseQuery);
        $params = array_merge($parseQuery, $params);
    }

    ksort($params);

    $urlReturn = [
        isset($parseUrl['scheme']) ? $parseUrl['scheme'] : 'http',
        '://',
        $parseUrl['host'],
        isset($parseUrl['path']) ? $parseUrl['path'] : '',
        '?',
        urldecode(http_build_query($params))
    ];

    return implode('', $urlReturn);
}

function addConditionsFilter($array, $key, $value){
	if(empty($value)){
		if(isset($array[$key])){
			unset($array[$key]);
		}
		return $array;
	}

	$values = array($value);
	if(!empty($array[$key])){
		$olds = explode(':', $array[$key]);
		$values = in_array($value, $olds) ? array_diff($olds, $values) : array_merge($olds, $values);
	}
	$array[$key] = implode(':', $values);
	return $array;
}

function getUrlCompareProduct($productId, $url = null) {
	$params = addConditionsFilter($_GET, 'p', $productId);
	return url_add_params($params);
}

/**
 * In hoa chữ cái đầu tiên trong 1 chuỗi
 *
 * @param string $string
 *
 * @return string
 */
function firstLetterUpperCase($string) {
	$first = mb_substr($string, 0, 1);
	$sub = mb_substr($string, 1, mb_strlen($string));
	return mb_strtoupper($first) . $sub;
}


/**
 * Get html breadcrumb item
 *
 * @param  string  $name
 * @param  string  $url
 * @param  boolean $active
 * @param  array $htmlAttributes
 *
 * @return string
 */
function getBreadcrumbItem($name, $url, $active = false, $htmlAttributes = []) {
	$class_active = $active ? 'active' : 'normal';

	if($active) {
		$link_item = '<span itemprop="item"><span itemprop="name">'. strip_tags($name) .'</span></span>';
	}else {
		$link_item = '<a href="'. $url .'" itemprop="item">
				   	<span itemprop="name">'. strip_tags($name) .'</span>
						</a>';
	}

	$attributes = mergeAttributes(['class' => $class_active], $htmlAttributes);

	return '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" '. makeAttributes($attributes) .'>'. $link_item .'</li>';
}


if( ! function_exists('mergeAttributes') ) {
	/**
	* Merge Attributes
	*
	* @return array
	*/
	function mergeAttributes() {

		$args = func_get_args();

		$temp_attributes = array();

		$attributes = array();

		foreach($args as $key => $array_attr) {
			foreach($array_attr as $name_attr => $value_attr) {
				if($name_attr == 'class') {
					$temp_attributes[$name_attr][] = $value_attr;
				}else{
					$temp_attributes[$name_attr] = $value_attr;
				}
			}
		}

		foreach($temp_attributes as $name_attr => $value_attr) {
			if($name_attr == 'class') {
				$attributes[$name_attr] = implode(' ', $value_attr);
			}else{
				$attributes[$name_attr] = $value_attr;
			}
		}

		return $attributes;
	}
}


if(! function_exists('makeAttributes')) {
	/**
	 * Generate string attributes
	 * @param  array $attributes
	 * @return string
	 */
	function makeAttributes(array $attributes) {
		$stringAttribute = '';
		if(is_array($attributes)) {
			foreach($attributes as $key => $value) {
				$stringAttribute .= "$key=\"$value\" ";
			}
		}else{
			$stringAttribute = @strval($attributes);
		}

		return trim($stringAttribute, ' ');
	}
}


function getServerName() {
	return Request::server('SERVER_NAME');
}

function cutString($string, $length = 150, $ext = '...') {
	if(!$string) return $string;
	$str = mb_substr($string, 0, $length);
	if(mb_strlen($str) < $length) {
		return $string;
	}

	return $str . $ext;
}

/**
 * Get http code
 * @param  string $resourceUrl
 * @return int
 */
function getHttpCode($resourceUrl) {
	$ch = curl_init($resourceUrl);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_exec($ch);
	$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $statusCode;
}

/**
 * Generate keywords
 * @param  string $string
 * @return string
 */
function generateKeywords($string) {
	$stringExplode = explode(' ', $string);
	$keyword = '';
	foreach($stringExplode as $k => $v) {
		if(isset($stringExplode[$k]) && isset($stringExplode[$k+1])) {
			$keyword .= $stringExplode[$k] . ' ' . $stringExplode[$k+1] . ',';
			unset($stringExplode[$k]);
			unset($stringExplode[$k+1]);
		}
	}

	$keyword = trim($keyword, ',');

	return $keyword;
}


function getExtension($file) {
	$file = str_replace('\\', '/', $file);
	$lastdot = strrpos($file, '.');
	return strtolower(substr($file, $lastdot + 1));
}

function isLocalhost() {
	return @$_SERVER['REMOTE_ADDR'] == '127.0.0.1';
}

function getStrDayOfWeek($day) {
	switch ($day) {
		case 0:
			return 'Thứ hai';

		case 1:
			return 'Thứ ba';

		case 2:
			return 'Thứ tư';

		case 3:
			return 'Thứ năm';

		case 4:
			return 'Thứ sáu';

		case 6:
			return 'Thứ bảy';

		case 7:
			return 'Chủ nhật';

		default:
			return 'Không phải ngày trong tuần';
	}
}


function sanitize_output($buffer) {

    $search = array(
	'/\>[^\S ]+/s',
	'/[^\S ]+\</s',
	'/(\s)+/s'
	);

	$replace = array(
	'>',
	'<',
	'\\1'
	);

	if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
		$buffer = preg_replace($search, $replace, $buffer);
	}

	return $buffer;
}

if ( !function_exists('change_date') ) {
	function change_date($date) {
		$date = $date . date("H:i:s");
        $date = str_replace('/', '-', $date);
        $date = date('Y-m-d H:i:s', strtotime($date));
        return $date;
	}
}

if( ! function_exists('get_client_ip') ) {
	/**
	 * Get client ip
	 * @return string
	 */
	function get_client_ip() {
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      	$ip = $_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      	$ip = $_SERVER['REMOTE_ADDR'];
	    }

	    return $ip;
	}
}


if ( ! function_exists('combinations') ) {
	function combinations($arrays, $i = 0) {
	    if (!isset($arrays[$i])) {
	        return array();
	    }
	    if ($i == count($arrays) - 1) {
	        return $arrays[$i];
	    }

	    // get combinations from subsequent arrays
	    $tmp = combinations($arrays, $i + 1);

	    $result = array();

	    // concat each array from tmp with each element from $arrays[$i]
	    foreach ($arrays[$i] as $v) {
	        foreach ($tmp as $t) {
	            $result[] = is_array($t) ?
	                array_merge(array($v), $t) :
	                array($v, $t);
	        }
	    }

	    return $result;
	}
}

if( ! function_exists('is_json') ) {
	function is_json($string) {
		json_decode($string);
		return (json_last_error() == JSON_ERROR_NONE);
	}
}


if ( ! function_exists('get_option') ) {
	/**
	 * Get an option from options
	 * @param  mixed  $key
	 * @param  mixed $default
	 * @return mixed
	 */
	function get_option($key, $default = false) {
		$option = DB::table('options')->where('key', $key)->first();

		// Không có thì return giá trị mặc định
		if(is_null($option)) {
			return $default;
		}

		$value = json_decode($option->value, true);

		// Nếu là json thì return luôn, ngược lại thì trả về giá trị
		if( $value ) {
			return $value;
		}

		return $option->value;
	}
}


if( ! function_exists('update_option') ) {
	/**
	 * Update option
	 * @param  string $key
	 * @param  string $value
	 * @return $id
	 */
	function update_option($key, $value) {
		$exits = DB::table('options')->where('key', $key)->count();

		// Nếu là mảng thì json_encode
		if(is_array($value)) $value = json_encode($value);

		// Nếu không có thì tạo mới
		if(!$exits) {
			return DB::table('options')->insertGetId([
				'key'   => $key,
				'value' => $value
			]);
		} else {
			return DB::table('options')
			           ->where('key', $key)
					   ->update([
					    	'value' => $value
						]);
		}
	}
}


if( ! function_exists('build_sort_link') ) {
    /**
     * Build sort link for sort
     * @param $sortKey
     * @param $link
     *
     * @throws Exception
     * @return string
     */
    function build_sort_link($sortKey, $link) {
    	if(! isUrl($link)) {
    		throw new Exception($link. " is not valid url", 1);
    	}

        // Parse url
        $parseUrl = parse_url($link);
        if(!isset($parseUrl['query'])) {
            $queryParams = [];
        } else {
            parse_str($parseUrl['query'], $queryParams);
        }

        // Attach action
        $queryParams['_action'] = 'sort';
        $queryParams['sort_key'] = $sortKey;

        if(!isset($parseUrl['port'])) $parseUrl['port'] = 80;

        // Domain url
        if(80 !== (int) $parseUrl['port']) {
            $url = $parseUrl['scheme'] . '://' . $parseUrl['host'] . ':' . $parseUrl['port'] . $parseUrl['path'];
        } else {
            $url = $parseUrl['scheme'] . '://' . $parseUrl['host'] . $parseUrl['path'];
        }

        // Default sort
        if(!isset($queryParams['sort_value'])) {
            $queryParams['sort_value'] = "DESC";
        }

        // To lower
        foreach($queryParams as $key => $value) {
            $queryParams[$key] = strtolower($value);
        }

        // Switch sort value
        if ($queryParams['sort_value'] == "asc") {
            $queryParams['sort_value'] = "desc";
        } else {
            $queryParams['sort_value'] = "asc";
        }


        return $url . '?' . http_build_query($queryParams);
    }
}


if( ! function_exists('get_icon_sort') ) {

	/**
	 * Get icon sort
	 * @param  string $key
	 * @param  array  $query
	 * @return string
	 */
	function get_icon_sort($key, array $query)
	{
		$action = array_get($query, '_action');
		$sortKey = array_get($query, 'sort_key');
		$sortValue = strtolower(array_get($query, 'sort_value'));
		if($action == 'sort' && $sortKey == $key) {
			if($sortValue == 'asc') {
				return '<i class="fa fa-caret-down"></i>';
			}else{
				return '<i class="fa fa-caret-up"></i>';
			}
		}
	}
}


if( ! function_exists('get_sort_link') ) {
	/**
	 * Get sort link
	 * @param  string $key
	 * @param  string $link
	 * @param  array  $query
     *
     * @throws Exception
	 * @return string
	 */
	function get_sort_link($key, $link, array $query) {
		return sprintf('<a href="'.build_sort_link($key, $link).'">Id %s</a>', get_icon_sort($key, $query));
	}
}


if( ! function_exists('get_sort_params') ) {
	/**
	 * Get sort params
	 * @param  array  $query
	 * @return array
	 */
	function get_sort_params(array $query) {
		$sortKey = array_get($query, 'sort_key');
		$sortValue = strtolower(array_get($query, 'sort_value'));
		if($sortKey && $sortValue) {
			return [$sortKey => $sortValue];
		}

		return [];
	}
}
