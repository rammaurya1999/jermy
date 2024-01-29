<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Hash;
use App\Models\Customer;


class Api extends Controller
{
    public function register(Request $request){
        // echo "<pre>";print_r($request->all());die;
        
        try {
            $rules = [
                'email' => 'required|email:rfc,dns|unique:customers',
                'phone' => 'required',
                'password' => 'required',
                'account_type' => 'required',
                
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                // $errors = $validator->errors()->first('email');

                // return response()->json(['success' => 'false','message' => $errors,'data' => array()], 422);
               
                $errors = $validator->errors()->all();

                return response()->json(['success' => 'false','message' => implode(', ', $errors),'data' => array()], 422);
                // $errors = $validator->errors();

                //     $response = [
                //         'success' => 'false',
                //         // 'data' => array(),
                //     ];

                //     foreach ($errors->messages() as $field => $fieldErrors) {
                //         $response['errors'][] = [
                //             'field' => $field,
                //             'message' => $fieldErrors[0],
                //         ];
                //     }

                //     return response()->json($response, 422);
            }
            $user_name=explode('@',$request->email);
            // print_r($user_name);die;
            $table=new Customer;
            $table->email=$request->email;
            $table->phone=$request->phone;
            $table->username=$user_name[0];
            $table->password=Hash::make($request->password);
            $table->account_type=$request->account_type;
            $table->status=0;
            // echo "<pre>";print_r($table);die;
            $table->save();
            
            return response()->json(['success' => 'true', 'message' => 'User Register Successfully Done','data'=>$table], 201);
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => 'Internal Server Error'], 500);
        }
    }
    public function user_login(Request $request){
        // echo "<pre>";print_r($request->all());die;
        try {
            if($request->phone!=''){
                // echo 1;die;
                $cust_detail=Customer::where('phone',$request->phone);
                if($request->device_token==''){
                    return response()->json(['success' => 'false','message' => 'The device token field is required.','data' => array()], 422);
                }else if($cust_detail->count()>0){

                }else{
                    return response()->json(['success' => 'false','message' => 'Invalid Phone Number','data' => array()], 422);
                }
            }else{
                $rules = [
                    'email' => 'required',
                    'password' => 'required',
                    'device_token' => 'required',
                    
                ];
                $validator = Validator::make($request->all(), $rules);
                // echo "<pre>";print_r($validator);die;
                if ($validator->fails()) {
                    $errors = $validator->errors()->all();
                    return response()->json(['success' => 'false','message' => implode(', ', $errors),'data' => array()], 422);  
                }
                $cust_detail=Customer::where('email',$request->email)->orWhere('username',$request->email);
                // echo "<pre>";print_r($cust_detail);die;
                if($cust_detail->count()>0){
                    if(Hash::check($request->password, $cust_detail->first()->password)){
                        $login=Customer::find($cust_detail->first()->id);
                        $login->device_token=$request->device_token;
                        $login->save();
                        $data=Customer::find($cust_detail->first()->id);
                        $result=[
                            'email'=>$data->email,
                            'device_token'=>$data->device_token,
                            'phone'=>$data->phone,
                            'account_type'=>$data->account_type,
                        ];
                    }else {
                        return response()->json(['success' => 'false','message' => 'Invalid Password','data' => array()], 422);
                    }
                }else{
                    return response()->json(['success' => 'false','message' => 'Invalid Email','data' => array()], 422);
                }
            }
            return response()->json(['success' => 'true', 'message' => 'User Login Successfully Done','data'=>$result], 200);
        } catch (\Exception $e) {
            return response()->json(['success'=>'false','message' => 'Internal Server Error'], 500);
        }
    }
}
