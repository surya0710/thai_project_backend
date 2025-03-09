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
                        <h3>Withdrawal Management</h3>
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
                      <label class="form-label" for="validationTooltip01">Account</label>
                      <input class="form-control" id="validationTooltip01" type="text" placeholder="Account"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip02">Parent User ID</label>
                      <input class="form-control" id="validationTooltip02" type="text" placeholder="Parent User ID"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip03">Invitation code que</label>
                      <input class="form-control" id="validationTooltip03" type="text" placeholder="Invitation code que"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip04">Superior Nickname</label>
                      <input class="form-control" id="validationTooltip04" type="text" placeholder="Superior Nickname"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip05">Parent Username</label>
                      <input class="form-control" id="validationTooltip05" type="text" placeholder="Parent Username"
                        required="">
                    </div>

                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip06">Senior Invitation Code </label>
                      <input class="form-control" id="validationTooltip06" type="text"
                        placeholder="Senior Invitation Code" required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip07">Referral Code</label>
                      <input class="form-control" id="validationTooltip07" type="text" placeholder="Referral Code"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip08">Real Name</label>
                      <input class="form-control" id="validationTooltip08" type="text" placeholder="Real Name"
                        required="">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label class="form-label" for="validationTooltip09">State</label>
                      <select class="form-select" id="validationTooltip09" required="">
                        <option selected="" disabled="" value="">Choose...</option>
                        <option>U.S </option>
                        <option>Thailand </option>
                        <option>India </option>
                        <option>U.K</option>
                      </select>

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

        <div class="container-fluid default-dashboard">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">

                        </div>
                        <div class="card-body">
                             <!-- <div class="card-body px-0 pb-0">
                                        <div class="user-content">
                                            <form class="row g-3 needs-validation custom-input" novalidate="">
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip02"> ID</label>
                                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="ID" required="">
                                                </div>

                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip05">User_id</label>
                                                    <input class="form-control" id="validationTooltip05" type="text" placeholder="User_id" required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip02">Nickname</label>
                                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Nickname"
                                                        required="">
                                                </div>

                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip01">Phone Number</label>
                                                    <input class="form-control" id="validationTooltip01" type="text" placeholder="Phone Number"
                                                        required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip03">Invite code </label>
                                                    <input class="form-control" id="validationTooltip03" type="text" placeholder="Invite code"
                                                        required="">
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
                                                    <label class="form-label" for="validationTooltip04">Type</label>
                                                    <input class="form-control" id="validationTooltip04" type="text" placeholder="Type" required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip05">Account</label>
                                                    <input class="form-control" id="validationTooltip05" type="text" placeholder=" Account"
                                                        required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip08">Realname</label>
                                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Real Name"
                                                        required="">
                                                </div>


                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip09">Status</label>
                                                    <select class="form-select" id="validationTooltip09" required="">
                                                        <option selected="" disabled="" value="">Choose...</option>
                                                        <option>Status created </option>
                                                        <option>Status successed</option>
                                                        <option>Status rejected</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip08">Createtime</label>
                                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Create Time" required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip07">Updatetime</label>
                                                    <input class="form-control" id="validationTooltip07" type="text" placeholder="Updatetime"
                                                        required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip08">Transfertime</label>
                                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Transfertime"
                                                        required="">
                                                </div>
                                                <div class="col-6 mt-5">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <button class="btn btn-primary" type="reset">Reset</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div> -->
                            <ul class="nav nav-tabs border-tab border-0 mb-0 nav-danger" id="topline-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active nav-border pt-0 txt-danger nav-danger" id="topline-top-user-tab" data-bs-toggle="tab" href="#topline-top-user" role="tab" aria-controls="topline-top-user" aria-selected="true"><i class="icofont icofont-man-in-glasses"></i>All</a></li>
                                <li class="nav-item"><a class="nav-link nav-border txt-danger nav-danger" id="topline-top-description-tab" data-bs-toggle="tab" href="#topline-top-description" role="tab" aria-controls="topline-top-description" aria-selected="false"><i class="icofont icofont-file-document"></i>Status created</a></li>
                                <li class="nav-item"><a class="nav-link nav-border txt-danger nav-danger" id="topline-top-review-tab" data-bs-toggle="tab" href="#topline-top-review" role="tab" aria-controls="topline-top-review" aria-selected="false"><i class="icofont icofont-star"></i>Status successed</a></li>
                                <li class="nav-item"><a class="nav-link nav-border txt-danger nav-danger" id="topline-top-rejected-tab" data-bs-toggle="tab" href="#topline-top-rejected" role="tab" aria-controls="topline-top-rejected" aria-selected="false"><i class="icofont icofont-star"></i>Status rejected</a></li>
                            </ul>
                            <div class="tab-content" id="topline-tabContent">
                                <div class="tab-pane fade show active" id="topline-top-user" role="tabpanel" aria-labelledby="topline-top-user-tab">
                                    <!-- <div class="card-body px-0 pb-0">
                                        <div class="user-content">
                                            <form class="row g-3 needs-validation custom-input" novalidate="">
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip02"> ID</label>
                                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="ID" required="">
                                                </div>

                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip05">User_id</label>
                                                    <input class="form-control" id="validationTooltip05" type="text" placeholder="User_id" required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip02">Nickname</label>
                                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Nickname"
                                                        required="">
                                                </div>

                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip01">Phone Number</label>
                                                    <input class="form-control" id="validationTooltip01" type="text" placeholder="Phone Number"
                                                        required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip03">Invite code </label>
                                                    <input class="form-control" id="validationTooltip03" type="text" placeholder="Invite code"
                                                        required="">
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
                                                    <label class="form-label" for="validationTooltip04">Type</label>
                                                    <input class="form-control" id="validationTooltip04" type="text" placeholder="Type" required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip05">Account</label>
                                                    <input class="form-control" id="validationTooltip05" type="text" placeholder=" Account"
                                                        required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip08">Realname</label>
                                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Real Name"
                                                        required="">
                                                </div>


                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip09">Status</label>
                                                    <select class="form-select" id="validationTooltip09" required="">
                                                        <option selected="" disabled="" value="">Choose...</option>
                                                        <option>Status created </option>
                                                        <option>Status successed</option>
                                                        <option>Status rejected</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip08">Createtime</label>
                                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Create Time" required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip07">Updatetime</label>
                                                    <input class="form-control" id="validationTooltip07" type="text" placeholder="Updatetime"
                                                        required="">
                                                </div>
                                                <div class="col-md-3 position-relative">
                                                    <label class="form-label" for="validationTooltip08">Transfertime</label>
                                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Transfertime"
                                                        required="">
                                                </div>
                                                <div class="col-6 mt-5">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <button class="btn btn-primary" type="reset">Reset</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div> -->
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
                                                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked"> Id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user_id" value="1" checked="checked"> User_id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.nickname" value="2" checked="checked"> Nickname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.mobile" value="3" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Phone number</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.code" value="4" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Invite Code</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="money" value="5" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Money</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="type" value="6" checked="checked"> Type</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="account" value="7" checked="checked"> Account</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="name" value="8" checked="checked"> Realname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="status" value="9" checked="checked"> Status</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="10" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Createtime</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="updatetime" value="11"> Updatetime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="transfertime" value="12" checked="checked"> Transfertime</label></li>
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
                                                            <th>ID</th>
                                                            <th>User_id</th>
                                                            <th>Nickname</th>
                                                            <th>Phone Number</th>
                                                            <th>Invite Code</th>
                                                            <th>Money</th>
                                                            <th>Type</th>
                                                            <th>Account</th>
                                                            <th>Realname</th>
                                                            <th>Status</th>
                                                            <th>Createtime</th>
                                                            <th>Transfertime</th>
                                                            <th>Operate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>69887</td>
                                                            <td>787676</td>
                                                            <td>Edinburgh</td>
                                                            <td>9999999998</td>
                                                            <td>Great Zhou 34</td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td><a href="javascript:;" class="searchit" data-toggle="tooltip" title="" data-field="status" data-value="successed" data-original-title="Click to search Status successed"><span class="text-success"><i class="fa fa-circle"></i>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">Status successed</font>
                                                                        </font>
                                                                    </span></a></td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="topline-top-description" role="tabpanel" aria-labelledby="topline-top-description-tab">
                                   
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
                                                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked"> Id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user_id" value="1" checked="checked"> User_id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.nickname" value="2" checked="checked"> Nickname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.mobile" value="3" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Phone number</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.code" value="4" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Invite Code</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="money" value="5" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Money</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="type" value="6" checked="checked"> Type</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="account" value="7" checked="checked"> Account</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="name" value="8" checked="checked"> Realname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="status" value="9" checked="checked"> Status</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="10" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Createtime</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="updatetime" value="11"> Updatetime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="transfertime" value="12" checked="checked"> Transfertime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="13" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Operate</font>
                                                            </font>
                                                        </label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table table-striped table-bordered table-hover table-nowrap" style="overflow-x: scroll;">
                                                <table class="display" id="basic-1">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>User_id</th>
                                                            <th>Nickname</th>
                                                            <th>Phone Number</th>
                                                            <th>Invite Code</th>
                                                            <th>Money</th>
                                                            <th>Type</th>
                                                            <th>Account</th>
                                                            <th>Realname</th>
                                                            <th>Status</th>
                                                            <th>Createtime</th>
                                                            <th>Transfertime</th>
                                                            <th>Operate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>69887</td>
                                                            <td>787676</td>
                                                            <td>Edinburgh</td>
                                                            <td>9999999998</td>
                                                            <td>Great Zhou 34</td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td>2011/04/25</td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="topline-top-review" role="tabpanel" aria-labelledby="topline-top-review-tab">
                                   
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
                                                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked"> Id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user_id" value="1" checked="checked"> User_id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.nickname" value="2" checked="checked"> Nickname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.mobile" value="3" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Phone number</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.code" value="4" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Invite Code</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="money" value="5" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Money</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="type" value="6" checked="checked"> Type</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="account" value="7" checked="checked"> Account</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="name" value="8" checked="checked"> Realname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="status" value="9" checked="checked"> Status</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="10" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Createtime</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="updatetime" value="11"> Updatetime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="transfertime" value="12" checked="checked"> Transfertime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="13" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Operate</font>
                                                            </font>
                                                        </label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table table-striped table-bordered table-hover table-nowrap" style="overflow-x: scroll;">
                                                <table class="display" id="basic-1">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>User_id</th>
                                                            <th>Nickname</th>
                                                            <th>Phone Number</th>
                                                            <th>Invite Code</th>
                                                            <th>Money</th>
                                                            <th>Type</th>
                                                            <th>Account</th>
                                                            <th>Realname</th>
                                                            <th>Status</th>
                                                            <th>Createtime</th>
                                                            <th>Transfertime</th>
                                                            <th>Operate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>69887</td>
                                                            <td>787676</td>
                                                            <td>Edinburgh</td>
                                                            <td>9999999998</td>
                                                            <td>Great Zhou 34</td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td>
                                                                <a href="javascript:;" class="searchit" data-toggle="tooltip" title="" data-field="status" data-value="successed" data-original-title="Click to search Status successed"><span class="text-success"><i class="fa fa-circle"></i>
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">Status successed</font>
                                                                        </font>
                                                                    </span></a>
                                                            </td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="topline-top-rejected" role="tabpanel" aria-labelledby="topline-top-rejected-tab">
                                    
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
                                                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked"> Id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user_id" value="1" checked="checked"> User_id</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.nickname" value="2" checked="checked"> Nickname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.mobile" value="3" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Phone number</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="user.code" value="4" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Invite Code</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="money" value="5" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Money</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="type" value="6" checked="checked"> Type</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="account" value="7" checked="checked"> Account</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="name" value="8" checked="checked"> Realname</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="status" value="9" checked="checked"> Status</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="10" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Createtime</font>
                                                            </font>
                                                        </label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="updatetime" value="11"> Updatetime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="transfertime" value="12" checked="checked"> Transfertime</label></li>
                                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="13" checked="checked">
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">Operate</font>
                                                            </font>
                                                        </label></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table table-striped table-bordered table-hover table-nowrap" style="overflow-x: scroll;">
                                                <table class="display" id="basic-1">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>User_id</th>
                                                            <th>Nickname</th>
                                                            <th>Phone Number</th>
                                                            <th>Invite Code</th>
                                                            <th>Money</th>
                                                            <th>Type</th>
                                                            <th>Account</th>
                                                            <th>Realname</th>
                                                            <th>Status</th>
                                                            <th>Createtime</th>
                                                            <th>Transfertime</th>
                                                            <th>Operate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>69887</td>
                                                            <td>787676</td>
                                                            <td>Edinburgh</td>
                                                            <td>9999999998</td>
                                                            <td>Great Zhou 34</td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>Edinburgh</td>
                                                            <td>61</td>
                                                            <td>
                                                                <a href="javascript:;" class="searchit" data-toggle="tooltip" title="Click to search Status rejected" data-field="status" data-value="rejected"><span class="text-danger"><i class="fa fa-circle"></i> Status rejected</span></a>
                                                            </td>
                                                            <td>$320,800</td>
                                                            <td>Tiger Nixon</td>
                                                            <td>System Architect</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    @include('admin.partials.footer')