@include('admin.partials.header')
<div class="page-body-wrapper">
    <!-- Page Sidebar Ends-->
    @include('admin.partials.sidenav')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6 box-col-3">
                        <h3> Withdrawal Edit</h3>
                    </div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="https://users.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Withdrawal Users </li>
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
                                            <label>User Id</label>
                                            <input class="form-control" type="text" placeholder="User Id*" name="user_id" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Username</label>
                                            <input class="form-control" type="text" placeholder="Username*" name="user_id" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Amount</label>
                                            <input class="form-control" type="text" placeholder="Amount*" name="username" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Invitation Code</label>
                                            <input class="form-control" type="text" placeholder="Invitation Code" name="name" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Account Holder Name</label>
                                            <input class="form-control" type="text" placeholder="Bank Account Holder Name" name="phone" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Name</label>
                                            <input class="form-control" type="text" placeholder="Bank Name" name="phone" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Account No. </label>
                                            <input class="form-control" type="text" placeholder="Bank Account No." name="email" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Branch Name </label>
                                            <input class="form-control" type="text" placeholder="Bank Branch Name" name="email" value="" required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <ul class="action">
                                            <li class="view me-2">
                                                <button type="button" class="btn btn-success">Approve</button>
                                            </li>
                                            <li class="view">
                                                <button type="button" class="btn btn-danger">Reject</button>
                                            </li>

                                        </ul>
                                    </div> -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="country">

                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option value="Complete">Complete </option>
                                                <option value="Pending">Pending </option>
                                                <option value="Frozon">Frozon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" name="users_create" class="btn btn-success me-3">Save Changes</button><a class="btn btn-danger" href="user-list.php">Cancel</a></div>
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