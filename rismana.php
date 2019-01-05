<?php
/* Creator : YarzCode */
/* Auto Delete Post Facebook */
function curl($url, $fields = null, $cookie = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }  
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5000);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
}
 
$token = 'EAAAAAYsX7TsBABZC0ZCskbRst5UuMiFlOaAcMWdaYhyc7YB2eIDrbzDI7T9CUmU0pO7ihtymdPhq13ztQHPtjdW9aCKHswug2ukaCi3pLvvVpfLLvMfPzDDKc593asKY2bwzPJEHxDt2wwEKbs5tkoX28ARQ5jO0u6E4DR62l6OhhKMT4XClP55GgsUgyU6tIXX0ZAKeycdfuqWinKD'; // Access Token
$uu = curl("https://graph.facebook.com/me/posts?access_token=$token&limit=1000&fields=id,name");
$ua = json_decode($uu);
 
 
foreach($ua->data as $ahyar) {
    $n = '?privacy={"value":"SELF"}';
    $cu = curl("https://graph.facebook.com/v3.1/".$ahyar->id."/".$n, 'access_token='.$token);
    if(@json_decode($cu,1)['success'] == true)
    {
        echo $ahyar->id." Success set to privacy.\n";
    } else {
         echo $ahyar->id." Failed set to privacy.\n";       
    }
}
