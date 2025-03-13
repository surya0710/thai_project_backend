@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h4>Bank Detail</h4>
    </div>

    <div class="app-content style-3 pb-32">
        <div class="tf-container">
            <div class="card mt-20">
                <div class="card-body">
                <form method="post" action="{{ route('customer.bankDetailsSubmit') }}">
                    @csrf

                    @if (session()->has('error'))
                        <span class="error text-danger text-center">
                            {{ session()->get('error') }}
                        </span>
                    @elseif (session()->has('success'))
                        <span class="error text-success text-center">
                            {{ session()->get('success') }}
                        </span>
                    @endif

                    <fieldset class="mt-20 input-line">
                        <label>Bank Name</label>
                        <input type="text" placeholder="Enter Bank Name" name="bank_name" class="form-control" required value="{{ $bankDetails->bank_name , old('bank_name') }}">
                        <span class="text-danger">
                            @error('bank_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </fieldset>

                    <fieldset class="mt-20 input-line">
                        <label>Bank Holder Name</label>
                        <input type="text" placeholder="Enter Bank Holder Name" name="account_holder_name" required class="form-control" value="{{ $bankDetails->account_holder_name , old('account_holder_name') }}">
                        <span class="text-danger">
                            @error('account_holder_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </fieldset>

                    <fieldset class="mt-26 input-line">
                        <label>Account Number</label>
                        <input type="text" placeholder="Enter Account Number" name="account_number" required class="form-control" value="{{ $bankDetails->account_number , old('account_number') }}">
                        <span class="text-danger">
                            @error('account_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </fieldset>

                    <fieldset class="mt-20 input-line">
                        <label>Branch Name</label>
                        <input type="text" placeholder="Enter Branch Name" class="form-control" name="branch_name" required value="{{ $bankDetails->bank_branch , old('bank_branch') }}">
                        <span class="text-danger">
                            @error('branch_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </fieldset>

                    <button type="submit" class="mt-20 tf-btn primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@include('customer.partials.footer')