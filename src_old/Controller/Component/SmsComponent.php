<?php
//Find Component
namespace App\Controller\Component;
use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
class SmsComponent extends Component
{
    public function sendOTP($mobile)
    {
        $otp = substr(str_shuffle("0123456789"), 0, 4);

        $message = "Your OTP Is ".$otp;

        $var = 'user=phppoetsit&password=9829041695&senderid=OMSAIP&channel=Trans&DCS=0&flashsms=0&number='.$mobile.'&text='.urlencode($message).'&route=7';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://103.39.134.40/api/mt/SendSMS?'.$var,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        
        $resp = curl_exec($curl);
        $resp = json_decode($resp);
        if($resp->ErrorCode == 000)
            return $otp;
        else
            return false;
    }

    public function send($mobile,$message)
    {

        $var = 'user=phppoetsit&password=9829041695&senderid=OMSAIP&channel=Trans&DCS=0&flashsms=0&number='.$mobile.'&text='.urlencode($message).'&route=7';

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://103.39.134.40/api/mt/SendSMS?'.$var,
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        
        $resp = curl_exec($curl);
        $resp = json_decode($resp);
        if($resp->ErrorCode == 000)
            return true;
        else
            return false;
    }
}