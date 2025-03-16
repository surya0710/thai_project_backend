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
                                            <label>Username</label>
                                            <input class="form-control" type="text" placeholder="Username*" name="user_id" value="{{ $withdrawal->user['username'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Amount</label>
                                            <input class="form-control" type="text" placeholder="Amount*" name="username" value="{{ $withdrawal->amount}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Name</label>
                                            <input class="form-control" type="text" placeholder="Bank Name" value="{{ $withdrawal->bankDetails['bank_name'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Account Holder Name</label>
                                            <input class="form-control" type="text" placeholder="Bank Account Holder Name" value="{{ $withdrawal->bankDetails['account_holder_name'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Account No. </label>
                                            <input class="form-control" type="text" placeholder="Bank Account No." value="{{ $withdrawal->bankDetails['account_number'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Bank Branch Name </label>
                                            <input class="form-control" type="text" placeholder="Bank Branch Name" name="email" value="{{ $withdrawal->bankDetails['bank_branch'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <p>@if($withdrawal->status === 0)
                                                Pending
                                            @elseif($withdrawal->status === 1)
                                                Complete
                                            @elseif($withdrawal->status === 2)
                                                Rejected
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Date & Time</label>
                                            <p>{{ $withdrawal->created_at }} </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Handled By</label>
                                            <p>{{ $withdrawal->handledBy['name'] ?? 'N/A' }} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="action">
                                        @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                            @if($withdrawal->status === 0)
                                            <li class="view me-2">
                                                <button type="button" data-user="{{ $withdrawal->user['username'] }}" data-amount="{{ $withdrawal->amount }}" data-id="{{ $withdrawal->id }}" data-event="approve" class="btn btn-success rechargeStatus">Approve</button>
                                            </li>
                                            <li class="view me-2">
                                                <button type="button" data-user="{{ $withdrawal->user['username'] }}" data-amount="{{ $withdrawal->amount }}" data-id="{{ $withdrawal->id }}" data-event="reject" class="btn btn-danger rechargeStatus">Reject</button>
                                            </li>
                                            @endif
                                            @endif
                                            <li class="view">
                                                <a href="{{ route('withdrawal.list') }}" class="btn btn-primary">Go back</a>
                                            </li>
                                        </ul>
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
    <script>
        jQuery(document).ready(function () {
            $('.rechargeStatus').on("click", function (event) {
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
                    success: function (response) {
                        console.log(response);
                        if (response.status === "success") {
                        Swal.fire("Success!", `Transaction of $ ${amount} has been ${action} successfully to ${user}`).then(() => {
                            location.reload();
                        });
                        } else {
                        Swal.fire("Error!", response.message, "error");
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(error);
                        Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                    },
                    });
                }
                });
            });
        });
    </script>