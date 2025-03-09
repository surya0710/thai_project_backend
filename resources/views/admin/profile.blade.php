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
                <form method="post">
                  <div class="row mb-2">
                    <div class="profile-title">
                      <div class="d-flex"> <img class="img-70 rounded-circle" alt="" src="{{ asset('assets/admin/images/dashboard/user.png') }}">
                        <div class="flex-grow-1">
                          <h3 class="mb-1 f-w-600">{{ Auth::user()->name }}</h3>
                          <p>{{ Auth::user()->user_type }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Email-Address</label>
                    <input class="form-control" placeholder="your-email" name="email" value="{{ Auth::user()->email }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input class="form-control" type="text" placeholder="Phone" name="phone" value="{{ Auth::user()->phone }}">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="password" value="">
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
                  <!-- <div class="square-product-setting d-inline-block">
                      <a class="icon-grid grid-layout-view" href="#"
                        data-original-title="" title=""><i data-feather="grid"></i>
                      </a>
                    </div> -->

                </div>

                <div class="btn-group" style="display: flex; float:right;">
                  <button style="padding: 3px 10px 0px 13px; margin-right: 4px;" class="btn btn-primary " type="button"><i class="fa-solid fa-rotate"></i></button>

                  <button style="padding: 4px;" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                      class="fa-solid fa-share-from-square"></i></button>
                  <ul class="dropdown-menu dropdown-block">
                    <li><a class="dropdown-item" href="#">JSON</a></li>
                    <li><a class="dropdown-item" href="#">XML</a></li>
                    <li><a class="dropdown-item" href="#">CSV</a></li>
                    <li><a class="dropdown-item" href="#">TXT</a></li>
                    <li><a class="dropdown-item" href="#">MS-Word</a></li>
                    <li><a class="dropdown-item" href="#">MS-Excel</a></li>
                  </ul>
                  <button style="padding: 4px;" class=" dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table-cells"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked"> ID</label></li>
                    <li role="menuitem"><label><input type="checkbox" data-field="title" value="1" checked="checked"> Title</label></li>
                    <li role="menuitem"><label><input type="checkbox" data-field="url" value="2" checked="checked"> Url</label></li>
                    <li role="menuitem"><label><input type="checkbox" data-field="ip" value="3" checked="checked"> IP</label></li>
                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="4" checked="checked"> Createtime</label></li>
                  </ul>
                </div>
                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
              </div>
              <div class="table-responsive custom-scrollbar theme-scrollbar add-project">
                <table class="table card-table table-vcenter text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Url</th>
                      <th>IP</th>
                      <th>Create Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a class="text-inherit" href="#">48382 </a></td>
                      <td>Login</td>
                      <td><span class="status-icon bg-success"></span> www.google.com</td>
                      <td>12.56.908</td>
                      <td class="text-end">30-01-2025</td>
                    </tr>
                    <tr>
                      <td><a class="text-inherit" href="#">48382 </a></td>
                      <td>Login</td>
                      <td><span class="status-icon bg-success"></span> www.google.com</td>
                      <td>12.56.908</td>
                      <td class="text-end">30-01-2025</td>
                    </tr>
                    <tr>
                      <td><a class="text-inherit" href="#">48382 </a></td>
                      <td>Login</td>
                      <td><span class="status-icon bg-success"></span> www.google.com</td>
                      <td>12.56.908</td>
                      <td class="text-end">30-01-2025</td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Container-fluid Ends-->
      </div>
      <!-- footer start-->
      @include('admin.partials.footer')