@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Personal Data</h5>
        
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="box-profile">
                <div class="avatar avt-100">
                    <img src="{{ asset('assets/images/avt/avt1.jpg') }}" alt="img">
                    <span class="icon" data-bs-target="#filterProfile" data-bs-toggle="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10" viewBox="0 0 13 10" fill="none">
                            <path
                                d="M11.0525 1.66371H9.27168V1.48075C9.27168 0.663377 8.6083 0 7.79093 0H4.95875C4.14104 0 3.47799 0.663377 3.47799 1.48075V1.66371H1.69682C0.879112 1.66371 0.216064 2.32675 0.216064 3.14446V8.51926C0.216064 9.33663 0.879112 10 1.69682 10H11.0532C11.8709 10 12.5339 9.33663 12.5339 8.51926V3.14446C12.5333 2.32642 11.8702 1.66371 11.0525 1.66371ZM6.37434 8.46397C4.83173 8.46397 3.57737 7.20961 3.57737 5.667C3.57737 4.12471 4.83173 2.87002 6.37434 2.87002C7.91696 2.87002 9.17132 4.12439 9.17132 5.667C9.17132 7.20961 7.91663 8.46397 6.37434 8.46397ZM7.8551 5.667C7.8551 6.48273 7.1904 7.14775 6.37434 7.14775C5.55829 7.14775 4.89359 6.48273 4.89359 5.667C4.89359 4.85094 5.55829 4.18625 6.37434 4.18625C7.1904 4.18625 7.8551 4.85094 7.8551 5.667Z"
                                fill="white" />
                        </svg>
                    </span>
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
                        <label>Telegarm</label>
                        <input type="text" placeholder="Enter your Telegarm" name="telegram_id" value="{{ $user->telegram_id ?? old('telegram_id') }}" class="form-control">
                    </fieldset>
                    <fieldset class="mt-20 input-line">
                        <label>Mailbox</label>
                        <input type="email" placeholder="Enter your email" name="email" value="{{ $user->email ?? old('email') }}" class="form-control password-field4">
                    </fieldset>
                   
            
                    <button type="submit" class="mt-20 tf-btn primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@include('customer.partials.footer')