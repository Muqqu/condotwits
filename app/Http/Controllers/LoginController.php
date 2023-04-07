<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{UserModel};

class LoginController extends Controller
{
    protected function sign_up(Request $request){
        
        try{
            $validatedData = Validator::make($request->post(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password_confirmation' => 'required',
                'password' => 'required|min:8|same:password_confirmation',
            ]);
            if ($validatedData->fails()) {
                foreach ($validatedData->errors()->all() as $error) {
                    return response()->json([
                        'status' => 'FALSE',
                        'message' => $error
                    ]);
                }
            }

            $add_user = new UserModel();
            $add_user->first_name = $request->post('first_name');
            $add_user->last_name = $request->post('last_name');
            $add_user->email = $request->post('email');
            $add_user->password = $request->post('password');
            $process = $add_user->save();


            if($process == 1){
                return response()->json([
                    'status' => 'TRUE',
                    'message' => "Successfully sign-up"
                ]);
            }else{
                return response()->json(['status' => 'FALSE', 'message' => 'Something went wrong.']);
            }



        } catch (\Exception $e) {
            return response()->json(['status' => 'FALSE', 'message' => 'Something went wrong.']);
        } finally {
            
        }

        
    }
}
