<?php
/*------------------------------------*\
    Cache
\*------------------------------------*/

function cache_fragment($key, $language, $ttl, $function) {
	$key = $key.'_'.$language;
	if ( current_user_can( 'manage_options' ) ) {
		call_user_func($function);
		return;
	}
	$key = apply_filters('fragment_cache_prefix','fragment_cache_').$key;
	$output = get_transient($key);
	if ( empty($output) ) {
		ob_start();
		call_user_func($function);
		$output = ob_get_clean();
		set_transient($key, $output, $ttl);
	}
	echo $output;
}

function cache_array($key, $language, $ttl, $array) {
	$key = $key.'_'.$language;
	if ( current_user_can( 'manage_options' ) ) {
		return $array;
	}
	//$output = get_transient($key);
	//if ( empty($output) ) {
		$output = $array;
		set_transient($key, $output, $ttl);
	//}
	return $output;
}

function get_cache_array($key) {
	if ( current_user_can( 'manage_options' ) ) {
		return NULL;
	} else {
		return get_transient($key);
	}
}

/*------------------------------------*\
   Responsive images helper
\*------------------------------------*/

/*------------------------------------*\
   Responsive images helper
\*------------------------------------*/

function img_with_srcset($image_id, $image_size, $max_width, $alt) {
	if($image_id != '') {
		$image_src = wp_get_attachment_image_url($image_id, $image_size);
		$image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);
		echo '<img alt="'.$alt.'" sizes="auto" src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" />';
	}
}

function lazyload_img_with_srcset($image_id, $image_size, $max_width, $additional_classes, $alt) {
	if($image_id != '') {
		$image_src = wp_get_attachment_image_url($image_id, $image_size);
		$image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);
		if(!empty($additional_classes)) {
			$additional_classes = $additional_classes;
		} else {
			$additional_classes = '';
		}
		echo '<img class="lazyload '.$additional_classes.'" alt="'.$alt.'" data-sizes="auto" data-src="'.$image_src.'" data-srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" />';
	}
}

function lazyload_focalpoint_with_srcset($image_id, $image_size, $max_width, $additional_classes, $alt, $calc_x_center, $calc_y_center ) {
	if($image_id != '') {
		$image_src = wp_get_attachment_image_url($image_id, $image_size);
		$image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);
		if(!empty($additional_classes)) {
			$additional_classes = $additional_classes;
		} else {
			$additional_classes = '';
		}
		if(!browser_is_ie()) {
			echo '<img class="lazyload '.$additional_classes.'" alt="'.$alt.'" data-sizes="auto" data-src="'.$image_src.'" data-srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" data-focus-left="'.$calc_x_center.'" data-focus-top="'.$calc_y_center.'" data-focus-right="'.$calc_x_center.'" data-focus-bottom="'.$calc_y_center.'"/>';
		} else {
			echo '<img src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" data-focus-left="'.$calc_x_center.'" data-focus-top="'.$calc_y_center.'" data-focus-right="'.$calc_x_center.'" data-focus-bottom="'.$calc_y_center.'"/>';
		}
	}
}

function focalpoint_with_srcset($image_id, $image_size, $max_width, $alt, $calc_x_center, $calc_y_center ) {
	if($image_id != '') {
		$image_src = wp_get_attachment_image_url($image_id, $image_size);
		$image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);
		if(!empty($additional_classes)) {
			$additional_classes = $additional_classes;
		} else {
			$additional_classes = '';
		}
		echo '<img src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'" data-focus-left="'.$calc_x_center.'" data-focus-top="'.$calc_y_center.'" data-focus-right="'.$calc_x_center.'" data-focus-bottom="'.$calc_y_center.'" alt="'.$alt.'"/>';
	}
}


/*------------------------------------*\
    Various
\*------------------------------------*/

function browser_is_ie() {
	$ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
	if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
		return true;
	} else {
		return false;
	}
}

function decrypt_recipient($text, $salt = 'i<n_%_y}G54[k=8fn!5Ie`+f^06OIaPnkxyg*nptc>~zOmnu*uRUAj] S2*?4C9J'){
	return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt,
		base64_decode($text), MCRYPT_MODE_ECB,
		mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

function encrypt_recipient($text, $salt = 'i<n_%_y}G54[k=8fn!5Ie`+f^06OIaPnkxyg*nptc>~zOmnu*uRUAj] S2*?4C9J'){
	return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,
		$salt, $text, MCRYPT_MODE_ECB,
		mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function replace_between($str, $needle_start, $needle_end, $replacement) {
    $pos = strpos($str, $needle_start);
    $start = $pos === false ? 0 : $pos + strlen($needle_start);

    $pos = strpos($str, $needle_end, $start);
    $end = $start === false ? strlen($str) : $pos;

    return substr_replace($str,$replacement,  $start, $end - $start);
}

function array_random($arr, $num = 1) {
    shuffle($arr);

    $r = array();
    for ($i = 0; $i < $num; $i++) {
        $r[] = $arr[$i];
    }
    return $num == 1 ? $r[0] : $r;
}

function array_orderby() {
    $args = func_get_args();
    $data = array_shift($args);
    foreach ($args as $n => $field) {
        if (is_string($field)) {
            $tmp = array();
            foreach ($data as $key => $row)
                $tmp[$key] = $row[$field];
            $args[$n] = $tmp;
            }
    }
    $args[] = &$data;
    call_user_func_array('array_multisort', $args);
    return array_pop($args);
}

function get_page_depth( $id=0, $depth=0 ) {
    global $post;
    if ( $id == 0 )
        $id = $post->ID;

    $page = get_post( $id );
    if ( !$page->post_parent ) {
            // this page does not have any parent
            return $depth;
    }
    return get_page_depth( $page->post_parent, $depth+1 );
}

function get_current_page_depth(){
	global $wp_query;

	$object = $wp_query->get_queried_object();
	$parent_id  = $object->post_parent;
	$depth = 0;
	while($parent_id > 0){
		$page = get_page($parent_id);
		$parent_id = $page->post_parent;
		$depth++;
	}

 	return $depth;
}

function write_html_content($content) {
	return $content;
}

function call_API($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

function getGUID(){
    if (function_exists('com_create_guid')){
        return trim(com_create_guid(), '{}');
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = ''//chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);
            //.chr(125);// "}"
        return $uuid;
    }
}

function detect_bot() {
	if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
		return true;
	} else {
		return false;
	}
}


/* Help Functions */

function abGetAllFields($pro_num){
	$tmpArr = get_field_objects($pro_num);
	$fillArray = array();
	foreach( $tmpArr as $tmpFieldObject ) {
		$fillArray = abGetAllFieldsCycle($fillArray, $tmpFieldObject["name"], $tmpFieldObject["value"]);
	}
	return $fillArray;
}

function abGetAllFieldsCycle($fillArray, $name, $value) {
	if (is_array($value)) {
		foreach( $value as $key => $value ) {
			$fillArray = abGetAllFieldsCycle($fillArray, $key, $value);
		}
	} else {
		array_push($fillArray, [$name, $value]);
	}
	return $fillArray;
}

function startsWith($haystack, $needle) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}


/*------------------------------------*\
   STRING SPLIT
\*------------------------------------*/
function str_split_unicode($str, $length = 1) {
	$tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
	if ($length > 1) {
		$chunks = array_chunk($tmp, $length);
		foreach ($chunks as $i => $chunk) {
			$chunks[$i] = join('', (array) $chunk);
		}
		$tmp = $chunks;
	}
	return $tmp;
}
