@include('admin.partials.header')
<div class="page-body-wrapper">
    <!-- Page Sidebar Ends-->
    @include('admin.partials.sidenav')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6 box-col-3">
                        <h3> User Edit</h3>
                    </div>
                    <div class="col-5 d-none"></div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="https://users.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Edit Users </li>
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
                            <form class="form theme-form" method="post" action="{{ route('user.update',['user_id' => $user->id]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input class="form-control" type="text" placeholder="Username" name="username" 
                                            value="{{ old('username', $user->username)}}" required readonly>
                                        </div>
                                        <span class="error text-danger">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="Name" name="name" 
                                            value="{{ old('name', $user->name) }}" required @if($type === 'view') readonly @endif>
                                        </div>
                                        <span class="error text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input class="form-control" type="tel" placeholder="Mobile No." name="phone" 
                                            value="{{  old('phone', $user->phone)}}" required readonly>
                                        </div>
                                        <span class="error text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input class="form-control" type="text" placeholder="Email Address" name="email" 
                                            value="{{ old('email', $user->email)}}" required readonly>
                                        </div>
                                        <span class="error text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Badge</label>
                                            <input class="form-control" type="text" placeholder="Badge" name="badge" 
                                            value="{{  $user->badge, old('badge') }}" required @if($type === 'view') readonly @endif>
                                        </div>
                                        <span class="error text-danger">
                                            @error('badge')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    @if($user->badge == 'admin')
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Lucky Draw Level</label>
                                            <input class="form-control" type="text" placeholder="Lucky Draw Level" name="lucky_draw" 
                                            value="" >
                                        </div>
                                        <span class="error text-danger"></span>
                                    </div>
                                    @endif
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Revenue Generated</label>
                                            <input class="form-control" type="number" step="0.01" placeholder="Revenue Amount" name="revenue_generated" 
                                            value="{{  old('revenue_generated', number_format($user->revenue_generated, 2, '.', ''))}}" required @if($type === 'view') readonly @endif>
                                        </div>
                                        <span class="error text-danger">
                                            @error('revenue_generated')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Total Amount</label>
                                            <input class="form-control" type="number" step="0.01" placeholder="Total Amount" name="total_amount" 
                                            value="{{ old('total_amount', number_format($user->total_amount, 2, '.', '')) }}" pattern="^\d+(\.\d{1,2})?$" required @if($type === 'view') readonly @endif>
                                        </div>
                                        <span class="error text-danger">
                                            @error('total_amount')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    @if($type === 'edit')
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input class="form-control" type="text" placeholder="Password" name="password" 
                                            value="{{ $user->display_password }}"  @if($type === 'view') readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Transaction PIN</label>
                                            <input class="form-control" type="text" placeholder="Transaction PIN" name="transaction_pin" 
                                            value="{{ $user->display_transaction_password }}" >
                                        </div>
                                        <span class="error text-danger"></span>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            @if($type === 'edit')
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            @endif
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
    @include('admin.partials.popup')