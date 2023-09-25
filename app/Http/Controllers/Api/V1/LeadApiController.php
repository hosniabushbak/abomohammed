<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\SendUserCRM;
use App\Mail\Mailer;
use App\Mail\UserMailer;
use App\Models\Client;
use App\Models\HeadSection;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadApiController extends Controller
{
    use SendUserCRM;
    public function savedata(Request $request){
        $secret_key = "8436AF7AA415B69F";
        if ($request->secretkey == $secret_key) {
            $headsection = HeadSection::latest()->first();
            $client = Client::where('email', $request->email)->with('eventheads')->first();
            $stopedadvisors = User::where('type', 1)->where('orders', 1)->pluck('id')->toArray();
            if ($client) {
                $registed = $client->eventheads()->where('head_section_id', $headsection->id)->get();
                if ($registed->count() == 0) {
//            $client->eventheads()->sync([3,2,1]);
                    $client->eventheads()->attach([$headsection->id]);//
                    if ($client->user_id == null) {
                        if ($request['user_id'] == null) {
                            $clients = Client::wherenotNull('user_id')->latest()->first();
                            if ($clients == null) {
                                $advisors = User::where('type', 1)->where('orders', 0)->first();
                                $request['user_id'] = $advisors->id;
                            } else {
                                $advisors = User::where('type', 1)->where('orders', 0)->where('id', '>', $clients->user_id)->orderBy('id')->first();
                                if ($advisors) {
                                    $request['user_id'] = $advisors->id;
                                } else {
                                    $advisors = User::where('type', 1)->where('orders', 0)->first();
                                    $request['user_id'] = $advisors->id;
                                }

                            }
                        } else {
                            $advisors = User::where('id', $request['user_id'])->first();
                        }
//                dd($request['user_id']);
                        $client->created_by_id = $advisors->id;
                        $client->user_id = $advisors->id;
                        $client->note = $request->note;
                        $client->is_webinar = $request->is_webinar;
                        $client->save();
                    } elseif (in_array($client->user_id, $stopedadvisors)) {
                        if ($request['user_id'] == null) {
                            $clients = Client::wherenotNull('user_id')->latest()->first();
                            if ($clients == null) {
                                $advisors = User::where('type', 1)->where('orders', 0)->first();
                                $request['user_id'] = $advisors->id;
                            } else {
                                $advisors = User::where('type', 1)->where('orders', 0)->where('id', '>', $clients->user_id)->orderBy('id')->first();
                                if ($advisors) {
                                    $request['user_id'] = $advisors->id;
                                } else {
                                    $advisors = User::where('type', 1)->where('orders', 0)->first();
                                    $request['user_id'] = $advisors->id;
                                }

                            }
                        } else {
                            $advisors = User::where('id', $request['user_id'])->first();
                        }
//                dd($request['user_id']);
                        $client->created_by_id = $advisors->id;
                        $client->user_id = $advisors->id;
                        $client->note = $request->note;
                        $client->is_webinar = $request->is_webinar;
                        $client->save();

                    }
                    $closed = $client->whereHas('clientClientEvents', function ($query) {
                        return $query->where('event_id', 6);
                    })->get();
                    if ($closed->count() == 0) {
                        $client->clientClientEvents()->delete();
                    }
//            dd($client->user_id);
                    $this->Maileme($client->user_id, $client->id,$headsection);
                    return response()->json([true, 'success', 200]);
                } else {
                    if ($client->clientAnswers->count() > 0) {
                        return response()->json([true, 'success', 200]);
                    } else
                        return response()->json([true, 'success', 200]);
                }
            }

            if ($client == null) {
                if ($request['user_id'] == null) {
                    $clients = Client::latest()->first();
                    if ($clients == null) {
                        $advisors = User::where('type', 1)->where('orders', 0)->first();
                        $request['user_id'] = $advisors->id;
                    } else {
                        $advisors = User::where('type', 1)->where('orders', 0)->where('id', '>', $clients->user_id)->orderBy('id')->first();
                        if ($advisors) {
                            $request['user_id'] = $advisors->id;
                        } else {
                            $advisors = User::where('type', 1)->where('orders', 0)->first();
                            $request['user_id'] = $advisors->id;
                        }

                    }
                } else {
                    $advisors = User::where('id', $request['user_id'])->first();
                }

                $request['created_by_id'] = $advisors->id;
                $client = Client::create($request->all());
                $client->eventheads()->sync([$headsection->id]);
                if ($client) {
                    $this->Maileme($advisors->id, $client->id,$headsection);
                }
                $message = Section::where('id', 3)->first();
            } else {
                $message = Section::where('id', 4)->first();
            }

//      target reach
            $this->sendUserToCRM($client, 7, $request['user_id']);

//        the rock api

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://hooks.zapier.com/hooks/catch/12973173/3t3z3yf/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('name' => $client->name, 'email' => $client->email, 'phone' => $client->phone, 'note' => $client->note),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

//        end rock api
            return response()->json([true, 'success', 200]);
        } else {
            return response()->json('not auth', false);
        }
    }

    public function Maileme($uid,$cid,$headsection){
        $advisors =User::where('id',$uid)->first();
        $client = Client::where('id',$cid)->first();
        $data=[
            'title'=>'عميل جديد في قائمتك',
            'name'=>$advisors->name,
            'advisorsphone'=>$advisors->phone,
            'clientname' => $client->name,
            'phone'=>$client->phone,
            'email'=>$client->email,
            'headsection' => $headsection,
        ];
        Mail::to($advisors->email)->send(new Mailer($data));
        Mail::to($client->email)->send(new UserMailer($data));
    }

}
