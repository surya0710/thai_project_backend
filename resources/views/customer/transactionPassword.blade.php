@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Change Transaction Password</h5>  
    </div> 
    <div class="app-content style-3 pb-32 signUp-area">
        <div class="tf-container">
            <form class="mt-24" method="post" id="password-change" action="{{ route('customer.transactionPasswordUpdate') }}" style="height: 58vh;">
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
                <div class="digit-group mt-35">
                    <input class="form-control" required type="password" id="digit-2" name="digit-2"
                        data-next="digit-3" data-previous="digit-1">
                    <input class="form-control" required type="password" id="digit-3" name="digit-3"
                        data-next="digit-4" data-previous="digit-2">
                    <input class="form-control" required type="password" id="digit-4" name="digit-4"
                        data-next="digit-5" data-previous="digit-3">
                    <input class="form-control" required type="password" id="digit-5" name="digit-5"
                        data-next="digit-6" data-previous="digit-4">
                </div>
            </form>
            <button class="mt-24 tf-btn primary" type="submit" form="password-change">Change Transaction Password</button>
            
        </div>
    </div>
@include('customer.partials.footer')