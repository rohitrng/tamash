<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    /**
     * redirect admin after login
     *
     * @return \Illuminate\View\View
     */
    public $useridsession;
    public function __construct(){
        $this->middleware(function ($request, $next) {
            $this->usernamesession = Auth::user()->username;
            $this->useridsession = Auth::user()->id;
            return $next($request);
        });
    }

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
                                ->where('session_username',$this->usernamesession)
                                ->get();
        $data['total_balance'] = DB::table('amount_info')
                        ->select('session_id', DB::raw('SUM(deposit_amount) as total_deposit_amount'))
                        ->where('session_id', $this->useridsession)->where('flag',1)
                        ->groupBy('session_id')
                        ->first();
        $data['total_withdraw'] = DB::table('amount_info')
                        ->select('session_id', DB::raw('SUM(withdraw_amount) as total_withdraw_amount'))
                        ->where('session_id', $this->useridsession)
                        ->groupBy('session_id')
                        ->first();

        // echo '<pre>';echo $this->useridsession;print_r($data['total_balance']);die();
        return view('backend.index',$data);
    }

    public function create_user_after_account(){
        $data = DB::table('paly_user')
                                ->select(['id','user_name', 'url_web', 'parent_user_image', 'create_at'])
                                ->where('delete_at', '0')
                                ->where('session_username',$this->usernamesession)
                                ->get();
        return $data;
    }

    public function account_create(Request $request){
        $rules = [
            'name' => 'required|unique:paly_user,user_name',
            // Add other validation rules as needed
        ];
    
        $messages = [
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            // Add custom messages for other rules as needed
        ];
    
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return json_encode(['error' => $validator->errors()]);
        }
    
        $username = DB::table('account')
            ->select('name', 'image_url', 'url_web')
            ->where('id', $request->id)
            ->first();
    
        $data = [
            'user_name' => $request->name,
            'session_username' => $this->usernamesession,
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
        ->where('user_id', $this->useridsession)
        ->groupBy('user_id')
        ->first();
        if ($check_bal) {

            if($check_bal->amount > $request->deposit_amount){
                $data = [
                    'deposit_amount' => $request->deposit_amount,
                    'sub_acount_id' => $request->sub_acount_id,
                    'session_id' => $this->useridsession,
                ];
        
                DB::table('amount_info')->insert($data);
                $message = ['message'=>'balance added success fully'];
            } else {
                $message = ['message'=>'insufficient balance'];
            }
        } else {
            $message = ['message' => 'User balance not found'];
        }
        return json_encode($message);
    }

    public function withdraw_info(Request $request){
        $check_bal = DB::table('user_walet')
                ->select('user_id', DB::raw('SUM(amount_wid) as amount'))
                ->where('user_id', $this->useridsession)
                ->groupBy('user_id')
                ->first();
        if ($check_bal) {

            if($check_bal->amount > $request->withdraw_amount){
                $data = [
                    'withdraw_amount' => $request->withdraw_amount,
                    'sub_acount_id' => $request->sub_acount_id,
                    'session_id' => $this->useridsession,
                ];
        
                DB::table('amount_info')->insert($data);
                $message = ['message'=>'balance added success fully'];
            } else {
                $message = ['message'=>'insufficient balance'];
            }
        } else {
            $message = ['message' => 'User balance not found'];
        }
        return json_encode($message);
    }

    public function password_change(Request $request){
        $check_user = DB::table('paly_user')
        ->select('id')
        ->where('id', $request->sub_acount_id)
        ->first();
        if ($check_user) {
            $data = [
                'user_password' => $request->passwordcon_amountuser,
            ];
            DB::table('paly_user')->where('id', $request->sub_acount_id)->update($data); 
            $message = ['message'=>'update success fully'];
        } else {
            $message = ['message'=>'user not match'];
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

    public function upi(Request $request){
       // Validate the request
        $request->validate([
            'amount' => 'required|numeric',
            'photo' => 'image|mimes:png,jpg,jpeg|max:2048', // Adjust file validation rules as needed
        ]);

        // Upload the file first
        $data = [];
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            if ($file->isValid()) {
                $uniqueIdentifier = uniqid(); // You can use uniqid(), time(), or any unique identifier method
                $extension = $file->getClientOriginalExtension();
                $randomFileName = $uniqueIdentifier . '.' . $extension;

                $filename = $randomFileName;
                $path = 'assets/session/' . $filename; // Relative path within the public folder
        
                if ($file->storeAs('public', $path)) {
                    $data['photo'] = $path;
                } else {
                    return redirect()->back()->with('error', 'Failed to upload the image.');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid image file.');
            }
        }

        // Insert data into the database
        $data['deposit_amount'] = $request->input('amount');
        $data['pay'] = $request->input('pay');
        $data['session_id'] = $this->useridsession;
        // Add other fields as needed

        DB::table('amount_info')->insert($data);

        return redirect()->back()->with('success', 'Data saved successfully');
   
    }
}