<?php

namespace App\Http\Controllers;

use App\CorruptionInfo;
use App\JoinedMembers;
use App\Subscribers;
use Illuminate\Http\Request;

class ProcessFormsController extends Controller
{
    public function store_join_form(JoinedMembers $joinedMembers){


        $attributes = request()->validate([
            'joinForm_name' => ['required'],
            'joinForm_email' => ['required', 'unique:joined_members'],
            'joinForm_phone' => ['required'],
            'joinForm_region' => ['required'],
            'joinForm_additional_msg' => ['required'],
            'joinForm__HelpType' => ['required'],
        ]);

        $attributes['joinForm__HelpType'] = implode(",", request('joinForm__HelpType'));
        $attributes['joinForm_social_link'] = request('joinForm_social_link');
        session()->flash('message_joined', 'Ваші дані успішно надіслано!');

        $member = JoinedMembers::create($attributes);

        return back();
    }

    public function store_curroption_info_form(CorruptionInfo $curroptionInfo){

        $attributes = request()->validate([
            'corruptionForm_name' => ['required'],
            'corruptionForm_region' => ['required'],
            'corruptionForm_phone' => ['required'],
            'corruptionForm_situation' => ['required'],
            'corruptionForm_email' => ['required'],
            'corruptionForm_arguments' => ['required'],
            'corruptionForm_corruptName' => ['required'],
            'corruptionForm_files' => 'file|max:10240',
        ]);

//        request()->corruptionForm_files->store("public_path()", ['disk' => 'public_uploads']);
//        \Storage::disk('public_uploads')->put('filename', request()->corruptionForm_files);

        session()->flash('message_curroption', 'Ваші дані успішно надіслано!');

        $curroption_info = CorruptionInfo::create($attributes);

        return back();
    }

    public function store_subscribe_form(){
        $attributes = request()->validate([
            'subscribe_email' => ['required' , 'unique:subscribers'],
            'subscribe_name' => ['required']
        ]);
        session()->flash('message_subscribe', 'Ви успішно підписались на оновлення!');
        $subscribers = Subscribers::create($attributes);
        return back();
    }

    public function store_footer_subscribe_form(){
        $attributes = request()->validate([
            'subscribe_email' => ['required' , 'unique:subscribers'],
            'subscribe_name' => ['required']
        ]);
        session()->flash('message_footer_subscribe', 'Ви успішно підписались на оновлення!');
        $subscribers = Subscribers::create($attributes);
        return back();
    }

    public function store_donation_form(Request $request){
        if ($request->ajax()) {
            $text_to = 'Поддержка проекта "'. $request->id;

            $merchant_id = config('app.public_key');
            $signature = config('app.private_key');

            $liqpay = new LiqpayController($merchant_id, $signature);
            $forms = $liqpay->createForm($text_to);

            return response()->json(['forms'=>$forms]);
        }

    }

}
