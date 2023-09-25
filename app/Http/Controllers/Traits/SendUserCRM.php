<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

trait SendUserCRM
{
    public function sendUserToCRM($user, $source, $advisor = null) {
        if (is_null($advisor)) {
            $advisor2 = 4;
        }
        if ($advisor == 5) {
            $advisor2 = 7;
        } else if ($advisor == 6) {
            $advisor2 = 6;
        } else if ($advisor == 27) {
            $advisor2 = 5;
        } else if ($advisor == 10) {
            $advisor2 = 11;
        } else if ($advisor == 24) {
            $advisor2 = 13;
        } else if ($advisor == 26) {
            $advisor2 = 10;
        } else if ($advisor == 12) {
            $advisor2 = 4;
        } else if ($advisor == 20) {
            $advisor2 = 4;
        } else if ($advisor == 13) {
            $advisor2 = 9;
        } else if ($advisor == 22) {
            $advisor2 = 2;
        } else if ($advisor == 25) {
            $advisor2 = 15;
        } else {
            $advisor2 = 4;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crm1342.targetreach.net/addNewLead_crm1342.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "name": "'.$user->name.'",
                "title": "user",
                "email": "'.$user->email.'",
                "phonenumber": "'.$user->phone.'",
                "company": "",
                "address": "",
                "city": "",
                "country_id": 194,
                "zip": "",
                "description": "user just registerd",
                "assigned": '.$advisor2.',
                "status": 2,
                "source": '.$source.',
                "dateadded": "'.$user->created_at.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return "ok";
    }

    public function sendUserToCRM2($user, $source) {
        $advisor = $user->user_id;
        if (is_null($advisor)) {
            $advisor2 = 4;
        }
        if ($advisor == 5) {
            $advisor2 = 7;
        } else if ($advisor == 6) {
            $advisor2 = 6;
        } else if ($advisor == 27) {
            $advisor2 = 5;
        } else if ($advisor == 10) {
            $advisor2 = 11;
        } else if ($advisor == 24) {
            $advisor2 = 13;
        } else if ($advisor == 26) {
            $advisor2 = 10;
        } else if ($advisor == 12) {
            $advisor2 = 4;
        } else if ($advisor == 20) {
            $advisor2 = 4;
        } else if ($advisor == 13) {
            $advisor2 = 9;
        } else if ($advisor == 22) {
            $advisor2 = 2;
        } else if ($advisor == 25) {
            $advisor2 = 15;
        } else {
            $advisor2 = 4;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crm1342.targetreach.net/addNewLead_crm1342.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "name": "'.$user->name.'",
                "title": "user",
                "email": "'.$user->email.'",
                "phonenumber": "'.$user->phone.'",
                "company": "",
                "address": "",
                "city": "",
                "country_id": 194,
                "zip": "",
                "description": "user just registerd",
                "assigned": '.$advisor2.',
                "status": 2,
                "source": '.$source.',
                "dateadded": "'.$user->created_at.'"
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return "ok";
    }

}
