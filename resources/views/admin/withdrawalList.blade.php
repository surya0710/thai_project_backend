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
                            <h2 class="mb-3">Filters</h2>
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
                                    <div class="card">
                                        <!-- <div class="card-header pb-0 card-no-border" style="height: 50px;"></div> -->
                                        <div class="card-body">
                                            <div class="table-responsive custom-scrollbar">
                                                <table table class="display nowrap" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Bank Name</th>
                                                            <th>Createtime</th>
                                                            <th>Transfertime</th>
                                                            <th>Managed By</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($withdrawalList as $withdrawal)
                                                        <tr>
                                                            <td>{{ $loop->index + 1}}</td>
                                                            <td>{{ $withdrawal->user['username']}}</td>
                                                            <td>${{ $withdrawal->amount}}</td>
                                                            <td>
                                                                @if($withdrawal->status === 0)
                                                                Pending
                                                                @elseif($withdrawal->status === 1)
                                                                Complete
                                                                @elseif($withdrawal->status === 2)
                                                                Rejected
                                                                @endif
                                                            </td>
                                                            <td>{{ $withdrawal->bankDetails['bank_name'] }}</td>
                                                            <td>{{ $withdrawal->created_at }}</td>
                                                            <td>{{ $withdrawal->updated_at }}</td>
                                                            <td>{{ $withdrawal->handledBy['name'] ?? 'N/A' }}</td>
                                                            <td>
                                                                <ul class="action">
                                                                    <li class="edit">
                                                                        <a href="{{ route('withdrawal.view', ['withdrawal_id' => $withdrawal->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                                                    </li>
                                                                    @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                                                    @if($withdrawal->status === 0)
                                                                    <li class="view me-2">
                                                                        <button type="button" data-user="{{ $withdrawal->user['username'] }}" data-amount="{{ $withdrawal->amount }}" data-id="{{ $withdrawal->id }}" data-event="approve" class="btn btn-success rechargeStatus">Approve</button>
                                                                    </li>
                                                                    <li class="view">
                                                                        <button type="button" data-user="{{ $withdrawal->user['username'] }}" data-amount="{{ $withdrawal->amount }}" data-id="{{ $withdrawal->id }}" data-event="reject" class="btn btn-danger rechargeStatus">Reject</button>
                                                                    </li>
                                                                    @endif
                                                                    @endif
                                                                </ul>
                                                            </td>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    @include('admin.partials.footer')
    @include('admin.partials.popup')
    <script>
        jQuery(document).ready(function() {
            $('.rechargeStatus').on("click", function(event) {
                event.preventDefault();

                var id = $(this).data("id");
                var amount = $(this).data("amount");
                var user = $(this).data("user");
                var action = $(this).data("event");

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to " + action + " this transaction of " + amount + " to " + user,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: `Yes, ${action} it!`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('admin.withdrawalStatus') }}",
                            type: "POST",
                            data: {
                                id: id,
                                event: action,
                                amount: amount,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.status === "success") {
                                    Swal.fire("Success!", `Transaction of $ ${amount} has been ${action} successfully to ${user}`).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    Swal.fire("Error!", response.message, "error");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                                Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                            },
                        });
                    }
                });
            });
        });
    </script>