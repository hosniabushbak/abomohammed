<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\SendUserCRM;
use App\Mail\Mailer;
use App\Mail\UserMailer;
use App\Models\Answer;
use App\Models\Client;
use App\Models\HeadSection;
use App\Models\Question;
use App\Models\Section;
use App\Models\ServiceProvider;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use  App\Models\User;
use Illuminate\Support\Facades\Mail;

class LandingPageController extends Controller
{
    use SendUserCRM;

    public function index(Request $request){
        if ($request->get('provider')){
            $provider =  ServiceProvider::where('slug','like','%'.$request->get('provider').'%')->first();
            $providerid = $provider->id;
                }else
            $providerid = null;

        if ($request->get('username')){
        $user = User::where('username','like','%'.$request->get('username').'%')->first();
            $userid = $user->id;
        }else
            $userid = null;
        $headSection = HeadSection::latest()->first();
        $aboutSection = Section::where('id',1)->first();
        $trainerSection = Section::where('id',2)->first();
        $testiMonials = Testimonial::get();
        $thecorseisstart=Section::where('id',6)->first();
        return view('FrontEnd.index',compact('thecorseisstart','userid','providerid','headSection','aboutSection','trainerSection','testiMonials'));
    }
    public function savedata(Request $request){

        $this->validate($request,[
            'g-recaptcha-response'=>'required|recaptcha',
        ]);

        $headsection = HeadSection::latest()->first();
        $client = Client::where('email',$request->email)->with('eventheads')->first();
        $stopedadvisors = User::where('type',1)->where('orders',1)->pluck('id')->toArray();
        if($client){
            $registed = $client->eventheads()->where('head_section_id',$headsection->id)->get();
            if($registed->count() == 0){
//            $client->eventheads()->sync([3,2,1]);
            $client->eventheads()->attach([$headsection->id]);//
            if ($client->user_id == null){
                if ($request['user_id'] == null){
                    $clients = Client::wherenotNull('user_id')->latest()->first();
                    if($clients == null) {
                        $advisors = User::where('type',1)->where('orders',0)->first();
                        $request['user_id'] = $advisors->id;
                    }else {
                        $advisors = User::where('type',1)->where('orders',0)->where('id','>',$clients->user_id)->orderBy('id')->first();
                        if ($advisors) {
                            $request['user_id'] = $advisors->id;
                        }else {
                            $advisors = User::where('type', 1)->where('orders',0)->first();
                            $request['user_id'] = $advisors->id;
                        }

                    }
                }else{
                    $advisors = User::where('id',$request['user_id'])->first();
                }
//                dd($request['user_id']);
                $client->created_by_id = $advisors->id;
                $client->user_id =$advisors->id;
                $client->note = $request->note;
            $client->save();
            }elseif(in_array($client->user_id, $stopedadvisors)){
                if ($request['user_id'] == null){
                    $clients = Client::wherenotNull('user_id')->latest()->first();
                    if($clients == null) {
                        $advisors = User::where('type',1)->where('orders',0)->first();
                        $request['user_id'] = $advisors->id;
                    }else {
                        $advisors = User::where('type',1)->where('orders',0)->where('id','>',$clients->user_id)->orderBy('id')->first();
                        if ($advisors) {
                            $request['user_id'] = $advisors->id;
                        }else {
                            $advisors = User::where('type', 1)->where('orders',0)->first();
                            $request['user_id'] = $advisors->id;
                        }

                    }
                }else{
                    $advisors = User::where('id',$request['user_id'])->first();
                }
//                dd($request['user_id']);
                $client->created_by_id = $advisors->id;
                $client->user_id =$advisors->id;
                $client->note = $request->note;
                $client->save();

            }
            $closed = $client->whereHas('clientClientEvents', function ($query) {
                return $query->where('event_id',6);
            })->get();
            if ($closed->count() == 0){
                $client->clientClientEvents()->delete();
            }
//            dd($client->user_id);
                $this->Maileme($client->user_id,$client->id, $headsection);
                return redirect('resulte/9/'.$client->id);
            }else{
            if ($client->clientAnswers->count() > 0){
            return redirect('resulte/4/'.$client->id);
        }else
            return redirect('resulte/5/'.$client->id);
        }
        }

        if($client == null){
        if ($request['user_id'] == null){
        $clients = Client::latest()->first();
        if($clients == null) {
            $advisors = User::where('type',1)->where('orders',0)->first();
            $request['user_id'] = $advisors->id;
        }else {
            $advisors = User::where('type',1)->where('orders',0)->where('id','>',$clients->user_id)->orderBy('id')->first();
            if ($advisors) {
                $request['user_id'] = $advisors->id;
            }else {
                $advisors = User::where('type', 1)->where('orders',0)->first();
                $request['user_id'] = $advisors->id;
            }

        }
        }else{
            $advisors = User::where('id',$request['user_id'])->first();
        }

            $request['created_by_id'] = $advisors->id;
            $client = Client::create($request->all());
            $client->eventheads()->sync([$headsection->id]);
            if ($client){
                $this->Maileme($advisors->id,$client->id, $headsection);
            }
        $message = Section::where('id',3)->first();
        }else{
            $message = Section::where('id',4)->first();
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
            CURLOPT_POSTFIELDS => array('name' => $client->name,'email' => $client->email,'phone' => $client->phone,'note' => $client->note),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

//        end rock api


        return redirect('resulte/'.$message->id.'/'.$client->id);
    }

    public function showResulte($msgid,$id){
        $msg = Section::where('id',$msgid)->first();
        if (!$msg)
            $msg = Section::where('id',4)->first();

        $question_title = Section::where('id',5)->first();

        $questions = Question::get();
        return view('FrontEnd.thanks-page',compact('msg','id','questions','question_title'));
    }

    public function saveanswer(Request $request){

        $answers = $request->answer;
        foreach($answers as $answer){
            $saveanswer = new Answer;
            $saveanswer->question_id = $request->question_id;
            $saveanswer->client_id = $request->client_id;
            $saveanswer->answer = $answer;
            $saveanswer->save();

        }
        return redirect('resulte/7/'.$saveanswer->id);


    }


    public function showEmailForm($email){
        $msg = Section::where('id',8)->first();
        if (!$msg)
            $msg = Section::where('id',4)->first();

        $client = Client::where('email',$email)->first();
        $headSection = HeadSection::first();



        return view('FrontEnd.thanks-page',compact('msg','client','headSection'));
    }

    public function updatePhone(Request $request){
        $client = Client::where('id',$request->id)->first();
        $client->phone = $request->phone;
        if($client->save()){
            $data=[
                'title'=>'عميل جديد في قائمتك',
                'name'=>$client->user->name,
                'advisorsphone'=>$client->user->phone,
                'clientname' => $client->name,
                'phone'=>$client->phone,
                'email'=>$client->email
            ];
            Mail::to($client->user->email)->send(new Mailer($data));

            if ($client->clientAnswers->count() > 0)
                return redirect('resulte/7/'.$client->id);
            else
                return redirect('resulte/5/'.$client->id);

        }


    }

    public function Maileme($uid,$cid, $headsection){
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
