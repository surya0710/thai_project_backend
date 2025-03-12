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
                            <span class="body-4 text-black-5 fw-5">2325.23 USD</span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Historical Commission</div>
                            <span class="body-4 text-black-5 fw-5">344.34 </span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Today</div>
                            <span class="body-4 text-black-5 fw-5">0 USD </span>
                        </a>
                    </li>
                    <li class="mt-20 line-bt">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Number of order recevied</div>
                            <span class="body-4 text-black-5 fw-5">26 /30 </span>
                        </a>
                    </li>
                    <li class="mt-20 ">
                        <a href="" class="wd-file-message">
                            <div class="body-4 text-black-2 fw-5 flex-grow-1">Amount to be refunded</div>
                            <span class="body-4 text-black-5 fw-5">0 </span>
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
            <button class=""><a style="color: white;" href="#createProject" data-bs-toggle="offcanvas"
                aria-controls="offcanvasBottom">Automatic Order</a></button>

        </div>
    </div>
@include('customer.partials.footer')
<div class="offcanvas offcanvas-bottom show" tabindex="-1" id="createProject" aria-labelledby="offcanvasBottomLabel" aria-modal="true" role="dialog">
    <div class="offcanvas-header style-1">
        <span class="icon-close2 icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
    </div>
    <div class="offcanvas-body pb-32">
        <div class="mt-14 content-message">
            <ul class="mt-24">
                <li class="mt-16 pb-8 line-bt2">
                    <a href="" class="box-inbox-item">
                        <div class="avatar avt-32 avt-status">
                            <img src="{{ asset('assets/images/avt/avt5.jpg') }}" alt="avatar">
                        </div>
                        <div class="content">
                            <div class="desc">bro, kepriwe kie rawone ra mudun-mudun selak to kaliren duis
                                enim velit mollit.</div>
                            <div class="title"><span class="desc">USD</span> 434.545 <span class="desc">x1</span></div>

                        </div>
                        
                    </a>
                </li>
                <li class="mt-20 ">
                    <a href="" class="wd-file-message line-bt">
                        <div class="body-4 text-black-2 fw-5 flex-grow-1">Total order amount</div>
                        <span class="body-4 text-black-5 fw-5">USD 2325.23 </span>
                    </a>
                </li>
                <li class="mt-20 line-bt">
                    <a href="" class="wd-file-message">
                        <div class="body-4 text-black-2 fw-5 flex-grow-1">CPS</div>
                        <span class="body-4 text-black-5 fw-5">USD 65675.767 </span>
                    </a>
                </li>
                <li class="mt-20 line-bt">
                    <a href="" class="wd-file-message">
                        <div class="body-4 text-black-2 fw-5 flex-grow-1">Expected return</div>
                        <span class="body-4 text-black-5 fw-5">USD 613432.255 </span>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="mt-24">
            <a href="" class="mt-35 tf-btn primary">Submit</a>
        </div>
    </div>
</div>