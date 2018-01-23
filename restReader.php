<?php
// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

function CallAPI($method, $url, $data = false, $header_data)
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
	$request_headers = array();
	$request_headers[] = 'input: '.$header_data['input'];
	$request_headers[] = 'type: '. $header_data['type'];
	$request_headers[] = 'margin: '. $header_data['margin'];
	$request_headers[] = 'show_top_level_pathways: '. $header_data['show_top_level_pathways'];
	$request_headers[] = 'matching_type: '.  $header_data['matching_type']."<br>";
	
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
	curl_setopt($curl, CURLOPT_TIMEOUT,30);
    curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
	
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	//echo $curl;
    if (!$result = curl_exec($curl)){
			return curl_error($curl);
	}else{
		curl_close($curl);
		return $result;
	}
}
?>