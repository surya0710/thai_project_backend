@include('admin.partials.header')
@include('admin.partials.sidenav')
<!-- Page Sidebar Ends-->
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-xl-4 col-sm-7 box-col-3">
          <h3>Dashboard</h3>
        </div>
        <div class="col-5 d-none d-xl-block">
          
        </div>
        <div class="col-xl-3 col-sm-5 box-col-4">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ route('dashboard') }}">
                <i class="fa-solid fa-home"></i>
              </a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid default-dashboard">
    <div class="row">
      <div class="col-xl-4 box-col-5 col-md-6 proorder-md-2">
        <div class="card">
          <div class="card-header pb-0">
            <div class="header-top">
              <h4>No. of Users/Admin</h4>
              <div class="dropdown icon-dropdown setting-menu">
                <button class="btn dropdown-toggle" id="userdropdown1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-cog"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="recent-activity-card">
              <ul>
                <li>
                  <div class="recent-activity-data">
                    <div class="activity-name">
                      <span>
                        <i class="fa-solid fa-user"></i>
                      </span>
                      <a href="{{ route('admin.list') }}"><b>Admin: </b>{{ $adminUsersCount }}</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="recent-activity-data">
                    <div class="activity-name">
                      <span>
                        <i class="fa-solid fa-users"></i>
                      </span>
                      <a href="{{ route('user.list') }}"><b>Users: </b> {{ $customerUsersCount }}</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 box-col-5 col-md-6 proorder-md-2">
        <div class="card">
          <div class="card-header pb-0">
            <div class="header-top">
              <h4>Withdrawal/Recharge Request</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="recent-activity-card">
              <ul>
                <li>
                  <div class="recent-activity-data">
                    <div class="activity-name">
                      <span>
                        <i class="fa-solid fa-money-bill-1"></i>
                      </span>
                      <a href="{{ route('withdrawal.list') }}"><b>Withdrawal: </b> {{ $pendingWithrawRequest }}</a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="recent-activity-data">
                    <div class="activity-name">
                      <span>
                        <i class="fa-brands fa-cc-discover"></i>
                      </span>
                      <a href="{{ route('recharge.list') }}"><b>Recharge: </b> {{ $pendingRechargeRequest }}</a>
                    </div>

                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 box-col-5 col-md-6 proorder-md-2">
        <div class="card">
          <div class="card-header pb-0">
            <div class="header-top">
              <h4>No. of Products</h4>
            </div>
          </div>
          <div class="card-body">
            <div class="recent-activity-card">
              <ul>
                <li>
                  <div class="recent-activity-data">
                    <div class="activity-name">
                      <span>
                        <i class="fa-solid fa-money-bill-1"></i>
                      </span>
                      <a href="{{ route('lazada.list') }}"><b>Products: </b>{{ $productsCount }}</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-6 proorder-md-8 box-col-6">
        <div class="card">
          <div class="card-header">
            <div class="header-top">
              <h4>Withdrwal ({{ $pendingWithrawRequest }})</h4>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="notification-card">
              <ul>
                @foreach($withdrawList as $withdraw)
                <li>
                  <div class="user-notification">
                    <div>
                      <i class="fa-solid fa-money-bill-1"></i>
                    </div>
                    <div class="user-description">
                      <a href="{{ route('withdrawal.list') }}">
                        <h4>{{ $withdraw->user['name'] }} ({{ $withdraw->user['username'] }})</h4>
                      </a>
                      <span>{{ $withdraw->created_at->format('M d') == date('M d') ? 'Today' : $withdraw->created_at->format('M d') }} {{ $withdraw->created_at->format('h:iA') }} [Amt: {{ number_format($withdraw->amount, 2) }}]</span>
                    </div>
                  </div>
                  @if(Auth::guard('admin')->user()->user_type == 'Boss')
                  <div class="show-btn">
                    <a href="{{ route('withdrawal.view', ['withdrawal_id' => $withdraw->id]) }}">
                      <span>Show</span>
                    </a>
                  </div>
                  @endif
                </li>
                @endforeach
                @if(count($withdrawList) === 0)
                <p class="text-center">No Pending Withdraw Request</p>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-md-6 proorder-md-8 box-col-6">
        <div class="card">
          <div class="card-header">
            <div class="header-top">
              <h4>Recharge ({{ $pendingRechargeRequest }})</h4>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="notification-card">
              <ul>
                @foreach($rechargeList as $recharge)
                <li>
                  <div class="user-notification">
                    <div>
                      <i class="fa-solid fa-money-bill-1"></i>
                    </div>
                    <div class="user-description">
                      <a href="{{ route('recharge.list') }}">
                        <h4>{{ $recharge->user['name'] }} ({{ $recharge->user['username'] }}) </h4>
                      </a>
                      <span>{{ $recharge->created_at->format('M d') == date('M d') ? 'Today' : $recharge->created_at->format('M d') }} {{ $recharge->created_at->format('h:iA') }} [Amt: {{ number_format($recharge->amount, 2) }}]</span>
                    </div>
                  </div>
                  @if(Auth::guard('admin')->user()->user_type == 'Boss')
                  <div class="show-btn">
                    <a href="{{ route('recharge.list') }}">
                      <span>Show</span>
                    </a>
                  </div>

                  @endif
                </li>
                @endforeach
                @if(count($rechargeList) === 0)
                <p class="text-center">No Pending Recharge Request</p>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>
@include('admin.partials.footer')