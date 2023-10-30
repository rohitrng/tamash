<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\State;
use Illuminate\Support\Facades\Config;
use App\Models\Remark;

class RegistrationController extends Controller
{
    /**     
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */


    public function enquiryform()
    {   
        $data['states'] = State::get(["name", "id"]);
        $data['caste'] = DB::connection('dynamic')->table('caste_name')->get();
        $uid = DB::connection('dynamic')->table('inquiry_registration')->get()->last()->id;
        $data['all_inquiry'] = DB::connection('dynamic')->table('inquiry_registration')->where('status','p')->get();
        $data['Userid'] = $uid + 1;

        // $data['Remarks'] = Remark::get(["not_show", "No"]);
        $data['Remarks'] = DB::table('remarksmaster')->where('not_show','No')->get();
        return view('backend.inquiryregistration',$data);
    }

    public function schalars_all(){
        return view('backend.student_registrations.schalars_view');
    }
    public function Academics_all(){
        return view('backend.AcademicsModules.Academics_view');
    }
    public function Transport_all(){
        return view('backend.Transport.Transport_view');
    }
    public function Fees_all(){
        return view('backend.Fees-module.fees_view');
    }
}
