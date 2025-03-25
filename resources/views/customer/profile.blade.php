@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Personal Data</h5>
        
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="box-profile">
                <div class="avatar avt-100">
                    <img src="{{ asset('assets/images/avt/avt1.jpg') }}" alt="img">
                </div>
            </div>
    
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('profile.store') }}" method="post">
                    @csrf
                    <fieldset class="mt-20 input-line">
                        <label> Account</label>
                        <input type="text" placeholder="Enter username" name="username" value="{{ $user->username ?? old('username') }}" class="form-control">
                    </fieldset>
                  
                    <fieldset class="mt-20 input-line">
                        <label>Phone Number | Email Address</label>
                        <input type="email" placeholder="Enter your email" name="email" value="{{ $user->email ?? old('email') }}" class="form-control password-field4">
                    </fieldset>
                   
            
                    <button type="submit" class="mt-20 tf-btn primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@include('customer.partials.footer')