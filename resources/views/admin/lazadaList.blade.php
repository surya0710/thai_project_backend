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
                        <h3>lazada Product library</h3>
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
                                    <label class="form-label" for="validationTooltip02"> ID</label>
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="ID" required="">
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip05">Name</label>
                                    <input class="form-control" id="validationTooltip05" type="text" placeholder="Name" required="">
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="validationTooltip07">Price</label>
                                    <div class="row">
                                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                                                placeholder="Price" required=""></div>
                                        <div class="col-1 mt-2">-</div>
                                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                                                placeholder="Price" required=""></div>
                                    </div>

                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip08">Create Time</label>
                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Create Time"
                                        required="">
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
        </div>

        <!-- table start  -->
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
                                <ul class="dropdown-menu " role="menu">
                                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Id</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="name" value="1" checked="checked"> Name</label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="price" value="2" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">price</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="image" value="3" checked="checked"> Image</label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="4" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Createtime</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="5" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Operate</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="6" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Operate</font>
                                            </font>
                                        </label></li>
                                </ul>
                            </div>
                            <a class="btn btn-primary mx-auto " href="{{ route('lazada.add') }}"><i class="fa-solid fa-plus"></i></a>
                            <button class="btn btn-success" type="button"><i class="fa-solid fa-pen-to-square"></i> </button>
                            <button class="btn btn-secondary" type="button"><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Create Time</th>
                                            <th>Operate</th>
                                            <th>Operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td><a href="javascript:"><img style="height: 40px;" class="img-sm img-center" src="https://img.bluksms.shop/aaa/8.png"></a></td>
                                            <td>2011/04/25</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-danger btn-chooseone btn-xs"><i class="fa fa-check"></i>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Choose</font>
                                                    </font>
                                                </a>
                                            </td>
                                            <td>
                                                <ul class="action">
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
        <!-- Container-fluid Ends-->
    </div>
    @include('admin.partials.footer')