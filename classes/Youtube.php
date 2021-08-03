<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/youtube_api/config.php");

class Youtube{

	private $api_url;

	public function yt_search($keyword){
		$this->api_url = API_URL . 'search?part=snippet&q='.$keyword.'&maxResults='.MAX_VIDEOS.'&key='.API_KEY;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_URL, $this->api_url);
		$response = curl_exec($ch);

		$data = json_decode($response);
		$value = json_decode(json_encode($data), true);
		return $value;

	}

}