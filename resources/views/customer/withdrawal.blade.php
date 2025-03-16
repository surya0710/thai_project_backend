@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
          <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Withdraw</h5>
        
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="card mt-20">
                <div class="card-body">
                    <form method="post" id="withdrawal-form">
                        @if(session()->has('success'))
                            <span class="alert alert-success">
                                {{ session()->get('success') }}
                            </span>
                        @elseif(session()->has('error'))
                            <span class="alert alert-danger">
                                {{ session()->get('error') }}
                            </span>
                        @endif
                        <fieldset class="mt-20 input-line">
                            <label>Withdraw Amount</label>
                            <input type="number" name="amount" required min="1" max="{{ Auth::guard('customer')->user()->total_amount - Auth::guard('customer')->user()->frozen_amount }}" 
                            placeholder="Enter withdraw amount" class="form-control" value="{{ old('amount') ?? 1.00}}" step="0.01">
                            <span class="text-danger error">
                                @error('amount')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                        <div class="withdraw-para">
                            <div class="desc-p">Balance <span>{{ Auth::guard('customer')->user()->total_amount - Auth::guard('customer')->user()->frozen_amount }}</span> USD</div>
                        </div>
                        <fieldset class="mt-20 input-line">
                            <label>Bank Info</label>
                            <input type="text" placeholder="" class="form-control" name="account_number" value="{{ $bankDetails->account_number ?? '' }}" readonly>
                            <span class="text-danger error">
                                @error('account_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                        <fieldset class="mt-20 input-line">
                            <label>Password</label>
                            <div class="box-view-hide">
                                <input type="password" name="password" placeholder="Enter your password" class="form-control password-field4">
                                <span class="show-pass4">
                                    <i class="icon-pass icon-view"></i>
                                    <i class="icon-pass icon-hide"></i>
                                </span>
                            </div>
                            <span class="text-danger error">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                        <div class="withdraw-para mt-3">
                            <div class="desc-p">* Please check the collection information carefully.</div>
                            <div class="desc-p">* Withdrawals are available 24/7. However, the credited amount will be processed and reflected in your account the next day.
                            </div>
                        </div>
                        @if(isset($bankDetails->account_number))
                        <button type="button" class="mt-20 tf-btn primary" disabled data-bs-target="#modalLong"
                        data-bs-toggle="modal">Withdraw Immediately</button>
                        @else
                        <a class="mt-20 tf-btn primary" href="{{ route('customer.bankDetails') }}">Add Bank Account</a>
                        @endif
                    </form>
                </div>
            </div>   
        </div>
    </div>
@include('customer.partials.footer')
<div class="modal fade" id="modalLong">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-16">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fw-6">Verify Code</h4>
            </div>
            <div class="modal-body">
                <div class="style-3">
                    <div class="tf-container">
                        <p class="mt-24 body-6 text-black-5">Please enter your transaction password</p>
                        <form method="post" id="pin-form" action="{{ route('customer.withdrawalSubmit') }}">
                            @csrf
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
                            <button type="submit" class="mt-60 tf-btn primary">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        $(document).ready(function () {
            function validateForm() {
                let amount = parseFloat($("input[name='amount']").val());
                let maxAmount = parseFloat($("input[name='amount']").attr("max"));
                let password = $("input[name='password']").val().trim();
                let withdrawButton = $("button[type='button']");

                if (!isNaN(amount) && amount > 0 && amount <= maxAmount && password.length > 0) {
                    withdrawButton.prop("disabled", false);
                } else {
                    withdrawButton.prop("disabled", true);
                }
            }

            // Listen for input changes
            $("input[name='amount'], input[name='password']").on("input", validateForm);
        });

        $("#pin-form").on("submit", function (e) {

            let form1Data = $("#withdrawal-form").serializeArray();

            $.each(form1Data, function (i, field) {
                $("<input>").attr({
                    type: "hidden",
                    name: field.name,
                    value: field.value
                }).appendTo("#pin-form");
            });
        });
    });
</script>