<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use SESSION;
use App\Data;
class DownloadController extends Controller
{
    public function index()
    {
    	
        return view('admin.index');
    }
    public function downloadFile($filename)
    {

    	$ip_address=$_SERVER['REMOTE_ADDR'];
    	$browserName= $this->ExactBrowserName();
    	$mac_address= exec('getmac');
    	$user_id=Auth::user()->id;
		

		return Data::create([
            'ip_address' => $ip_address,
            'user_browser' => $browserName,
            'mac_address' => $mac_address,
            'user_id' => $user_id,
        ]);
        
        header("Content-Type: application/octet-stream");
		$file = $filename;
		$fullfile = public_path($filename);

		header("Content-Disposition: attachment; filename=" . Urlencode($file));   
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");            
		header("Content-Length: " . Filesize($fullfile));
		flush(); // this doesn't really matter.
		$fp = fopen($fullfile, "r");
		while (!feof($fp))
		{
		echo fread($fp, 65536);
		flush(); // this is essential for large downloads
		} 
		fclose($fp);
    }

    function ExactBrowserName()
{

$ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
    // OPERA
    $ExactBrowserNameBR="Opera";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
    // CHROME
    $ExactBrowserNameBR="Chrome";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
    // INTERNET EXPLORER
    $ExactBrowserNameBR="Internet Explorer";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
    // FIREFOX
    $ExactBrowserNameBR="Firefox";
} elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
    // SAFARI
    $ExactBrowserNameBR="Safari";
} else {
    // OUT OF DATA
    $ExactBrowserNameBR="OUT OF DATA";
};

return $ExactBrowserNameBR;
}
}
