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
                        <h3>Task History</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid default-dashboard">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0">
                            <h5><strong>{{ $user->username }} ({{  $user->badge }}) </strong> Task History</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="topline-tabContent">
                                <div class="tab-pane fade show active" id="topline-top-user" role="tabpanel" aria-labelledby="topline-top-user-tab">
                                    <div class="card">
                                        <!-- <div class="card-header pb-0 card-no-border" style="height: 50px;"></div> -->
                                        <div class="card-body">
                                            <div class="table-responsive custom-scrollbar">
                                                <table id="example" class="table table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Level</th>
                                                            <th>Task</th>
                                                            <th>Product Amount</th>
                                                            <th>Earned Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php  $count = count($tasks); @endphp
                                                        @foreach($tasks as $task)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $task->user['username'] }}</td>
                                                            <td>{{ $task->badge }}</td>
                                                            <td>{{ $count }}</td>
                                                            <td>{{ $task->product_amount }}</td>
                                                            <td>{{ $task->earned_amount }}</td>
                                                        </tr>
                                                        @php  $count--; @endphp
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Level</th>
                                                            <th>Task</th>
                                                            <th>Product Amount</th>
                                                            <th>Earned Amount</th>
                                                        </tr>
                                                    </tfoot>
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