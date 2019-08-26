<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CountController {

    public $pv, $uu, $extendsTest;
    public function __construct() {
        // $this->extendsTest = new CountController();
        // $this->extendsTest->countPVUU();
    }

    public function countPVUU()
    {
        date_default_timezone_set('Asia/Seoul');
        // 로그 기록 날짜 폼
        $date = date("Y-m-d");
        
        // 원하는 형식으로 짤라 붙여
        $dateArr = explode("-", $date);
        $dateform = $dateArr[0] . $dateArr[1] . $dateArr[2]; 

        $regex = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';
        $regex2 = '/^\/funnyec\/product$|cartPageGo$|productInfo|orderPage/';
        
        $ipArr = array();
        $ipArr2 = array();

        // 파일 열러
        $file_handle  = fopen("/etc/httpd/logs/access_log-" . $dateform, "r");
        // 파일 열어서 포인터가 마지막인지 아닌지 확인

        $index = 1;
        while (!feof($file_handle)) {
            // 한줄씩 읽어
            $line_of_text = fgets($file_handle);
            // $routeMatch = '/product|cartPageGo|productInfo|orderPage/';
            // print $line_of_text . "\n";
            // 마지막 줄 다음 빈줄까지 읽기때문에 빈줄은 걸러줌
            if($line_of_text != "") {
                $logArr = explode(" ", $line_of_text);
                
                if(preg_match($regex2, $logArr[6])) {
                    $this->pv++; 
                }
                // 아이피 값들을 전부 넣어줌 -> 유니크 값 파악하기 위해
                if(!in_array($logArr[0], $ipArr)) {
                    if(preg_match($regex, $logArr[0])) {
                        array_push($ipArr, $logArr[0]);   
                    };
                }
             
                flush();
            }
            
        }

        // 파일 닫아
        fclose($file_handle);
        $this->uu += count(($ipArr));

    
        
        return ["time" => date("Y-m-d H:i:s"), "pv" => $this->pv, "uu" => $this->uu, "arr" => $ipArr];

    }

}