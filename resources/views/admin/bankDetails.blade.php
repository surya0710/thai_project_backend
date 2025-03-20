@include('admin.partials.header')
<div class="page-body-wrapper">
    <!-- Page Sidebar Ends-->
    @include('admin.partials.sidenav')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6 box-col-3">
                        <h3> Bank Details</h3>
                    </div>
                    <div class="col-5 d-none"></div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="https://users.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Bank Details </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success mt-12">{!! session()->get('success') !!}</div>
                            @elseif(session()->has('error'))
                                <div class="alert alert-danger mt-12">{!! session()->get('error') !!}</div>
                            @endif
                            <form class="form theme-form" method="post" action="{{ route('user.updateBankDetails', ['user_id' => $userID]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Bank Name</label>
                                            <input class="form-control" type="text" placeholder="Bank name" name="bank_name" 
                                            value="{{ old('bank_name', $bankDetails->bank_name ?? '')}}" required>
                                        </div>
                                        <span class="error text-danger">
                                            @error('bank_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Account Holder Name</label>
                                            <input class="form-control" type="text" placeholder="Account Holder Name" name="account_holder_name" 
                                            value="{{ old('account_holder_name', $bankDetails->account_holder_name ?? '')}}" required>
                                        </div>
                                        <span class="error text-danger">
                                            @error('account_holder_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Account Number</label>
                                            <input class="form-control" type="text" placeholder="Account Number" name="account_number" 
                                            value="{{ old('account_number', $bankDetails->account_number ?? '')}}" required>
                                        </div>
                                        <span class="error text-danger">
                                            @error('account_number')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Branch Name</label>
                                            <input class="form-control" type="text" placeholder="Branch Name" name="bank_branch" 
                                            value="{{ old('bank_branch', $bankDetails->bank_branch ?? '')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <a class="btn btn-danger" href="{{ route('user.list') }}">Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
    @include('admin.partials.footer')