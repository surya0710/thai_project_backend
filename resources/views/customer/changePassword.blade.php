@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Change Password</h5>  
    </div> 
    <div class="app-content style-3 pb-32 signUp-area">
        <div class="tf-container">
            <form class="mt-24" method="post" id="password-change" action="{{ route('customer.passwordUpdate') }}" style="height: 58vh;">
                @csrf
                @if (session()->has('success')) 
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <fieldset class="mt-32 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" name="old_password" placeholder="Enter Old password" class="form-control password-field">
                    </div>
                    <span class="error text-danger">
                        @if($errors->has('old_password'))
                            {{ $errors->first('old_password') }}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="mt-32 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" name="password" placeholder="Enter New password" class="form-control password-field">
                        <div class="show-pass">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                    <span class="error text-danger">
                        @if($errors->has('password'))
                            {{ $errors->first('password') }}
                        @endif
                    </span>
                </fieldset>
                <fieldset class="mt-16 input-icon">
                    <div class="box-view-hide">
                        <span class="icon icon-lock"></span>
                        <input type="password" name="confirm_password" placeholder="Confirm New password" class="form-control password-field2">
                        <div class="show-pass2">
                            <span class="icon-pass icon-view"></span>
                            <span class="icon-pass icon-hide"></span>
                        </div>
                    </div>
                    <span class="error text-danger">
                        @if($errors->has('confirm_password'))
                            {{ $errors->first('confirm_password') }}
                        @endif
                    </span>
                </fieldset>
                <p class="body-6 text-black-5 mt-3">Please remember the password, if you forget the password, Please contact service</p>
            </form>
            <button class="mt-24 tf-btn primary" type="submit" form="password-change">Confirm New Password</button>
            
        </div>
    </div>
@include('customer.partials.footer')