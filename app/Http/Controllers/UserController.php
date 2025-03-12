<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\RechargeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $User = User::where('username', $request->username)->where('user_type', 'Customer')->first();

        if($User == null){
            return redirect('/')->with(['error' => 'User does not exist']);
        };

        if($User->is_deleted == 1 || $User->is_blocked == 1){
            return redirect('/')->with(['error' => 'Account either deleted or blocked']);
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->role === 'customer') {
                return redirect()->route('customer.dashboard');
            }
            else{
                return redirect('/')->with('error', 'Invalid username or password');
            }
        } else {
            return redirect('/')->with('error', 'Invalid username or password');
        }
    }

    public function adminList(){
        $users = User::where('role', '!=','Customer')->where('is_deleted', '0')->orderBy('is_blocked', 'desc')->orderBy('created_at', 'desc')->get();
        return view('admin.adminList')->with(['users' => $users, 'active' => 'User Management']);
    }
    public function adminAdd(){
        return view('admin.adminAdd')->with(['active' => 'User Management']);
    }

    public function adminStore(Request $request){
        $validator = Validator::make(request()->all(), [
            'user_type' => 'required|in:Boss,Manager,Worker',
            'username' => 'required',
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required',
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->uuid = uniqid();
        $user->user_type = $request->user_type;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->role = 'admin';
        $user->created_at = now();

        if($user->save()){
            return redirect()->route('admin.list')->with('success', 'Admin added successfully');
        }
        else{
            return redirect()->route('admin.add')->with('error', 'Something went wrong');
        }
    }

    public function adminEdit(Request $request, $userID){
        $user = User::find($userID);
        return view('admin.adminEdit')->with(['user'=> $user, 'active'=> 'User Management']);
    }

    public function adminUpdate(Request $request, $userID){
        $validator = Validator::make($request->all(), [
            'user_type' => 'required|in:Boss,Manager,Worker',
            'username' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($userID);
        $user->user_type = $request->user_type;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password !== ''){
            $user->password = bcrypt($request->password);
        }

        if($user->update()){
            return redirect()->route('admin.list')->with('success', 'Admin added edited');
        }
        else{
            return redirect()->route('admin.edit')->with('error', 'Something went wrong');
        }
    }

    public function adminDelete(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:users,id'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $id = $request->input('id');
        $user = User::find($id);

        

        if($user->user_type == 'Boss'){
            return response()->json([
                'status' => 'failed',
                'message' => "You cannot delete Boss User"
            ], 401);
        }

        if($user->role == 'Customer'){
            return response()->json([
                'status' => 'failed',
                'message' => "Can't delete this User"
            ], 401);
        }

        $user->is_deleted = 1;
        $user->deleted_by = Auth::user()->id;

        if($user->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully'
            ], 200);
        }
        
        return response()->json([
            'status' => 'Failed',
            'message' => 'Something Went Wrong'
        ], 500);
    }

    public function userList(){
        $users = User::where('user_type', 'Customer')->with('lastLogin')->get();
        return view('admin.userList')->with(['users' => $users, 'active' => 'userList']);
    }
    public function userEdit(){
        $users = User::where('user_type', 'Customer')->with('lastLogin')->get();
        return view('admin.userEdit')->with(['users' => $users, 'active' => 'userEdit']);
    }
    public function invitationList(){
        $users = User::where('user_type', 'Customer')->with('lastLogin')->get();
        return view('admin.invitationList')->with(['users' => $users, 'active' => 'invitationList']);
    }

    public function userUpdateCreditPermission(Request $request, $userID){
        $validator = Validator::make($request->all(), [
            'credit_permission' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $user = User::find($userID);

        $user->credit_permission = $request->credit_permission;

        if($user->update()){
            return response()->json([
                'status' => 'success',
                'message' => 'Credit Permission Changed'
            ]);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }

    }

    public function userDelete(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:users,id'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $id = $request->input('id');
        $user = User::find($id);

        if($user->user_type == 'Boss'){
            return response()->json([
                'status' => 'failed',
                'message' => "You cannot delete Boss User"
            ], 401);
        }

        $user->is_deleted = 1;
        $user->deleted_by = Auth::user()->id;

        if($user->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully'
            ], 200);
        }
        
        return response()->json([
            'status' => 'Failed',
            'message' => 'Something Went Wrong'
        ], 500);
    }

    public function lazadaList(){
        $products = Products::all();
        return view('admin.lazadaList')->with(['products' => $products, 'active' => 'lazadaList']);
    }

    public function lazadaAdd(){
        return view('admin.lazadaAdd')->with(['active' => 'lazadaAdd']);
    }

    public function lazadaStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'url' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $image = $request->file('image');
            $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $imageName);

            // Create the product
            $product = new Products();
            $product->fill([
                'name' => $request->name,
                'url' => $request->url,
                'price' => $request->price,
                'description' => $request->description,
                'image_path' => $imageName,
            ]);
            $product->created_at = now();
            $product->save();

            return redirect()->route('lazada.list')->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            return redirect()->route('lazada.add')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function rechargeList(){
        $rechargeList = RechargeRequest::with('user:id,username,phone,name,invitation_code', 'approver:id,username,name')
        ->orderBy('status', 'ASC')
        ->orderBy('created_at', 'ASC')
        ->get();
        return view('admin.rechargeList')->with(['rechargeList' => $rechargeList, 'active' => 'rechargeList']);
    }
    public function rechargeEdit(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.rechargeEdit')->with(['users' => $users, 'active' => 'rechargeEdit']);
    }
    public function withdrawalList(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.withdrawalList')->with(['users' => $users, 'active' => 'withdrawalList']);
    }
    public function Profile(){
        $users = User::where('user_type', 'Customer')->get();
        return view('admin.Profile')->with(['users' => $users, 'active' => 'Profile']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
