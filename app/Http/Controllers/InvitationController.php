<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InviteCode;
use Illuminate\Support\Facades\Auth;


class InvitationController extends Controller
{
    public function storeInviteCode(Request $request){
        $validator = Validator::make($request->all(), [
            'invite_code' => 'required|unique:users,invite_code',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        
        $inviteCode = new InviteCode();
        $inviteCode->invite_code = $request->invite_code;
        $inviteCode->user_id = Auth::user()->id;
        $inviteCode->created_by = Auth::user()->id;
        if($inviteCode->save()){
            return redirect()->route('invitation.list')->with('success', 'Product added successfully');
        }
        
    }
}
