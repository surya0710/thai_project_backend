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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#frozen">Frozen</button>
                        </li>

                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="allTask" role="tabpanel">
                        <ul class="mt-20">
                            <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                    <div class="avatar avt-32 avt-status">
                                        <img src="{{ asset('assets/images/store/store8.png') }}" alt="avatar">
                                    </div>
                                    <div class="content">
                                        <div class="sub">11-2-25 12:00</div>
                                        <div class="sub">7263726</div>
                                        <div class="desc">bro, kepriwe kie rawone ra mudun-mudun selak to kaliren duis
                                            enim velit mollit.</div>
                                        <div class="title"><span class="desc">USD</span> 434.545 <span
                                                class="desc">x1</span></div>

                                    </div>
                                    <div class="text-right tag-status type-1"> Completed</div>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-around">
                                        <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                        <p class="text-caption-2 text-black-4">CPS</p>

                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="mt-20">

                            <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                    <div class="avatar avt-32 avt-status">
                                        <img src="{{ asset('assets/images/store/store10.png') }}" alt="avatar">
                                    </div>
                                    <div class="content">
                                        <div class="sub">11-2-25 12:00</div>
                                        <div class="sub">7263726</div>
                                        <div class="desc">bro, kepriwe kie rawone ra mudun-mudun selak to kaliren duis
                                            enim velit mollit.</div>
                                        <div class="title"><span class="desc">USD</span> 434.545 <span
                                                class="desc">x1</span></div>

                                    </div>
                                    <div class="text-right tag-status type-5"> Pending</div>

                                </a>

                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-around">
                                        <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                        <p class="text-caption-2 text-black-4">CPS</p>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                    </div>
                                </div>
                                <button class="tf-btn btn-lg warning mt-2">Submit order</button>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-pane fade" id="progress" role="tabpanel">
                       
                        <ul class="mt-20">

                            <li class="mt-16 pb-8 line-bt2">
                                <a href="" class="box-inbox-item">
                                    <div class="avatar avt-32 avt-status">
                                        <img src="{{ asset('assets/images/store/store10.png') }}" alt="avatar">
                                    </div>
                                    <div class="content">
                                        <div class="sub">11-2-25 12:00</div>
                                        <div class="sub">7263726</div>
                                        <div class="desc">bro, kepriwe kie rawone ra mudun-mudun selak to kaliren duis
                                            enim velit mollit.</div>
                                        <div class="title"><span class="desc">USD</span> 434.545 <span
                                                class="desc">x1</span></div>

                                    </div>
                                    <div class="text-right tag-status type-5"> Pending</div>

                                </a>

                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-around">
                                        <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                        <p class="text-caption-2 text-black-4">CPS</p>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                    </div>
                                </div>
                                <button class="tf-btn btn-lg warning mt-2">Submit order</button>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                        <ul class="mt-20">
                            <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                    <div class="avatar avt-32 avt-status">
                                        <img src="{{ asset('assets/images/store/store5.png') }}" alt="avatar">
                                    </div>
                                    <div class="content">
                                        <div class="sub">11-2-25 12:00</div>
                                        <div class="sub">7263726</div>
                                        <div class="desc">bro, kepriwe kie rawone ra mudun-mudun selak to kaliren duis
                                            enim velit mollit.</div>
                                        <div class="title"><span class="desc">USD</span> 434.545 <span
                                                class="desc">x1</span></div>

                                    </div>
                                    <div class="text-right tag-status type-1"> Completed</div>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-around">
                                        <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                        <p class="text-caption-2 text-black-4">CPS</p>

                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        <ul class="mt-20">
                            <li class="mt-16 pb-8 line-bt2"><a href="" class="box-inbox-item">
                                    <div class="avatar avt-32 avt-status">
                                        <img src="{{ asset('assets/images/store/store14.png') }}" alt="avatar">
                                    </div>
                                    <div class="content">
                                        <div class="sub">11-2-25 12:00</div>
                                        <div class="sub">7263726</div>
                                        <div class="desc">bro, kepriwe kie rawone ra mudun-mudun selak to kaliren duis
                                            enim velit mollit.</div>
                                        <div class="title"><span class="desc">USD</span> 434.545 <span
                                                class="desc">x1</span></div>

                                    </div>
                                    <div class="text-right tag-status type-1"> Completed</div>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-around">
                                        <p class="text-caption-2 text-black-4">Total Order Amount</p>
                                        <p class="text-caption-2 text-black-4">CPS</p>

                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>
                                        <div class="font-title-btn fw-7 text-black-2">USD 314.147</div>

                                    </div>

                                </div>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="tab-pane fade" id="frozen" role="tabpanel">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('customer.partials.footer')