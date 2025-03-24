<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InviteCode;
use App\Models\User;
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
        $inviteCode->user_id = Auth::guard('admin')->user()->id;
        $inviteCode->created_by = Auth::guard('admin')->user()->id;
        if($inviteCode->save()){
            return redirect()->route('invitation.list')->with('success', 'Product added successfully');
        }
        else{
            return redirect()->route('invitation.list')->with('error', 'Something went wrong');
        }
        
    }

    public function invitationList(){
        $invitationList = InviteCode::where('status', '1')->orderBy('created_at', 'desc')->with(['user', 'usedBy'])->get();
        $users = User::whereIn('user_type', ['Boss', 'Manager'])->where('role', 'admin')->get();
        return view('admin.invitationList', compact('invitationList','users'));
    }

    public function checkInviteCode(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:invite_code',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $inviteCode = InviteCode::where('code', $request->code)->where('used_by', null)->where('status', '1')->first();
        if($inviteCode){
            return response()->json([
                'status' => 'success',
                'message' => 'success',
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => "Inviation code can't be used",
            ]);
        }
    }
}
