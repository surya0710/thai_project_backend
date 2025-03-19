@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Bank Details</h5>
    </div>
    <div class="app-content style-2">
        <div class="tf-container">
            <ul class="mt-24" style="height: 62vh;">
                @if(session()->has('success'))
                    <div class="alert alert-success mt-12">{!! session()->get('success') !!}</div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger mt-12">{!! session()->get('error') !!}</div>
                @endif
                @foreach($bankDetails as $bankDetail)
                <li class="list-task-item mt-12">
                    <input type="checkbox" id="task2" class="radio-check success">
                    <label for="task2" class="content-task">
                        <div class="body-4 fw-bold">{{ $bankDetail->bank_name ?? '' }}</div>
                        <p class="body-2 text-black-5">{{ $bankDetail->account_number ?? '' }} </p>
                    </label>
                </li>
                @endforeach
            </ul>
            <a href="{{ route('customer.bankDetails') }}" class="tf-btn primary">Add Address</a>
        </div>

    </div>
@include('customer.partials.footer')