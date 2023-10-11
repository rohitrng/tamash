<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;

class AdminController extends Controller
{
    /**
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {   
        // $comman_model->insertData('inquiry_registration',$insertArr);
        $data['accounts'] = DB::table('account')
                            ->select(['id','name', 'url_web', 'image_url'])
                            ->where('delete_at', '0')
                            ->get();
        $data['user_accounts'] = DB::table('paly_user')
                                ->select(['id','user_name', 'url_web', 'parent_user_image', 'create_at'])
                                ->where('delete_at', '0')
                                ->get();
        return view('backend.index',$data);
    }

    public function create_user_after_account(){
        $data = DB::table('paly_user')
                                ->select(['id','user_name', 'url_web', 'parent_user_image', 'create_at'])
                                ->where('delete_at', '0')
                                ->get();
        return $data;
    }

    public function account_create(Request $request){
        $username = DB::table('account')
                        ->select('name','image_url','url_web')
                        ->where('id', $request->id)
                        ->first();
    
        $data = [
            'user_name' => $request->name,
            'parent_user_name' => $request->id,
            'parent_user_name' => $username->name,
            'user_password' => $this->generateRandomPassword(6),
            'parent_user_image' => $username->image_url,
            'url_web' => $username->url_web,
        ];

        DB::table('paly_user')->insert($data);

        return json_encode($data);
    }

    public function deposit_info(Request $request){

        $check_bal = DB::table('user_walet')
        ->select('user_id', DB::raw('SUM(amount_dep) as amount'))
        ->where('user_id', $request->sub_acount_id)
        ->groupBy('user_id')
        ->first();
        
        if($check_bal->amount > $request->deposit_amount){
            $data = [
                'deposit_amount' => $request->deposit_amount,
                'sub_acount_id' => $request->sub_acount_id,
            ];
    
            DB::table('amount_info')->insert($data);
            $message = ['message'=>'balance added success fully'];
        } else {
            $message = ['message'=>'insufficient balance'];
        }
        
        return json_encode($message);
    }

    public function generateRandomPassword($length = 6){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $password;
    }
}