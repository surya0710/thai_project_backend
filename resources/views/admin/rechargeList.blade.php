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
    <div class="container-fluid default-dashboard">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">

            <div class="card-body">
              <form class="row g-3 custom-input" novalidate="" method="post" id="adminForm">
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip09">Status</label>
                  <select class="form-select" id="validationTooltip09" name="user_type" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="Approve">Approve</option>
                    <option value="Reject">Reject </option>
                  </select>
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip02">User ID</label>
                  <input class="form-control" id="validationTooltip02" name="ser_id" type="text" placeholder="User ID"
                    required="">
                </div>

                <div class="col-6 mt-5">
                  <button class="btn btn-primary" type="submit" name="admin_create">Submit</button>
                  <button class="btn btn-secondary" type="button" onclick="resetForm()">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0 card-no-border">
              <div class="card-body">
                <div class="table-responsive custom-scrollbar">
                  <table table class="display nowrap" id="myTable">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Name</th>
                        <th>Recharge Proof</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Approved By</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rechargeList as $recharge)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $recharge->amount }}</td>
                        <td>{{ $recharge->user['username'] ?? 'N/A' }}</td>
                        <td>{{ $recharge->user['phone'] ?? 'N/A' }}</td>
                        <td>{{ $recharge->user['name'] ?? 'N/A' }}</td>
                        <td><a href="{{ asset('uploads/recharge/' . $recharge->recharge_proof) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset('uploads/recharge/' . $recharge->recharge_proof) }}" style="width:100px" /></a></td>
                        <td>{{ $recharge->created_at }}</td>
                        <td>
                          @if($recharge->status == 0)
                            Pending
                          @elseif($recharge->status == 1)
                            Approved
                          @elseif($recharge->status == 2)
                            Rejected
                          @endif
                        </td>
                        <td>{{ $recharge->approver['username'] ?? 'N/A' }}</td>
                        <td>
                          @if($recharge->status == 0)
                          <ul class="action">
                            <li class="view me-2">
                              <button type="button" data-id="{{ $recharge->id }}" data-event="approve" class="btn btn-success rechargeStatus">Approve</button>
                            </li>
                            <li class="view">
                              <button type="button" data-id="{{ $recharge->id }}" data-event="reject" class="btn btn-danger rechargeStatus">Reject</button>
                            </li>
                          </ul>
                          @endif
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
  @include('admin.partials.footer')
  <script>
    jQuery(document).ready(function () {
      $('.rechargeStatus').on("click", function (event) {
        event.preventDefault();

        var id = $(this).data("id");
        var action = $(this).data("event");

        Swal.fire({
          title: "Are you sure?",
          text: "You want to " + action + " this transaction",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: `Yes, ${action} it!`,
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "{{ route('admin.rechargeStatus') }}",
              type: "POST",
              data: {
                id: id,
                event: action,
                _token: "{{ csrf_token() }}",
              },
              success: function (response) {
                console.log(response);
                if (response.status === "success") {
                  Swal.fire("Success!", `Transaction has been ${action}.`, "success").then(() => {
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
  