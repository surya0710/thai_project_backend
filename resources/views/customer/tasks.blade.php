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
                    </div>
                    <div class="tab-pane fade" id="progress" role="tabpanel">   
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('customer.partials.footer')