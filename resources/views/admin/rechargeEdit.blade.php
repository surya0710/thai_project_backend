@include('admin.partials.header')
<div class="page-body-wrapper">
    <!-- Page Sidebar Ends-->
    @include('admin.partials.sidenav')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6 box-col-3">
                        <h3> Recharge Edit</h3>
                    </div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="https://users.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Recharge Users </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form theme-form" method="post">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input class="form-control" type="text" name="username" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" name="user_id" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Real Name</label>
                                            <input class="form-control" type="text" name="username" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Invite Code</label>
                                            <input class="form-control" type="text" placeholder="Name" name="name" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Recharge Image </label>
                                            <!-- <input class="form-control" type="text"  name="phone" value="" required> -->
                                            <a href="" target="_blank"><img src="" alt=" " style="width: 100%;"></a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="country">
                                               
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                <option value="pending">Pending </option>
                                                <option value="Approved">Approved </option>
                                                <option value="Frozon">Frozon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" name="users_create" class="btn btn-success me-3">Save Changes</button><a class="btn btn-danger" href="{{ route('recharge.list') }}">Cancel</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
    @include('admin.partials.footer')
    @include('admin.partials.popup')