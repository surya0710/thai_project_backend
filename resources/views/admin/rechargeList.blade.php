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
                <h3>Recharge Management</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header pb-0 card-no-border">
                  <div class="btn-group">
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
                  </div>

                  <div class="btn-group">
                    <button style="padding: 4px;" class=" dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table-cells"></i></button>
                    <ul class="dropdown-menu tb-drop-check" role="menu">
                      <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Id</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="money" value="1" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Money</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="user_id" value="2" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">User_id</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="user.mobile" value="3" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Phone number</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="user.username" value="4" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">User.username</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="user.nickname" value="5" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Real name</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="user.code" value="6" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Invite Code</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="name" value="7" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Recharge pictures</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="recharge_datetime" value="8" checked="checked"> Recharge_datetime</label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="9" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Createtime</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="status" value="10" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Status</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="remarks" value="11" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Remarks</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="user.money" value="12" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Current account balance</font>
                          </font>
                        </label></li>
                      <li role="menuitem"><label><input type="checkbox" data-field="operate" value="13" checked="checked">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Operate</font>
                          </font>
                        </label></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive custom-scrollbar">
                    <table class="display" id="basic-1">
                      <thead>
                        <tr>
                          <th> ID</th>
                          <th>Money</th>
                          <th>Username</th>
                          <th>Phone Number</th>
                          <th>Real Name</th>
                          <th>Invite Code</th>
                          <th>Recharge Picture</th>
                          <th>Recharge_datetime</th>
                          <th>State</th>
                          <th>Approved By</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($rechargeList as $recharge)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $recharge->amount }}</td>
                          <td>{{ $recharge->user['username'] ?? 'N/A' }}</td>
                          <td>{{ $recharge->user['phone'] ?? 'N/A' }}</td>
                          <td>{{ $recharge->user['name'] ?? 'N/A' }}</td>
                          <td>{{ $recharge->user['invitation_code'] }}</td>
                          <td><img src="{{ asset('uploads/recharge/' . $recharge->recharge_proof) }}" style="width:100px" /></td>
                          <td>{{ $recharge->created_at }}</td>
                          <td>{{ $recharge->status == 0 ? 'Pending' : 'Approved' }}</td>
                          <td>{{ $recharge->approver['username'] ?? 'N/A' }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Container-fluid Ends-->
      </div>
      @include('admin.partials.footer')