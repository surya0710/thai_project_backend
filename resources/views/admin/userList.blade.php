@include('admin.partials.header')
<div class="page-body-wrapper">
  <!-- Page Sidebar Ends-->
  @include('admin.partials.sidenav')
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-xl-4 col-sm-7 box-col-3">
            <h3>User List</h3>
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
              <form class="row g-3 needs-validation custom-input" novalidate="" method="post" id="userForm">

                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Invitation Code</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="invitation_code" placeholder="Invitation Code"
                    required="">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">User Id</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="user_id" placeholder="User Id"
                    required="">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Username</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="username" placeholder="Username"
                    required="">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Email</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="email" placeholder="Email"
                    required="">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Phone</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="phone" placeholder="Phone"
                    required="">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Login Date</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="login_date" placeholder="Login Date"
                    required="">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip09">Country</label>
                  <select class="form-select" id="validationTooltip09" name="country" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="U.S">U.S </option>
                    <option value="Thailand">Thailand </option>
                    <option value="India">India </option>
                    <option value="U.K">U.K</option>
                  </select>

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
              @if(Auth::guard('admin')->user()->user_type !== 'Worker')
              <a class="btn btn-primary mx-auto " data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm-title1"><i class="fa-solid fa-plus"></i></a>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive custom-scrollbar ">
                <table table class="display nowrap" id="myTable">
                  <thead>
                    <tr>
                      <th><span class="f-light f-w-600"></span>ID</span></th>
                      <th><span class="f-light f-w-600"></span>User ID</span></th>
                      <th><span class="f-light f-w-600"></span>Invitation Code</span></th>
                      <th><span class="f-light f-w-600"></span>Username</span></th>
                      <th><span class="f-light f-w-600"></span>Name</span></th>
                      <th><span class="f-light f-w-600"></span>Phone</span></th>
                      <th><span class="f-light f-w-600"></span>Email</span></th>
                      <th><span class="f-light f-w-600"></span>Login Time</span></th>
                      <th><span class="f-light f-w-600"></span>Created At</span></th>
                      <th><span class="f-light f-w-600"></span>No of Orders</span></th>
                      <th><span class="f-light f-w-600"></span>Total Amount</span></th>
                      @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                      <th><span class="f-light f-w-600"></span>Credit Permission</span></th>
                      @endif
                      <th><span class="f-light f-w-600"></span>Country</span></th>
                      @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                      <th><span class="f-light f-w-600"></span>Operate</span></th>
                      @endif
                      <th><span class="f-light f-w-600"></span>Action</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $user->uuid }}</td>
                      <td>{{ $user->invitation_code }}</td>
                      <td>{{ $user->username }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->lastLogin['created_at'] ?? 'N/A' }}</td>
                      <td>{{ $user->created_at }}</td>
                      <td>60</td>
                      <td>{{ $user->total_amount }}</td>
                      @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                      <td>

                        <div class="form-check form-switch">
                          <select name="credit_permission_{{ $user->id }}" id="" onchange="updateCreditPermission({{ $user->id }}, this)">>
                            <option value="0" {{ $user->credit_permission == 0 ? 'selected' : '' }}>Denied </option>
                            <option value="1" {{ $user->credit_permission == 1 ? 'selected' : '' }}>Access</option>
                          </select>
                        
                        </div>
                      </td>
                        <!-- <input type="checkbox" class="form-check-input" id="toggleSwitch-{{ $user->id }}" data-user-id="{{ $user->id }}"
                            {{ $user->credit_permission == 1 ? 'checked' : '' }}
                            onchange="updateCreditPermission({{ $user->id }})">
                          <label class="form-check-label" for="toggleSwitch-{{ $user->id }}"></label> -->
                      @endif
                      <td>{{ $user->country }}</td>
                      @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                      <td>
                        @if($user->is_blocked == 1)
                        <button class="badge badge-success mb-1" data-event="unblock" data-name="{{ $user->name }}" data-id="{{ $user->id }}">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Allow transactions</span>
                        </button>
                        @else
                        <button class="badge badge-primary mb-1" data-event="block" data-name="{{ $user->name }}" data-id="{{ $user->id }}">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Prohibition of transactions</span>
                        </button>
                        @endif
                      </td>
                      @endif
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="{{ route('user.view', ['user_id' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a>
                          </li>
                          @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                          <li class="edit">
                            <a href="{{ route('user.edit', ['user_id' => $user->id]) }}"><i class="fa-solid fa-pencil"></i></a>
                          </li>
                          @endif
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                    @if($users->count() == 0)
                    <tr>
                      <td colspan="15" class="text-center">No data found</td>
                    </tr>
                    @endif
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
</div>
<script>
  function updateCreditPermission(userID) {
    let isChecked = $('select[name="credit_permission_' + userID + '"]').val();

    let url = "{{ route('user.creditPermissionUpdate', ':user_id') }}".replace(':user_id', userID);
    $.ajax({
      url: url,
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        credit_permission: isChecked,
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
  }
</script>