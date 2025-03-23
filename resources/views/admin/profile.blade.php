@include('admin.partials.header')
<div class="page-body-wrapper">
  <!-- Page Sidebar Ends-->
  @include('admin.partials.sidenav')
  <!-- Page Sidebar Ends-->
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-xl-4 col-sm-7 box-col-3">
            <h3>Profile</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div class="card-header pb-0">
            <h4 class="card-title mb-0">My Profile</h4>
            <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
          </div>
          <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}">
              @csrf
              <div class="row mb-2">
                <div class="profile-title">
                  <div class="d-flex"> <img class="img-70 rounded-circle" alt="" src="{{ asset('assets/admin/images/dashboard/user.png') }}">
                    <div class="flex-grow-1 p-2">
                      <h3 class="mb-1 f-w-600">{{ Auth::guard('admin')->user()->name }}</h3>
                      <p>{{ Auth::guard('admin')->user()->user_type }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
              </div>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Name" value="{{ Auth::guard('admin')->user()->name }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>

              <div class="mb-3">
                <label class="form-label">Email-Address</label>
                <input class="form-control" placeholder="your-email" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
              </div>
              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{ Auth::guard('admin')->user()->phone }}">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
              </div>

              <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" placeholder="password" value="">
                <span class="text-danger">{{ $errors->first('password') }}</span>
              </div>

              <div class="form-footer">
                <button class="btn btn-primary btn-block" name="update_user">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-header pb-0">

            <div class="btn-group">
              <h4 class="card-title mb-0">Admin Log</h4>
            </div>
          </div>
          <div class="table-responsive custom-scrollbar theme-scrollbar add-project px-2">
           


            <table id="myTable" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Time</th>
                  <th>IP</th>
                  <th>Browser</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user->loginHistory as $history)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $history->event }}</td>
                  <td>{{ $history->created_at }}</td>
                  <td>{{ $history->ip_address }}</td>
                  <td>{{ $history->user_agent }}</td>
                </tr>
                @endforeach
                @if($user->loginHistory->count() == 0)
                <tr>
                  <td colspan="5" class="text-center">No data found</td>
                </tr>
                @endif
              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Time</th>
                  <th>IP</th>
                  <th>Browser</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
  <!-- footer start-->
  @include('admin.partials.footer')
  @if(session()->has('success') || session()->has('error'))
  <script>
    setTimeout(function() {
      document.getElementById("success-alert").style.display = "none";
    }, 5000);
  </script>
  @endif