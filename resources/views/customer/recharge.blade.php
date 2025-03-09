@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
          <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Recharge</h5>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="card mt-20">
                <div class="card-body">
                    <form method="post" action="{{ route('customer.rechargeSubmit') }}" enctype="multipart/form-data">
                        @csrf
                        <span class="text-danger error">
                            @if (session()->has('error'))
                                {{ session()->get('error') }}
                            @endif
                        </span>
                        <span class="text-success error">
                            @if (session()->has('success'))
                                {{ session()->get('success') }}
                            @endif
                        </span>
                        <fieldset class="mt-26 input-line">
                            <label>Recharge Amount</label>
                            <input type="number" placeholder="0.00" name="amount" class="form-control" value="{{  old('amount')}}" required>
                        </fieldset>
                        <span class="text-danger error">
                            @if ($errors->has('amount'))
                                {{ $errors->first('amount') }}
                            @endif
                        </span>
                       
                        <fieldset class="mt-26 input-upload">
                            <span class="icon icon-upload2"></span>
                            <input type="file" class="upload-file" name="image" accept="image/*" required>
                        </fieldset>
                        <span class="text-danger error">
                            @if ($errors->has('image'))
                                {{ $errors->first('image') }}
                            @endif
                        </span>
                       
                        <button class="mt-20 tf-btn primary">Submit</button>
                    </form>
                </div>
            </div>   
        </div>
    </div>
@include('customer.partials.footer')