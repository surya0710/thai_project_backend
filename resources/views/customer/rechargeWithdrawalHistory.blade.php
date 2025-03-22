@include('customer.partials.header')
<style>

.task-tab-1 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4px;
  position: relative;
  z-index: 1;
}

.task-tab-1 .nav-link {
  font-size: 12px;
  font-weight: 500;
  line-height: 16px;
  color: rgba(49, 57, 79, 0.6);
  padding: 12px 0px;
  text-align: center;
  border-radius: 12px;
  margin: 0;
}

.task-tab-1 .nav-link:hover,
.task-tab-1 .nav-link:focus {
  background-color: transparent;
  border-color: transparent;
  border-radius: 12px;
}

.task-tab-1 .nav-link.active {
  background-color: #fff;
  border-color: #fff;
  border-radius: 12px;
  color: #7980ff;
  font-weight: 700;
}

</style>
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Recharge and Withdraw Record</h5>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="mt-24">
                <div class="tab-slide wrapper-tab-task">
                    <ul class="nav nav-tabs task-tab-1" role="tablist">
                        <li class="item-slide-effect"></li>
                        <li class="nav-item active" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#allTask">Recharge
                                Record
                                Tasks</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#progress"> Withdraw
                                Record</button>
                        </li>

                    </ul>
                </div>
                <div class="tab-content">
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
                    <div class="tab-pane fade active show" id="allTask" role="tabpanel">
                        @foreach($rechargeRequests as $recharge)
                        <ul class="mt-20">
                            <li class="mt-16 pb-8 line-bt2">
                                <div class="flex-grow-1 p-10">
                                    <div class="d-flex justify-content-around">
                                        <div class="sub">ID: {{ $loop->index + 1 }}</div>
                                        <div class="sub">Amount {{ $recharge->amount }}</div>
                                    </div>
                                    <div class="d-flex justify-content-around mt-16">
                                        <div class="sub">{{ \Carbon\Carbon::parse($recharge->created_at)->format('d-m-Y H:i') }}</div>
                                        <div class="text-right tag-status type-1">
                                            @if($recharge->status === 0) Pending
                                            @elseif($recharge->status === 1) Approved 
                                            @elseif($recharge->status === 2) Rejected 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="progress" role="tabpanel">
                        @foreach($withdrawals as $withdraw)
                        <ul class="mt-20">
                            <li class="mt-16 pb-8 line-bt2">
                                <div class="flex-grow-1 p-10">
                                    <div class="d-flex justify-content-around">
                                        <div class="sub">ID: {{ $loop->index + 1 }}</div>
                                        <div class="sub">Amount {{ $withdraw->amount }}</div>
                                    </div>
                                    <div class="d-flex justify-content-around mt-16">
                                        <div class="sub ">{{ \Carbon\Carbon::parse($withdraw->created_at)->format('d-m-Y H:i') }}</div>
                                        <div class="text-right tag-status type-1">
                                            @if($withdraw->status === 0) Pending
                                            @elseif($withdraw->status === 1) Approved 
                                            @elseif($withdraw->status === 2) Rejected 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@include('customer.partials.footer')