@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Records</h5>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="mt-24">
                <div class="tab-slide wrapper-tab-task">
                    <ul class="nav nav-tabs task-tab" role="tablist">
                        <li class="item-slide-effect"></li>
                        <li class="nav-item active" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#allTask">All
                                Tasks</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#progress"> Pending</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#completed">Completed</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="allTask" role="tabpanel">
                        @foreach($tasks as $task)
                        <ul class="mt-20">
                            <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                    <div class="avatar avt-32 avt-status">
                                        <img src="{{ asset($task->image_path) }}" alt="avatar">
                                    </div>
                                    <div class="content">
                                        @if($task->taskStatus !== null)
                                        <div class="sub">11-2-25 12:00</div>
                                        <div class="sub">7263726</div>
                                        @endif
                                        <div class="desc">{{ $task->name }}</div>
                                        <div class="title"><span class="desc">USD</span> {{ $task->price }} <span
                                                class="desc">x1</span></div>
                                    </div>
                                    <div class="text-right tag-status type-1">
                                        @if($task->taskStatus !== null)
                                            {{ 'Completed' }}
                                            @else {{ 'Pending' }}
                                        @endif
                                    </div>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-around">
                                        <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                        <p class="text-caption-2 text-black-4">CPS</p>

                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="font-title-btn fw-7 text-black-2">USD {{ $task->price }}</div>
                                        <div class="font-title-btn fw-7 text-black-2">USD {{ getCPSCalculation($task->price, Auth::guard('customer')->user()->badge) }}</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="progress" role="tabpanel">   
                        @foreach($tasks as $task)
                            @if($task->taskStatus == null)
                            <ul class="mt-20">
                                <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                        <div class="avatar avt-32 avt-status">
                                            <img src="{{ asset($task->image_path) }}" alt="avatar">
                                        </div>
                                        <div class="content">
                                            @if($task->taskStatus !== null)
                                            <div class="sub">11-2-25 12:00</div>
                                            <div class="sub">7263726</div>
                                            @endif
                                            <div class="desc">{{ $task->name }}</div>
                                            <div class="title"><span class="desc">USD</span> {{ $task->price }} <span
                                                    class="desc">x1</span></div>
                                        </div>
                                        <div class="text-right tag-status type-1">
                                            Pending
                                        </div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-around">
                                            <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                            <p class="text-caption-2 text-black-4">CPS</p>

                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <div class="font-title-btn fw-7 text-black-2">USD {{ $task->price }}</div>
                                            <div class="font-title-btn fw-7 text-black-2">USD {{ getCPSCalculation($task->price, Auth::guard('customer')->user()->badge) }}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                        @foreach($tasks as $task)
                            @if($task->taskStatus != null)
                            <ul class="mt-20">
                                <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                        <div class="avatar avt-32 avt-status">
                                            <img src="{{ asset($task->image_path) }}" alt="avatar">
                                        </div>
                                        <div class="content">
                                            @if($task->taskStatus !== null)
                                            <div class="sub">11-2-25 12:00</div>
                                            <div class="sub">7263726</div>
                                            @endif
                                            <div class="desc">{{ $task->name }}</div>
                                            <div class="title"><span class="desc">USD</span> {{ $task->price }} <span
                                                    class="desc">x1</span></div>
                                        </div>
                                        <div class="text-right tag-status type-1">
                                            Pending
                                        </div>
                                    </a>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-around">
                                            <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                            <p class="text-caption-2 text-black-4">CPS</p>

                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <div class="font-title-btn fw-7 text-black-2">USD {{ $task->price }}</div>
                                            <div class="font-title-btn fw-7 text-black-2">USD {{ getCPSCalculation($task->price, Auth::guard('customer')->user()->badge) }}</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('customer.partials.footer')