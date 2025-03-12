 <!-- check -->
 <div class="modal fade bd-example-modal-xl-check" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myLargeModalLabel">Check</h4>
                 <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body dark-modal">

                 <div class="row">
                     <div class="col-sm-12">
                         <div class="card">
                             <!-- <div class="card-header pb-0 card-no-border">
                    </div> -->
                             <div class="card-body">
                                 <table style="table-layout: fixed;">
                                     <tbody>
                                         <tr>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Phone number:</font>
                                                 </font>
                                             </th>
                                             <td><span name="phone"></span><a href="javascript:void(0)" id="changephone">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Revise</font>
                                                     </font>
                                                 </a>
                                             </td>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">account:</font>
                                                 </font>
                                             </th>
                                             <td><span name="loginAccount">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Alphz </font>
                                                     </font>
                                                 </span><a href="javascript:void(0)" id="changeLoginAccount">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Modification</font>
                                                     </font>
                                                 </a></td>
                                         </tr>
                                         <tr>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Registration time:</font>
                                                 </font>
                                             </th>
                                             <td name="time">2025-01-23 00:16:35</td>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Direct push superior ID:</font>
                                                 </font>
                                             </th>
                                             <td><a href="user/user/view/id/105133" name="directUser">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">105133</font>
                                                     </font>
                                                 </a></td>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Account Balance:</font>
                                                 </font>
                                             </th>
                                             <td><span name="money">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">0.00</font>
                                                     </font>
                                                 </span></td>
                                         </tr>
                                         <tr>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Password:</font>
                                                 </font>
                                             </th>
                                             <td>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">****** </font>
                                                 </font><a href="javascript:void(0)" id="changeLogin">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Revise</font>
                                                     </font>
                                                 </a>
                                             </td>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Payment password:</font>
                                                 </font>
                                             </th>
                                             <td>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">****** </font>
                                                 </font><a href="javascript:void(0)" id="changePay">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Revise</font>
                                                     </font>
                                                 </a>
                                             </td>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Total platform revenue:</font>
                                                 </font>
                                             </th>
                                             <td><span name="commission">2.13</span></td>
                                         </tr>
                                         <tr>
                                             <th style="white-space: nowrap;">
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Last login time:</font>
                                                 </font>
                                             </th>
                                             <td id="loginTime">2021-03-29 14:32:38</td>
                                             <th style="white-space: nowrap;"></th>
                                             <td id="device"></td>
                                         </tr>
                                         <tr>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Whether it meets the standard:</font>
                                                 </font>
                                             </th>
                                             <td id="isCompleted" colspan="5"></td>
                                         </tr>
                                         <tr>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">USDT Account:</font>
                                                 </font>
                                             </th>
                                             <td name="USDTAccount" colspan="5"></td>
                                         </tr>
                                         <tr>
                                             <th style="white-space: nowrap;">
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Withdrawal restrictions:</font>
                                                 </font>
                                             </th>
                                             <td colspan="3"><input type="text" class="form-control" placeholder="Prompt, cannot be empty" id="limitPoint" name="limitPoint" autocomplete="off"></td>
                                             <td colspan="2"><input id="c-switch" name="row[switch]" type="hidden" value="0">
                                                 <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c-switch" data-yes="1" data-no="0">
                                                     <i class="fa fa-toggle-on text-success  fa-2x"></i>
                                                 </a>
                                                 <!-- <input type="checkbox" id="checkboxInput">
                            <label for="checkboxInput" class="toggleSwitch">
                            </label> -->
                                                 <button class="btn btn-primary" onclick="changeLimit()">
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">keep</font>
                                                     </font>
                                                 </button>
                                             </td>
                                         </tr>
                                         <tr>
                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Disable updates</font>
                                                 </font>
                                             </th>
                                             <td>
                                                 <input id="c-switch" name="row[switch]" type="hidden" value="0">
                                                 <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c-switch" data-yes="1" data-no="0">
                                                     <i class="fa fa-toggle-on text-success  fa-2x"></i>
                                                 </a>
                                                 <!-- <input type="checkbox" id="checkboxInput">
                              <label for="checkboxInput" class="toggleSwitch">
                              </label> -->
                                             </td>

                                             <th>
                                                 <font style="vertical-align: inherit;">
                                                     <font style="vertical-align: inherit;">Do not reset order quantity</font>
                                                 </font>
                                             </th>
                                             <td><input id="c-switch" name="row[switch]" type="hidden" value="0">
                                                 <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c-switch" data-yes="1" data-no="0">
                                                     <i class="fa fa-toggle-on text-success  fa-2x"></i>
                                                 </a>
                                                 <!-- <input type="checkbox" id="checkboxInput">
                            <label for="checkboxInput" class="toggleSwitch">
                            </label> -->
                                             </td>

                                             <th></th>
                                             <td></td>
                                         </tr>

                                     </tbody>
                                 </table>

                                 <div class="box">
                                     <div class="box-body">
                                         <div class="eui-floor">
                                             <h3><span>
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Team Development</font>
                                                     </font>
                                                 </span></h3>
                                             <div class="report-main tabCon_baseInfo">
                                                 <table border="0" cellspacing="0" cellpadding="0" id="basicInfo" style="width: 100%;height: 100px">
                                                     <tbody>
                                                         <tr>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Number of generations:</font>
                                                                 </font>
                                                             </th>
                                                             <td><a href="javascript:void(0)" style="color: #3c8dbc;background: none;text-decoration: underline;" onclick="seeLevel(this,1)" name="pushCount1">
                                                                     <font style="vertical-align: inherit;">
                                                                         <font style="vertical-align: inherit;">0</font>
                                                                     </font>
                                                                 </a></td>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Second generation number:</font>
                                                                 </font>
                                                             </th>
                                                             <td><a href="javascript:void(0)" style="color: #3c8dbc;background: none;text-decoration: underline;" onclick="seeLevel(this,2)" name="pushCount2">
                                                                     <font style="vertical-align: inherit;">
                                                                         <font style="vertical-align: inherit;">0</font>
                                                                     </font>
                                                                 </a></td>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Number of three generations:</font>
                                                                 </font>
                                                             </th>
                                                             <td><a href="javascript:void(0)" style="color: #3c8dbc;background: none;text-decoration: underline;" onclick="seeLevel(this,3)" name="pushCount3">
                                                                     <font style="vertical-align: inherit;">
                                                                         <font style="vertical-align: inherit;">0</font>
                                                                     </font>
                                                                 </a></td>
                                                         </tr>
                                                         <tr>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Total Teams:</font>
                                                                 </font>
                                                             </th>
                                                             <td colspan="5"><a href="javascript:void(0)" style="color: #3c8dbc;background: none;text-decoration: underline;" onclick="seeLevel(this,5)" name="teamUserCount">
                                                                     <font style="vertical-align: inherit;">
                                                                         <font style="vertical-align: inherit;">0</font>
                                                                     </font>
                                                                 </a>
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <div class="eui-floor">
                                             <h3><span>
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Amount Statistics</font>
                                                     </font>
                                                 </span></h3>
                                             <div class="report-main tabCon_baseInfo">
                                                 <table border="0" cellspacing="0" cellpadding="0" style="width: 100%;height: 60px">
                                                     <tbody>
                                                         <tr>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Total recharge:</font>
                                                                 </font>
                                                             </th>
                                                             <td id="totalRechargeMoney">
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">0.00</font>
                                                                 </font>
                                                             </td>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Total withdrawals:</font>
                                                                 </font>
                                                             </th>
                                                             <td id="totalDrawMoney">
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">0.00</font>
                                                                 </font>
                                                             </td>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Total commission for order:</font>
                                                                 </font>
                                                             </th>
                                                             <td id="totalOrderCommission">
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">0.00</font>
                                                                 </font>
                                                             </td>
                                                             <th>
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">Total team commission:</font>
                                                                 </font>
                                                             </th>
                                                             <td id="totalTeamCommission">
                                                                 <font style="vertical-align: inherit;">
                                                                     <font style="vertical-align: inherit;">0.00</font>
                                                                 </font>
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <div class="eui-floor">
                                             <h5><span>
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Account Details</font>
                                                     </font>
                                                 </span>
                                                 <select id="accountSelect" class="form-control" style="width: 110px;height: 30px;margin-top: 3px;display: inline-block;margin-left: 10px;padding: 0 5px;">
                                                     <option value="">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">all</font>
                                                         </font>
                                                     </option>
                                                     <option value="1">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">activation</font>
                                                         </font>
                                                     </option>
                                                     <option value="2">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">top up</font>
                                                         </font>
                                                     </option>
                                                     <option value="3">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Withdrawal</font>
                                                         </font>
                                                     </option>
                                                     <option value="4">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Team Benefits</font>
                                                         </font>
                                                     </option>
                                                     <option value="5">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Transfer out</font>
                                                         </font>
                                                     </option>
                                                     <option value="6">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Withdrawal Fee</font>
                                                         </font>
                                                     </option>
                                                     <option value="7">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Transfer Fee</font>
                                                         </font>
                                                     </option>
                                                     <option value="8">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Activation Benefits</font>
                                                         </font>
                                                     </option>
                                                     <option value="9">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Transfer In</font>
                                                         </font>
                                                     </option>
                                                     <option value="10">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Brush order expenditure</font>
                                                         </font>
                                                     </option>
                                                     <option value="11">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Income from fake orders</font>
                                                         </font>
                                                     </option>
                                                     <option value="12">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Order freeze</font>
                                                         </font>
                                                     </option>
                                                     <option value="13">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Order unfreeze return</font>
                                                         </font>
                                                     </option>
                                                     <option value="14">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Add</font>
                                                         </font>
                                                     </option>
                                                     <option value="15">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Deductions</font>
                                                         </font>
                                                     </option>
                                                     <option value="16">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Transfer money into</font>
                                                         </font>
                                                     </option>
                                                     <option value="17">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Zero Money Benefits</font>
                                                         </font>
                                                     </option>
                                                     <option value="18">
                                                         <font style="vertical-align: inherit;">
                                                             <font style="vertical-align: inherit;">Zero Money Transfer</font>
                                                         </font>
                                                     </option>
                                                 </select>
                                             </h5>
                                         </div>

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
                                                 <ul class="dropdown-menu" role="menu">
                                                     <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked">
                                                             <font style="vertical-align: inherit;">
                                                                 <font style="vertical-align: inherit;">Time</font>
                                                             </font>
                                                         </label></li>
                                                     <li role="menuitem"><label><input type="checkbox" data-field="money" value="1" checked="checked">
                                                             <font style="vertical-align: inherit;">
                                                                 <font style="vertical-align: inherit;">Type</font>
                                                             </font>
                                                         </label></li>
                                                     <li role="menuitem"><label><input type="checkbox" data-field="user_id" value="2" checked="checked">
                                                             <font style="vertical-align: inherit;">
                                                                 <font style="vertical-align: inherit;">Corresponding orders</font>
                                                             </font>
                                                         </label></li>
                                                     <li role="menuitem"><label><input type="checkbox" data-field="user.mobile" value="3" checked="checked">
                                                             <font style="vertical-align: inherit;">
                                                                 <font style="vertical-align: inherit;">Amount</font>
                                                             </font>
                                                         </label></li>
                                                     <li role="menuitem"><label><input type="checkbox" data-field="user.username" value="4" checked="checked">
                                                             <font style="vertical-align: inherit;">
                                                                 <font style="vertical-align: inherit;">Available balance</font>
                                                             </font>
                                                         </label></li>

                                                 </ul>
                                             </div>
                                         </div>
                                         <div class="card-body">
                                             <div class="table table-striped table-bordered table-hover table-nowrap" width="100%">
                                                 <table class=" display" id="basic-1">
                                                     <thead>
                                                         <tr>
                                                             <th> Time</th>
                                                             <th>Type</th>
                                                             <th>Corresponding orders</th>
                                                             <th>Amount</th>
                                                             <th>Available balance</th>

                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         <tr>
                                                             <td>Tiger Nixon</td>
                                                             <td>System Architect</td>
                                                             <td>Edinburgh</td>
                                                             <td>9999999998</td>
                                                             <td>Great Zhou 34</td>

                                                         </tr>

                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         <div class="eui-floor">
                                             <h3><span>
                                                     <font style="vertical-align: inherit;">
                                                         <font style="vertical-align: inherit;">Matching order records</font>
                                                     </font>
                                                 </span></h3>
                                             <div class="report-main">
                                                 <table id="table2" class="table table-striped table-bordered table-hover table-nowrap" width="100%">

                                                 </table>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- /.box-body -->
                                 </div>

                             </div>

                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>

 <!-- Ordinary order -->
 <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="myLargeModalLabel">Order Record</h4>
                 <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body dark-modal">
                 <div class="card">
                     <div class="card-body">
                         <form class="row g-3 needs-validation custom-input" novalidate="">
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip01">ID</label>
                                 <input class="form-control" id="validationTooltip01" type="text" placeholder="ID"
                                     required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip02"> User ID</label>
                                 <input class="form-control" id="validationTooltip02" type="text" placeholder="User ID"
                                     required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip03">Senior Invitation code</label>
                                 <input class="form-control" id="validationTooltip03" type="text" placeholder="Senior Invitation code"
                                     required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip09">State</label>
                                 <input class="form-control" id="validationTooltip09" type="text" placeholder="State"
                                     required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip04">Type</label>
                                 <input class="form-control" id="validationTooltip04" type="text" placeholder="Type"
                                     required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip05">User.username</label>
                                 <input class="form-control" id="validationTooltip05" type="text" placeholder="User.username"
                                     required="">
                             </div>

                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip06">User.nickname </label>
                                 <input class="form-control" id="validationTooltip06" type="text"
                                     placeholder="User.nickname" required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip07">User Code</label>
                                 <input class="form-control" id="validationTooltip07" type="text" placeholder="user Code"
                                     required="">
                             </div>
                             <div class="col-md-3 position-relative">
                                 <label class="form-label" for="validationTooltip08">Createtime</label>
                                 <input class="form-control" id="validationTooltip08" type="text" placeholder="createtime"
                                     required="">
                             </div>

                             <div class="col-6 mt-5">
                                 <button class="btn btn-primary" type="submit">Submit</button>
                                 <button class="btn btn-primary" type="reset">Reset</button>
                             </div>

                         </form>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-sm-12">
                         <div class="card">
                             <!-- <div class="card-header pb-0 card-no-border">
                    </div> -->
                             <div class="card-body">
                                 <div class="table table-striped table-bordered table-hover table-nowrap" style="overflow-x: scroll;">
                                     <table class="display" id="basic-1">
                                         <thead>
                                             <tr>
                                                 <th>ID</th>
                                                 <th>User ID</th>
                                                 <th>Amount</th>
                                                 <th>Yongjin</th>
                                                 <th>Total order quantity</th>
                                                 <th>After N orders</th>
                                                 <th>Completed</th>
                                                 <th>state</th>
                                                 <th>Type</th>
                                                 <th>User.username</th>
                                                 <th>User.nickname</th>
                                                 <th>User.code</th>
                                                 <th>Createtime</th>
                                                 <th>Operate</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>Tiger Nixon</td>
                                                 <td>System Architect</td>
                                                 <td>Edinburgh</td>
                                                 <td>61</td>
                                                 <td>2011/04/25</td>
                                                 <td>$320,800</td>
                                                 <td>Tiger Nixon</td>
                                                 <td>System Architect</td>
                                                 <td>Edinburgh</td>
                                                 <td>System Architect</td>
                                                 <td>Edinburgh</td>
                                                 <td>61</td>
                                                 <td>2011/04/25</td>
                                                 <td>
                                                     <ul class="action">
                                                         <li>
                                                             <a class="badge badge-success mr-1" style="margin-right: 4px;">
                                                                 <i class="fa fa-plus"></i>
                                                                 <span class="lable">Matching Order</span>
                                                             </a>
                                                         </li>
                                                         <li class="view"><a class="badge badge-info mb-1" style="margin-right: 4px;">
                                                                 <i class="fa-regular fa-eye"></i>
                                                                 <span class="lable">View sub-order</span>
                                                             </a></li>

                                                         <li class="edit"> <a href="#"><i class="fa-solid fa-pen-to-square"></i></a></li>
                                                         <li class="delete"><a href="#"><i class="fa-solid fa-trash-can"></i></a></li>
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

 <!-- make an appointment -->
 <div class="modal fade" id="exampleModalpermission" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="modal-toggle-wrapper">
                     <h4>Matching Order</h4>
                     <div class="modal-img"> <img src="../assets/images/gif/online-shopping.gif" alt="online-shopping"></div>
                     <h3 class="text-sm-center">You have no Permission</h3>
                     <div class="">
                         <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Go Back</button>
                         <button class="btn btn-primary" type="button">Login First </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <!-- title popup -->
 <div class="modal fade bd-example-modal-sm-title1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="mySmallModalLabel">Add Invitation</h4>
                 <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="" class="theme-form" method="post">
                 <div class="modal-body dark-modal">


                     <label for="invitation_code" class="form-label">Invitation Code</label>
                     <input type="text" class="form-control" name="invitation_code" id="invitation_code">

                     <!-- <h5 class="">Generate Code</h5> -->
                     <button type="button" class="mt-3 btn btn-primary generate-code">Generate Code</button>
                     <div class="mt-2">
                         <div class="d-flex align-items-center">
                             <input type="text" class="form-control flex-grow-1" id="generated-code" readonly>
                             <button type="button" class="btn btn-secondary copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy"><i class="fa-regular fa-clipboard"></i></button>
                         </div>
                     </div>

                     <script>
                         const generateCode = document.querySelector('.generate-code');
                         const generatedCode = document.querySelector('#generated-code');
                         const invitationCode = document.querySelector('#invitation_code');

                         generateCode.addEventListener('click', () => {
                             const code = Math.random().toString(36).substring(2, 12);
                             generatedCode.value = code;
                             invitationCode.value = code;
                         });

                         //       const generateCode = document.querySelector('.generate-code');
                         //       const generatedCode = document.querySelector('#generated-code');
                         //       const copyCode = document.querySelector('.copy-code');

                         //       generateCode.addEventListener('click', () => {
                         //           const code = Math.random().toString(36).substring(2, 12);
                         //           generatedCode.value = code;
                         //       });

                         copyCode.addEventListener('click', () => {
                             navigator.clipboard.writeText(generatedCode.value);
                             copyCode.setAttribute('title', 'Copied!');
                             setTimeout(() => {
                                 copyCode.setAttribute('title', 'Copy');
                             }, 2000);
                         });
                     </script>

                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-primary" type="submit">Submit </button>
                     <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <div class="modal fade bd-example-modal-sm-title" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="mySmallModalLabel">Information</h4>
                 <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body dark-modal">

                 <h5 class="">Confirm the ban?</h5>

             </div>
             <div class="modal-footer">
                 <button class="btn btn-primary" type="button">Sure </button>
                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Prohibition of transactions -->
 <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="mySmallModalLabel">Information</h4>
                 <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body dark-modal">

                 <h5 class="">Are you sure to ban this user from trading?</h5>

             </div>
             <div class="modal-footer">
                 <button class="btn btn-primary" type="button">Sure </button>
                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Ban invitations -->
 <div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="mySmallModalLabel">Information</h4>
                 <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body dark-modal">

                 <h5 class="">Are you sure you want to ban user invitations?</h5>

             </div>
             <div class="modal-footer">
                 <button class="btn btn-primary" type="button">Sure </button>
                 <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>