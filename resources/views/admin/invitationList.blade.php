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
              <form class="row g-3 needs-validation custom-input" novalidate="" method="post" id="userForm">

                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Invitation Code</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="invitation_code" placeholder="Invitation Code"
                    required="">
                </div>

                <div class="col-6 mt-5">
                  <button class="btn btn-primary" name="user_create" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="button" onclick="resetForm()">Reset</button>
                </div>

              </form>
              <script>
                function resetForm() {
                  document.getElementById("userForm").reset();
                }
              </script>
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

              <div class="btn-group">
                <button style="padding: 3px 10px 0px 13px; margin-right: 4px;" onclick="" class="btn btn-primary" type="button">
                  <i class="fa-solid fa-rotate"></i>
                </button>
              </div>
              <a class="btn btn-primary mx-auto " data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm-title1"><i class="fa-solid fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive custom-scrollbar ">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th><span class="f-light f-w-600"></span>ID</span></th>
                      <th><span class="f-light f-w-600"></span>Invitation Code</span></th>
                      <th><span class="f-light f-w-600"></span>User ID</span></th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <tr>
                      <td>1</td>
                      <td>1m8xtjwb9r</td>
                      <td>Honey Gola</td>
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
</script>