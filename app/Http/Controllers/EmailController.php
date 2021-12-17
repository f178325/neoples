<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class EmailController extends Controller
{
    public function create(Request $request){
        $rules = [
			'email' => 'required|string|email|max:255'
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$user = new Email();
				$user->email = $data['email'];
				$user->save();
				return redirect()->back()->with('status',"Your email has been saved");
			}
			catch(\Exception $e){
				return redirect()->back()->with('failed',"Unexpected error");
			}
		}
    }
}