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

        <!-- Container-fluid starts-->
        <!-- <div class="container-fluid default-dashboard">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">

                <div class="card-body">
                  <form class="row g-3 needs-validation custom-input" novalidate="">
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip02"> ID</label>
                      <input class="form-control" id="validationTooltip02" type="text" placeholder="ID" required="">
                    </div>

                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip07">Money</label>
                      <div class="row">
                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                            placeholder="Money" required=""></div>
                        <div class="col-1 mt-2">-</div>
                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                            placeholder="Money" required=""></div>
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip05">User_id</label>
                      <input class="form-control" id="validationTooltip05" type="text" placeholder="User_id" required="">
                    </div>


                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip01">Phone Number</label>
                      <input class="form-control" id="validationTooltip01" type="text" placeholder="Phone Number"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip02">User.username</label>
                      <input class="form-control" id="validationTooltip02" type="text" placeholder="User.username"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip08">Real Name</label>
                      <input class="form-control" id="validationTooltip08" type="text" placeholder="Real Name"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip03">Invite code </label>
                      <input class="form-control" id="validationTooltip03" type="text" placeholder="Invite code"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip04">Recharge Pictures</label>
                      <input class="form-control" id="validationTooltip04" type="text" placeholder="Recharge Pictures" required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip05">Recharge_datetime</label>
                      <input class="form-control" id="validationTooltip05" type="text" placeholder=" Recharge_datetime"
                        required="">
                    </div>

                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip08">Createtime</label>
                      <input class="form-control" id="validationTooltip08" type="text" placeholder="Create Time" required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip09">State</label>
                      <select class="form-select" id="validationTooltip09" required="">
                        <option selected="" disabled="" value="">Choose...</option>
                        <option>Awaiting review </option>
                        <option>Reviewed </option>
                        <option>Rejected</option>

                      </select>

                    </div>

                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip07">Remakes</label>
                      <input class="form-control" id="validationTooltip07" type="text" placeholder="Remakes"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip07">Current Amount Bal.</label>
                      <div class="row">
                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                            placeholder="Current Amount Bal." required=""></div>
                        <div class="col-1 mt-2">-</div>
                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                            placeholder="Current Amount Bal." required=""></div>
                      </div>
                    </div>
                    <div class="col-6 mt-5">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <button class="btn btn-primary" type="reset">Reset</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>

          </div>
        </div> -->

        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header pb-0 card-no-border">
                  <div class="btn-group">
                    <!-- <div class="square-product-setting d-inline-block">
                      <a class="icon-grid grid-layout-view" href="#"
                        data-original-title="" title=""><i data-feather="grid"></i>
                      </a>
                    </div> -->
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
                          <th>User_id</th>
                          <th>User.username</th>
                          <th>Phone Number</th>
                          <th>Real Name</th>
                          <th>Invite Code</th>
                          <th>Recharge Picture</th>
                          <th>Recharge_datetime</th>
                          <!-- <th>Create Time</th> -->
                          <th>State</th>
                          <th>Remakes</th>
                          <!-- <th>Current Amount Balance</th> -->
                          <!-- <th>Operate</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        
                            <tr>
                              <td>1</td>
                              <td>56.00</td>
                              <td>4321</td>
                              <td>honeygola</td>
                              <td>1234567890</td>
                              <td>Honey Gola</td>
                              <td>HJHJD89</td>
                              <td><a href="javascript:"><img style="height: 40px;" class="img-sm img-center" src="../uploads/screenshot/"></a></td>
                              <td>2 March</td>
                              <td>India</td>
                              <td>Pending</td>
                            </tr>
                          
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