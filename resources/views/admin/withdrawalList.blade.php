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
        <div class="container-fluid default-dashboard">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <form class="row g-3 needs-validation custom-input" novalidate="">
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip01">User Id</label>
                                    <input class="form-control" id="validationTooltip01" type="text" placeholder="User Id"
                                        required="">
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip02">Username</label>
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="Username"
                                        required="">
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip03">Invitation code</label>
                                    <input class="form-control" id="validationTooltip03" type="text" placeholder="Invitation code"
                                        required="">
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip04">Amount</label>
                                    <input class="form-control" id="validationTooltip04" type="text" placeholder="Amount"
                                        required="">
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip05">Bank Name</label>
                                    <input class="form-control" id="validationTooltip05" type="text" placeholder="Bank Name"
                                        required="">
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip09">Status</label>
                                    <select class="form-select" id="validationTooltip09" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option value="Complete">Complete </option>
                                        <option value="Pending">Pending </option>
                                        <option value="Frozon">Frozon</option>
                                    </select>

                                </div>
                                <div class="col-6 mt-5">
                                    <button class="btn btn-primary" name="filter" type="submit">Submit</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid default-dashboard">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">

                        </div>
                        <div class="card-body">
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
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive custom-scrollbar">
                                                <table class="display" id="basic-1">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>User_id</th>
                                                            <th>Username</th>
                                                            <th>Invitation Code</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Bank Name</th>
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
                                                            <td>$320,800</td>
                                                            <td>Complete</td>
                                                            <td>Edinburgh</td>
                                                            <td>Edinburgh11</td>
                                                            <td>$320,800</td>
                                                            <td>
                                                                <ul class="action">
                                                                    <li class="edit">
                                                                        <a href="{{ route('withdrawal.edit') }}"><i class="fa-solid fa-eye"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
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