<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InviteCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InvitationController extends Controller
{
    public function storeInviteCode(Request $request){
        $validator = Validator::make($request->all(), [
            'invite_code' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }
        
        $inviteCode = new InviteCode();
        $inviteCode->code = $request->invite_code;
        $inviteCode->count = 1;
        $inviteCode->user_id = Auth::user()->id;
        $inviteCode->created_by = Auth::user()->id;
        if($inviteCode->save()){
            return redirect()->route('invitation.list')->with('success', 'Product added successfully');
        }
        else{
            return redirect()->route('invitation.list')->with('error', 'Something went wrong');
        }
        
    }

    public function invitationList(){
        $invitationList = InviteCode::where('status', '1')->orderBy('created_at', 'ASC')->with(['user', 'usedBy'])->get();
        return view('admin.invitationList')->with(['invitationList' => $invitationList, 'active' => 'invitationList']);
    }
}
