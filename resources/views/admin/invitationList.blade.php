@include('admin.partials.header')
<div class="page-body-wrapper">
  <!-- Page Sidebar Ends-->
  @include('admin.partials.sidenav')
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-xl-4 col-sm-7 box-col-3">
            <h3>Invitation List</h3>
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
              <div class="row">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session()->get('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              </div>
              <form class="row g-3 custom-input" method="post" action="{{ route('invitation.store') }}">
                @csrf
                <div class="col-md-3 position-relative">
                  <label class="form-label">Invitation Code</label>
                  <input class="form-control" id="invite_code" type="text" name="invite_code" placeholder="Invitation Code" required="">
                  <span class="error">
                    @if ($errors->has('invite_code'))
                    {{ $errors->first('invite_code') }}
                    @endif
                  </span>
                </div>
                <div class="col-6 mt-5">
                  <button class="btn btn-secondary generate-code-form" type="button">Generate</button>
                  <button class="btn btn-primary" type="submit">Save</button>
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
              @if(Auth::guard('admin')->user()->user_type !== 'Worker')
              <div class="btn-group">
                <a class="btn btn-primary mx-auto " data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm-title1"><i class="fa-solid fa-plus"></i></a>
              </div>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive custom-scrollbar ">
                <table table class="display nowrap" id="myTable">
                  <thead>
                    <tr>
                      <th><span class="f-light f-w-600"></span>ID</span></th>
                      <th><span class="f-light f-w-600"></span>Invitation Code</span></th>
                      <th><span class="f-light f-w-600"></span>Create By</span></th>
                      <th><span class="f-light f-w-600"></span>Used By</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($invitationList as $inviteCode)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $inviteCode->code }}</td>
                      <td>{{ $inviteCode->user['username'] }}</td>
                      <td>{{ $inviteCode->usedBy['username'] ?? 'N/A' }}</td>
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
    <!-- Container-fluid Ends-->
  </div>
  @include('admin.partials.footer')
  @include('admin.partials.popup')
</div>
<script>
  $("#checkboxInput").change(function() {
    let isChecked = $(this).is(":checked") ? 1 : 0;
    let userID = $(this).data('user-id');
    let url = "{{ route('user.creditPermissionUpdate', ':user_id') }}".replace(':user_id', userID);
    $.ajax({
      url: url,
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        credit_permission: isChecked
      },
      success: function(response) {
        if (response.status === 'success') {
          Swal.fire(
            "Updated!",
            `Credit Permission Updated`,
            "success"
          );
        } else {
          Swal.fire(
            "Error!",
            `${response.message}`,
            "error"
          );
        }
      },
      error: function(xhr) {
        Swal.fire(
          "Error!",
          "Something went wrong. Please try again.",
          "error"
        );
      },
      error: function(xhr) {
        console.error("Error:", xhr);
        alert("Failed to update credit permission!");
      }
    });
  });

  $('.generate-code-form').click(function() {
    const alphaNum = '0123456789abcdefghijklmnopqrstuvwxyz';
    let code = '';
    for (let i = 0; i < 10; i++) {
      if (i % 2 === 0) {
        code += alphaNum[Math.floor(Math.random() * 10)];
      } else {
        code += alphaNum[Math.floor(Math.random() * 26) + 10];
      }
    }
    $('#invite_code').val(code);
  });
</script>