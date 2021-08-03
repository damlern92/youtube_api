<?php

define("MAX_VIDEOS", 5);
define("API_URL", "https://www.googleapis.com/youtube/v3/");
define("API_KEY", "AIzaSyCPQlUVfBKSkTWdceYPPoHLVgUyk8TmxeE");

spl_autoload_register(function($className){
    require_once($_SERVER['DOCUMENT_ROOT'] ."/youtube_api/classes/{$className}.php");
});