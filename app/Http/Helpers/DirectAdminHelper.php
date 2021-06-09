<?php
namespace App\Http\Helpers;

class DirectAdminHelper
{
    const API_URL = "http://65.21.62.216:2222";
    const CREATEUSER_CMD = 'CMD_API_ACCOUNT_USER';
    const GETUSERPACKAGES_CMD = 'CMD_API_PACKAGES_USER';

    public function getUserPackages($cookie) : array
    {
        $info = $this->apiGETRequest(self::GETUSERPACKAGES_CMD, $cookie);
        $packages = explode('&', $info);
        foreach($packages as &$package) {
            $package = substr($package, 7);
        }
        return $packages;
    }

    public function createUser($request)
    {
        $data=array_merge($request->all(), ['action' => 'create']);
        $response = $this->apiPOSTRequest($data, $request->cookie('auth'), self::CREATEUSER_CMD);
        return $this->errorHandle($response);
    }

    private function apiPOSTRequest($data, $auth, $command) : string
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => self::API_URL.'/'.$command,
            CURLOPT_HTTPHEADER => [
                'Authorization: Basic '.$auth
            ],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $data
        ]);
        $info = curl_exec($ch);
        curl_close($ch);
        return $info;
    }

    private function apiGETRequest($command, $cookie)
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => self::API_URL.'/'.$command,
            CURLOPT_HTTPHEADER => [
                'Authorization: Basic '.$cookie
            ],
            CURLOPT_RETURNTRANSFER => true
        ]);
        $info = curl_exec($ch);
        curl_close($ch);
        return $info;
    }

    private function errorHandle(string $response) : string
    {
        $data = explode('&', $response);
        if ($data[0] === 'error=1'){
            return ($data[1]."\n".$data[2]);
        } else {
            return "Success";
        }
    }
}
?>