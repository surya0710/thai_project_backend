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
                                            <label>Country</label>
                                            <select class="form-select" name="country" required @if($type === 'view') readonly @endif>
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option value="U.S" @if($user->country == 'U.S') selected @endif>U.S </option>
                                                <option value="Thailand" @if($user->country == 'Thailand') selected @endif>Thailand </option>
                                                <option value="India" @if($user->country == 'India') selected @endif>India </option>
                                                <option value="U.K" @if($user->country == 'U.K') selected @endif>U.K</option>
                                            </select>
                                        </div>
                                        <span class="error text-danger">
                                            @error('country')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Badge</label>
                                            <input class="form-control" type="text" placeholder="Badge" name="badge" 
                                            value="{{  old('badge', $user->badge)}}" required @if($type === 'view') readonly @endif>
                                        </div>
                                        <span class="error text-danger">
                                            @error('badge')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Revenue Generated</label>
                                            <input class="form-control" type="number" placeholder="Revenue Amount" name="revenue_generated" 
                                            value="{{  old('revenue_generated', $user->revenue_generated)}}" required @if($type === 'view') readonly @endif>
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
                                            <input class="form-control" type="number" placeholder="Total Amount" name="total_amount" 
                                            value="{{  old('total_amount', $user->total_amount)}}" required @if($type === 'view') readonly @endif>
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
                                            <input class="form-control" type="password" placeholder="Password" name="password" 
                                            value="{{  old('password')}}" required @if($type === 'view') readonly @endif>
                                        </div>
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