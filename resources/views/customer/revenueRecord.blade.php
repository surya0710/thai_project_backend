@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <h5> Revenue Record</h5>
    </div>
    <div class="app-content">
        <div class="tf-container">
            
            <div class="content">
                <div class="home-main-btn mt-10 align-items-center gap-16">
                    <button class="content d-block">
                        <p class=" text-white-5 desc-val-drop">Total Revenue</p>
                        <div class="body-4 text-white-2 fw-bold text-val-drop">{{ $userData->revenue_generated }}</div>
                    </button>
                    <button class="content d-block">
                        <p class=" text-white-5 desc-val-drop">Today's Revenue</p>
                        <div class="body-4 text-white-2 fw-bold text-val-drop">{{ $todaysRevenue }}</div>
                    </button>
                    <button class="content d-block">
                        <p class=" text-white-5 desc-val-drop">Yesterday's Revenue</p>
                        <div class="body-4 text-white-2 fw-bold text-val-drop">{{ $yesterdayrevenue }}</div>
                    </button>
                   
                </div>
            </div>
            
        </div>
    </div> 
@include('customer.partials.footer')