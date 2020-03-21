<?php 

namespace App\Core;
use App\Core\Controller;

class helper 
{
    public static function request($val_request)
    {   
        // Request cuma bisa di pake pada method POST
        // method GET nggak bisa
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return $_REQUEST[$val_request];
        } 
    }   

    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function json_beautify($json_url)
    {
        // Library untuk mendapatkan data API dan mempercantiknya
        // cuma metode get yang diizinkan

        // persiapkan curl
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $json_url);

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // tutup curl 
        curl_close($ch);      

        // menampilkan hasil curl
        header('Content-Type: application/json');
        echo $output;

    }

    public static function blockIp()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        // search IP in blockIp.php
        include 'App\Middleware\blockIp.php';

        $z= array_search($ip, $block);

        if(in_array($ip, $block)) {
            $controller = new Controller();
            $controller->error500("You IP Cant access our webiste, 
            please contact our admin for more infomation");
          }
          
    }

}