@include('customer.partials.header')
<div class="app-content">
        <div class="tf-container">

            <div class="mt-14 content-message">
                <ul class="mt-24">
                    <li>
                        <a href="" class="wd-file-message ">
                            <div class="avatar avt-32 avt-status">
                                <img src="{{ asset('assets/images/logo/paytm logo.jpg') }}" alt="avatar">
                                <!-- <span class="status"></span> -->
                            </div>
                            <span class="body-4 text-black-5 fw-5">CURRENT LEVEL VIP0</span>
                        </a>
                    </li>
                    <li class="mt-20 ">
                        <a href="" class="wd-file-message line-bt">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Available Balance</div>
                            <span class="body-4 text-black-5 fw-5">{{ $userData->total_amount }} USD</span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Historical Commission</div>
                            <span class="body-4 text-black-5 fw-5">{{  $userData->revenue_generated }} </span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Today</div>
                            <span class="body-4 text-black-5 fw-5">{{ $todayEarned }} USD </span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Number of order recevied</div>
                            <span class="body-4 text-black-5 fw-5">{{ $taskCount }} /30 </span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="py-24 ">
                <li class="mt-16">
                    <div href="" class="box-inbox-item" style="background: #8080803d;">
                        <div class="content">
                            <div class="title mb-10"> NOTE</div>
                            <div class="sub">* You can start your task.</div>
                            <div class="sub">* For more infomation please contact customer service</div>
                        </div>
                    </div>
                </li>
            </ul>
            <a style="color: white;" href="#createProject" data-bs-toggle="offcanvas" aria-controls="offcanvasBottom"><button>Automatic Order</button></a>
        </div>
    </div>
@include('customer.partials.footer')
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="createProject" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header style-1">
        <span class="icon-close2 icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    </div>
    <div class="offcanvas-body pb-32">
        @if(isset($luckyDrawTask) && $luckyDrawTask->exceeding_amount > $userData->total_amount)
        <div class="mt-14 content-message">
            <ul class="mt-24">
                <li class="mt-16 line-bt2" style="padding: 15px 0;">
                    <p class="font-bold text-center">Insufficient balance, Kindly recharge with USD {{ $luckyDrawTask->exceeding_amount - $userData->total_amount }} to play Lucky Draw task.</p>
                </li>
            </ul>
        </div>
        <div class="mt-24">
            <a href="{{ route('customer.recharge') }}" class="mt-35 tf-btn primary">Recharge</a>
        </div>
        @elseif(!isset($luckyDrawTask) && $userData->badge == 'VIP0' && $userData->total_amount < 30)
        <div class="mt-14 content-message">
            <ul class="mt-24">
                <li class="mt-16 line-bt2" style="padding: 15px 0;">
                    <p class="font-bold text-center">Insufficient balance, Kindly recharge with minimum USD 30 to play.</p>
                </li>
            </ul>
        </div>
        <div class="mt-24">
            <a href="{{ route('customer.recharge') }}" class="mt-35 tf-btn primary">Recharge</a>
        </div>
        @else
        <div class="mt-14 content-message">
            <ul class="mt-24">
                <li class="mt-16 pb-8 line-bt2">
                    <a href="" class="box-inbox-item">
                        <div class="avatar avt-32 avt-status">
                            <img src="{{ asset($task->image_path) }}" alt="avatar">
                        </div>
                        <div class="content">
                            <div class="desc">{{ $task->name }}</div>
                            <div class="title"><span class="desc">USD</span> <span class="desc">x1</span></div>
                        </div>
                    </a>
                </li>
                <li class="mt-20 ">
                    <a href="" class="wd-file-message line-bt">
                        <div class="body-4 text-black-2 fw-5 flex-grow-1">Total order amount</div>
                        @if(isset($luckyDrawTask))
                        <span class="body-4 text-black-5 fw-5">USD  {{ $luckyDrawTask->exceeding_amount }}</span>
                        @else
                        <span class="body-4 text-black-5 fw-5">USD  {{ $task->price }}</span>
                        @endif
                    </a>
                </li>
                <li class="mt-20 line-bt">
                    <a href="" class="wd-file-message">
                        <div class="body-4 text-black-2 fw-5 flex-grow-1">CPS</div>
                        @if(isset($luckyDrawTask))
                        <span class="body-4 text-black-5 fw-5">USD {{  getCPSCalculation($luckyDrawTask->exceeding_amount, $userData->badge, 'luckyDraw')}}</span>
                        @else
                        <span class="body-4 text-black-5 fw-5">USD {{  getCPSCalculation($task->price, $userData->badge)}}</span>
                        @endif
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="mt-24">
            @if(isset( $luckyDrawTask ))
            <form action="{{ route('customer.automaticOrderSubmit', ['task_id' => $task->id, 'task_type' => 'luckyDraw']) }}" method="post">
            @else
            <form action="{{ route('customer.automaticOrderSubmit', ['task_id' => $task->id, 'task_type' => 'normal']) }}" method="post">
            @endif
                @csrf
                <button type="submit" class="mt-35 tf-btn primary">Submit</button>
            </form>
        </div>
        
        @endif
    </div>
</div>