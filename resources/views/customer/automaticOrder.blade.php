@include('customer.partials.header')
<style>
    #modalBasic-task{
        transform: translateY(20%);
    }
    .st0 {
        fill: #51BBA0;
        fill-opacity: 0.4;
    }

    .st1 {
        fill: #51BBA0;
        fill-opacity: 0.1;
    }

    .st2 {
        fill: #51BBA0;
    }
    /* only complete task popup ki css hai ye  */
    #completion {
        width: 50%;
        height: 50%;
        margin: auto;
        display: block;
    }

    @keyframes hideshow {
        0% {
            opacity: 0.2;
        }

        10% {
            opacity: 0.2;
        }

        15% {
            opacity: 0.2;
        }

        100% {
            opacity: 1;
        }
    }

    #cirkel {
        animation: hideshow 0.4s ease;
    }

    #check {
        animation: hideshow 0.4s ease;
    }

    #stars {
        animation: hideshow 1.0s ease;
        opacity: 0.9;
    }


    @keyframes hideshow {
        0% {
            transform: scale(0.2);
            transform-origin: initial;

        }

        100% {
            transform: scale(1.0);
            transform-origin: initial;
        }
    }

    @keyframes draaien {
        0% {
            transform: rotate(40deg);
            transform-origin: initial;

        }

        100% {
            transform: scale(0deg);
            transform-origin: initial;
        }
    }

    #check {
        animation: draaien 0.8s ease;
    }


    @keyframes transparant {
        0% {
            opacity: 0;

        }

        100% {
            opacity: 1;
        }
    }

    #check {
        animation: transparant 2s;
    }
</style>
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
                            <span class="body-4 text-black-5 fw-5">CURRENT LEVEL {{ $userData->badge }}</span>
                        </a>
                    </li>
                    <li class="mt-20 ">
                        <a class="wd-file-message line-bt">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Available Balance</div>
                            <span class="body-4 text-black-5 fw-5">{{ $userData->total_amount }} USD</span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Historical Commission</div>
                            <span class="body-4 text-black-5 fw-5">{{  $userData->revenue_generated }} </span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Today</div>
                            <span class="body-4 text-black-5 fw-5">{{ $todayEarned }} USD </span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a class="wd-file-message">
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
        @if($task === null)
        <div class="mt-14 content-message">
            <ul class="mt-24">
                <li class="mt-16 line-bt2" style="padding: 15px 0;">
                    <p class="font-bold text-center">All Task on this Level are completed</p>
                </li>
            </ul>
        </div>
        <div class="mt-24">
            <a href="#" class="mt-35 tf-btn primary">Level Up</a>
        </div>
        @else
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
                    @csrf
                    <button type="submit" class="mt-35 tf-btn primary">Lucky Draw</button>
                @else
                <form action="{{ route('customer.automaticOrderSubmit', ['task_id' => $task->id, 'task_type' => 'normal']) }}" method="post">
                    @csrf
                    <button type="submit" class="mt-35 tf-btn primary">Complete Task</button>
                @endif
                </form>
            </div>
            
            @endif
        @endif
    </div>
</div>
<div class="modal fade" id="modalCenter" style="transform: translateY(25%);">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-16">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fw-6">Lucky Draw</h4>
            </div>
            <div class="modal-body fw-5 text-center fs-18">Your Next lucky draw task is here...</div>
            <div class="d-flex gap-16 mt-20 text-center">
                <button type="button" data-bs-dismiss="modal" data-bs-toggle="offcanvas" class="tf-btn primary ">Play</button>
            </div>
        </div>
    </div>
</div>
@if(isset($luckyDrawTask))
<script>
    var modalElement = document.getElementById('modalCenter');
    var modalInstance = new bootstrap.Modal(modalElement);
    modalInstance.show();
</script>
@endif
@if($getCurrentLevelTasks  === 30)
<div class="modal hide" id="modalBasic-task">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-16">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title fw-6">Congratulations you have completed this level</h4>
            </div>
            <div class="modal-body fw-5 text-center fs-18">
                <svg id="completion" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96 101">
                    <title>
                        C1DBEBC0-CF7A-42D3-B615-1AB5DE73C3E9
                    </title>
                    <g id="configurator">
                        <g id="configurator_completion">
                            <g id="stars">
                                <circle id="Oval" class="st0" cx="14" cy="18" r="1" />
                                <circle id="Oval-Copy-4" class="st0" cx="27" cy="20" r="1" />
                                <circle id="Oval-Copy-10" class="st0" cx="76" cy="20" r="1" />
                                <circle id="Oval-Copy-2" class="st0" cx="61.5" cy="12.5" r="1.5" />
                                <circle id="Oval-Copy-9" class="st0" cx="94" cy="53" r="1" />
                                <circle id="Oval-Copy-6" class="st0" cx="88" cy="14" r="1" />
                                <circle id="Oval-Copy-7" class="st0" cx="59" cy="1" r="1" />
                                <circle id="Oval_1_" class="st0" cx="43" cy="9" r="2" />
                                <path id="ster-01" class="st0"
                                    d="M28.5 3.8L26 6l2.2-2.5L26 1l2.5 2.2L31 1l-2.2 2.5L31 6z" />
                                <path id="ster-01" class="st0"
                                    d="M3.5 50.9l-2.1 2.4 1.7-2.7-2.9-1.2 3.1.8.2-3.2.2 3.2 3.1-.8-2.9 1.2 1.7 2.7z" />
                                <path id="ster-01" class="st0"
                                    d="M93.5 27.8L91 30l2.2-2.5L91 25l2.5 2.2L96 25l-2.2 2.5L96 30z" />
                                <circle id="Oval-Copy-5" class="st0" cx="91" cy="40" r="2" />
                                <circle id="Oval-Copy-3" class="st0" cx="7" cy="36" r="2" />
                                <circle id="Oval-Copy-8" class="st0" cx="7.5" cy="5.5" r=".5" />
                            </g>
                        </g>
                    </g>
                    <g id="cirkel">
                        <g id="Mask">
                            <path id="path-1_1_" class="st1"
                                d="M49 21c22.1 0 40 17.9 40 40s-17.9 40-40 40S9 83.1 9 61s17.9-40 40-40z" />
                        </g>
                    </g>
                    <path id="check" class="st2"
                        d="M31.3 64.3c-1.2-1.5-3.4-1.9-4.9-.7-1.5 1.2-1.9 3.4-.7 4.9l7.8 10.4c1.3 1.7 3.8 1.9 5.3.4L71.1 47c1.4-1.4 1.4-3.6 0-5s-3.6-1.4-5 0L36.7 71.5l-5.4-7.2z" />
                </svg>
            </div>
            <a href="{{ route('customer.levelUp') }}" class="tf-btn primary">Level UP</a>
        </div>
    </div>
</div>
<script>
    $('#modalBasic-task').show();
</script>
@endif