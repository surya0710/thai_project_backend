<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InviteCode;
use App\Models\Products;
use App\Models\Withdraw;
use App\Models\RechargeRequest;
class FilterController extends Controller
{
    public function adminFilter(Request $request) {

        $query = User::query();

        $filters = $request->except('_token');
        $filters['role'] = 'admin';
        $filters['is_deleted'] = 0;

        foreach ($filters as $field => $value) {
            if (!empty($value)) { // Ignore empty values
                $query->where($field, $value);
            }
        }

        $users = $query->get();


        return view('admin.adminList', compact('users', 'filters'));

    }

    public function userFilter(Request $request){

        $query = User::query();
        $filters = $request->except('_token');
        $filters['role'] = 'customer';
        $filters['is_deleted'] = 0;

        foreach ($filters as $field => $value) {
            if (!empty($value)) { // Ignore empty values
                $query->where($field, $value);
            }
        }

        $users = $query->get();

        return view('admin.userList', compact('users', 'filters'));
    }

    public function invitationFilter(Request $request){
        $query = InviteCode::query();
        $filters = $request->except('_token');

        foreach ($filters as $field => $value) {
            if (!empty($value)) { // Ignore empty values
                $query->where($field, $value);
            }
        }

        $invitationList = $query->get();
        $users = User::whereIn('user_type', ['Boss', 'Manager'])->where('role', 'admin')->get();

        return view('admin.invitationList', compact('invitationList','users', 'filters'));

    }

    public function lazadaFilter(Request $request){
        $query = Products::query();
        $filters = $request->except('_token');

        if (isset($filters['name']) && !empty($filters['name'])) {
            $query->where('name', $filters['name']);
        }

        if (isset($filters['price_start']) && isset($filters['price_end'])) {
            $query->whereBetween('price', [$filters['price_start'], $filters['price_end']]);
        }

        if (empty($filters['name']) && empty($filters['price_start']) && empty($filters['price_end'])) {
            return redirect()->route('lazada.list');
        }

        $products = $query->where('is_deleted', 0)->get();

        return view('admin.lazadaList', compact('products', 'filters'));
    }

    public function withdrawalFilter(Request $request)
    {
        $query = Withdraw::query();
        $filters = $request->except('_token');

        // Handle Username Filter
        if (!empty($filters['username'])) {
            $user = User::where('username', $filters['username'])->first();
            if ($user) {
                $query->where('user_id', $user->id);
            } else {
                // If no user is found, return empty result
                return view('admin.withdrawalList', [
                    'withdrawalList' => collect([]),
                    'users' => User::whereIn('user_type', ['Boss', 'Manager'])->where('role', 'admin')->get(),
                    'filters' => $filters,
                ]);
            }
        }

        // Apply Other Filters, including status = 0
        foreach ($filters as $field => $value) {
            if (isset($value) && $field !== 'username') {  // Use isset() to include status=0
                $query->where($field, $value);
            }
        }

        // Fetch Data
        $withdrawalList = $query->get();
        $users = User::whereIn('user_type', ['Boss', 'Manager'])->where('role', 'admin')->get();

        return view('admin.withdrawalList', compact('withdrawalList', 'users', 'filters'));
    }

    public function rechargeFilter(Request $request){
        $query = RechargeRequest::query();
        $filters = $request->except('_token');

        // Handle Username Filter
        if (!empty($filters['username'])) {
            $user = User::where('username', $filters['username'])->first();
            if ($user) {
                $query->where('user_id', $user->id);
            } else {
                // If no user is found, return empty result
                return view('admin.rechargeList', [
                    'rechargeList' => collect([]),
                    'users' => User::whereIn('user_type', ['Boss', 'Manager'])->where('role', 'admin')->get(),
                    'filters' => $filters,
                ]);
            }
        }

        // Apply Other Filters, including status = 0
        foreach ($filters as $field => $value) {
            if (isset($value) && $field !== 'username') {  // Use isset() to include status=0
                $query->where($field, $value);
            }
        }

        // Fetch Data
        $rechargeList = $query->get();
        $users = User::whereIn('user_type', ['Boss', 'Manager'])->where('role', 'admin')->get();

        return view('admin.rechargeList', compact('rechargeList', 'users', 'filters'));
    }
}
