<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\RechargeRequest;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use App\Jobs\DownloadImageJob;


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
    public function userEdit($userID){
        $user = User::find($userID);
        return view('admin.userEdit')->with(['user' => $user, 'type' => 'edit' , 'active' => 'userEdit']);
    }

    public function userUpdate(Request $request, $userID){
        $FormData = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'country' => 'required|string',
            'badge' => 'required|string',
            'revenue_generated' => 'required',
            'total_amount' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($userID);
        $user->name = $request->name;
        $user->country = $request->country;
        $user->badge = $request->badge;
        $user->revenue_generated = $request->revenue_generated;
        $user->total_amount = $request->total_amount;
        if($request->password !== ''){
            $user->password = bcrypt($request->password);
        }

        if($user->update()){
            return redirect()->route('user.list')->with('success', 'User Updated Successfully');
        }
        else{
            return redirect()->route('user.edit')->with('error', 'Something went wrong');
        }
    }

    public function userView($userID){
        $user = User::find($userID);
        return view('admin.userEdit')->with(['user' => $user, 'type' => 'view', 'active' => 'userEdit']);
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
        $products = $products = Products::paginate(10);;
        return view('admin.lazadaList', compact('products'));
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

    public function rechargeStatusUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:recharge_request,id',
            'event' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $id = $request->input('id');
        $event = $request->input('event');

        $recharge = RechargeRequest::find($id);

        if($event == 'approve'){
            $recharge->status = 1;
        }
        else if($event == 'reject'){
            $recharge->status = 2;
        }
        $recharge->handled_by = Auth::user()->id;

        if($recharge->save()){
            if($event == 'approve'){
                $user = User::find($recharge->user_id);
                $user->total_amount = $user->total_amount + $recharge->amount;
                $user->save();
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Recharge status updated successfully'
            ], 200);
        }
        
        return response()->json([
            'status' => 'Failed',
            'message' => 'Something Went Wrong'
        ], 500);
    }

    public function withdrawalList(){
        $withdrawalList = Withdraw::with('user', 'handledBy', 'bankDetails')->orderBy('status', 'ASC')->orderBy('created_at', 'ASC')->get();
        return view('admin.withdrawalList')->with(['withdrawalList' => $withdrawalList, 'active' => 'withdrawalList']);
    }

    public function withdrawalStatusUpdate(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:withdraw,id',
            'event' => 'required|string',
            'amount' => 'required|numeric|min:1',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $id = $request->input('id');
        $event = $request->input('event');
        $amount = $request->input('amount');

        $withdraw = Withdraw::find($id);

        if($event == 'approve'){
            $withdraw->status = 1;
        }
        else if($event == 'reject'){
            $withdraw->status = 2;
        }
        $withdraw->handled_by = Auth::user()->id;

        if($withdraw->save()){
            if($event == 'approve'){
                $user = User::find($withdraw->user_id);
                $user->total_amount = $user->total_amount - $amount;
                $user->updated_at = now();
                $user->save();
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Withdrawal status updated successfully'
            ], 200);
        }
        
        return response()->json([
            'status' => 'Failed',
            'message' => 'Something Went Wrong'
        ], 500);
    }
    public function withdrawalEdit($withdrawal_id){
        $withdrawal= Withdraw::with('user', 'handledBy', 'bankDetails')->where('id', $withdrawal_id)->first();
        return view('admin.withdrawalEdit')->with(['withdrawal' => $withdrawal, 'active' => 'withdrawalEdit']);
    }
    public function Profile(){
        $users = User::with('loginHistory')->find(Auth::id()); 
        return view('admin.Profile')->with(['user' => $users, 'active' => 'Profile']);
    }

    public function ProfileUpdate(Request $request, $userID){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($userID);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password !== ''){
            $user->password = bcrypt($request->password);
        }
        if($user->save()){
            return redirect()->back()->with('success', 'Profile Updated Successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');

    }

    public function blockUser(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::where('id', $request->id)->where('user_type', 'Customer')->first();

        if($user){
            $user->is_blocked = 1;
            $user->blocked_by = Auth::user()->id;
            if($user->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'User Blocked Successfully'
                ]);
            }
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'User not found'
            ]);
        }
    }

    public function unblockUser(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::where('id', $request->id)->where('user_type', 'Customer')->first();

        if($user){
            $user->is_blocked = 0;
            $user->blocked_by = Auth::user()->id;
            if($user->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'User Blocked Successfully'
                ]);
            }
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'User not found'
            ]);
        }
    }

    public function uploadProducts(Request $request){
        set_time_limit(600);
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048'
        ]);

        $file = $request->file('csv_file');
        $data = array_map('str_getcsv', file($file->getPathname()));

        if (count($data) < 2) {
            return back()->with('error', 'CSV file is empty or invalid.');
        }

        // Process headers
        $headers = array_map(fn($h) => trim(strtolower($h)), $data[0]);
        $headers[0] = preg_replace('/^\x{FEFF}/u', '', $headers[0]); // Remove BOM

        unset($data[0]); // Remove header row

        foreach ($data as $row) {
            $rowData = @array_combine($headers, $row);

            if (!$rowData || !isset($rowData['name'], $rowData['price'], $rowData['image'])) {
                continue; // Skip invalid rows
            }

            // Save product to database
            $product = Products::create([
                'name'  => $rowData['name'],
                'url'   => preg_replace('/\s+/', '-', preg_replace('/\.{2,}/', '', $rowData['name'])),
                'price' => (float) ($rowData['price'] ?? 0),
                'image_path' => null, // Image will be updated asynchronously
                'description' => '',
                'product_type' => 'lazada',
            ]);

            // Dispatch image download job
            if (!empty($rowData['image'])) {
                DownloadImageJob::dispatch($rowData['image'], $product->id);
            }
        }
        return back()->with('success', 'CSV data saved to database successfully!');

    }

    private function downloadImage($url)
    {
        try {
            $imageContents = Http::get($url)->body(); // Fetch image content
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $filename = Str::uuid() . '.' . $extension;
            $folderPath = public_path('uploads/products');

            // Ensure directory exists
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true, true);
            }

            $filePath = $folderPath . '/' . $filename;
            file_put_contents($filePath, $imageContents); // Save image

            return 'uploads/products/' . $filename; // Save relative path in DB
        } catch (\Exception $e) {
            return null; // Return null if download fails
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
