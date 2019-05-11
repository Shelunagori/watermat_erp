<?php
//Find Component
namespace App\Controller\Component;
use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
class HelpComponent extends Component
{
    function upload($file,$old_image = null)
    {
        if($file['error'] == 0)
        {
            //image uploading   
            $folder = 'documents/';

            $data = [];

            if (is_dir($folder) && is_writable($folder))
                $uploadOk = 1;
            else {
                $this->Flash->error(__('Upload directory is not writable, or does not exist'));
                $uploadOk = 0;
            }

            $address = $folder . basename($file["name"]);
            $img = time().rand();
            $imageFileType = strtoupper(pathinfo($address,PATHINFO_EXTENSION));
            $img_address = $folder.$img.".".$imageFileType;

            // Check if image file is a actual image or fake image
            // $check = getimagesize($file["tmp_name"]);
            $check = 1;
            if($check !== false) 
            {
                $uploadOk = 1;
                // Allow certain file formats
                if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
                && $imageFileType != "GIF" && $imageFileType != "PDF" ) {
                    $data['message'] = 'Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed.';
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk)
                {
                    if (move_uploaded_file($file["tmp_name"],$img_address))
                    {
                        $uploadOk = 1;
                        if($old_image && file_exists($old_image))
                            unlink($old_image);
                    }
                    else
                        $uploadOk = 0;
                }
            }
            else
                $uploadOk = 0;

            if($uploadOk)
                return $img_address;
            else
                return $old_image;
        }
        else
            return $old_image;
    }

    function uploadOnly($file)
    {
        //image uploading   
        $folder = 'documents/';

        $data = [];

        if (is_dir($folder) && is_writable($folder))
            $uploadOk = 1;
        else {
            $data['message'] = 'Upload directory is not writable, or does not exist';
            $uploadOk = 0;
        }

        $address = $folder . basename($file["name"]);
        $img = time().rand();
        $imageFileType = strtoupper(pathinfo($address,PATHINFO_EXTENSION));
        $img_address = $folder.$img.".".$imageFileType;

        // Check if image file is a actual image or fake image
        // $check = getimagesize($file["tmp_name"]);
        $check = 1;
        if($check !== false) 
        {
            $uploadOk = 1;
            // Allow certain file formats
            if($imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
            && $imageFileType != "GIF" && $imageFileType != "PDF" ) {
                $data['message'] = 'Sorry, only JPG, JPEG, PNG, GIF & PDF files are allowed.';
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
                $data['message'] =  "Sorry, your file was not uploaded.";
            else
            {
                if (move_uploaded_file($file["tmp_name"],$img_address))
                    $data['address'] = $img_address;
                else
                {
                    $uploadOk = 0;
                    $data['message'] = "Image can not be uploaded.";
                }
            }
        }
        else
        {
            $data['message'] = 'File is not an image.';
            $uploadOk = 0;
        }

        if($uploadOk)
            $data['success'] = true;
        else
            $data['success'] = false;

        return json_encode($data);
    }

    function arrayReplace($Array, $Find, $Replace){
        if(is_array($Array)){
            foreach($Array as $Key=>$Val)
            {
                if(is_array($Array[$Key]))
                   $Array[$Key] = $this->arrayReplace($Array[$Key], $Find, $Replace);
                else
                    if($Key == $Find)
                        $Array[$Key] = $Replace;
            }
        }
        return $Array;
    }

    function saveNotifications($data,$user_ids)
    {
        $Notifications = TableRegistry::getTableLocator()->get('Notifications');
        $notifications = [];

        $data = $data['data'];

        foreach ($user_ids as $key => $user_id) {
            $data['user_id'] = $user_id;
            $notifications[] = $data;
        }

        if(!empty($notifications))
        {
            $save_notification = $Notifications->newEntities($notifications);
            $Notifications->saveMany($save_notification);
        }
    }

    function getTokens($user_ids)
    {
        $Users = TableRegistry::getTableLocator()->get('Users');
        $device_tokens = [];
        $data = $Users->find()->where(['id IN'=>$user_ids]);

        foreach ($data as $key => $user) {
            if($user->device_id)
                $device_tokens[] = $user->device_id;
        }

        return $device_tokens;
    }

    function sendNotification($user_ids,$message,$village_id,$project_id,$village_work_id,$link = null)
    {
        $device_tokens = $this->getTokens($user_ids);

        $API_ACCESS_KEY = 'AAAAWixVFbA:APA91bEVktpD9kt3A9d-oCj4XDA8admLFEU6gZ59biMJ-uPJijC1xmBixdDkuvtwC87frMNtp8mhxLRcK6rh4_Wt0D-XLZXfjUTsx-zV4ByL83Vz6smELsGawTRnz9sjCL6aEkp2Cvh-';
        
        if(!empty($device_tokens) || !empty($API_ACCESS_KEY))
        {
            $msg = array
            (
                'message'   => $message,
                'link' => 'http://watermate/'.$link.'?village_id='.$village_id.'&project_id='.$project_id.'&village_work_id='.$village_work_id,
            );

                $url = 'https://fcm.googleapis.com/fcm/send';
                $fields = array
                (
                    'registration_ids'  => array_filter($device_tokens),
                    'data'          => $msg
                );
                $headers = array
                (
                    'Authorization: key=' .$API_ACCESS_KEY,
                    'Content-Type: application/json'
                );

                $this->saveNotifications($fields,$user_ids);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result001 = curl_exec($ch);
                $res = json_decode($result001);
                if ($result001 === FALSE) {
                    // die('FCM Send Error: ' . curl_error($ch));
                }
                curl_close($ch);
        }
    }

    function getAllMenus()
    {
        $Menus = TableRegistry::getTableLocator()->get('Menus');
        $menu =  $Menus->find('threaded');
        return $menu;
    }
}