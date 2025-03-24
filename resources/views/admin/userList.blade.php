@include('admin.partials.header')
<style>
  .suggestions {
    position: absolute;
    width: 100%;
    background: white;
    border: 1px solid #ccc;
    border-top: none;
    max-height: 150px;
    overflow-y: auto;
    z-index: 10;
    display: none;
  }

  .suggestions div {
    padding: 10px;
    cursor: pointer;
  }

  .suggestions div:hover {
    background: #ddd;
  }
</style>
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
              <form class="row g-3 needs-validation custom-input" action="{{ route('user.filter') }}" method="post" id="userForm">
                @csrf
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Invitation Code</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="invitation_code" placeholder="Invitation Code" 
                  value=" @if(isset($filters['invitation_code'])) {{ $filters['invitation_code'] }} @endif">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Username</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="username" placeholder="Username" 
                  value=" @if(isset($filters['username'])) {{ $filters['username'] }} @endif">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Name</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="name" placeholder="Name"
                  value=" @if(isset($filters['name'])) {{ $filters['name'] }} @endif">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Email</label>
                  <input class="form-control" id="validationTooltip03" type="email" name="email" placeholder="Email"
                  value=" @if(isset($filters['email'])) {{ $filters['email'] }} @endif">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Phone</label>
                  <input class="form-control" id="validationTooltip03" type="text" name="phone" placeholder="Phone"
                  value=" @if(isset($filters['phone'])) {{ $filters['phone'] }} @endif">
                </div>
                <div class="col-md-3 position-relative">
                  <label class="form-label" for="validationTooltip03">Total Amount</label>
                  <input class="form-control" step="0.01" id="validationTooltip03" type="number" name="total_amount" placeholder="Amount"
                  value=" @if(isset($filters['total_amount'])) {{ $filters['total_amount'] }} @endif">
                </div>
                <div class="col-6 mt-5">
                  <button class="btn btn-primary" name="user_create" type="submit">Submit</button>
                  <a class="btn btn-secondary" href="{{ route('user.list') }}">Reset</a>
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
              <a class="btn btn-primary mx-auto " data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm-title1"><i class="fa-solid fa-plus"></i></a>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive custom-scrollbar ">



                <table id="myTable" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th><span class="f-light f-w-600"></span>ID</span></th>
                      <th><span class="f-light f-w-600"></span>User ID</span></th>
                      <th><span class="f-light f-w-600"></span>Invitation Code</span></th>
                      <th><span class="f-light f-w-600"></span>Username</span></th>
                      <th><span class="f-light f-w-600"></span>Name</span></th>
                      <th><span class="f-light f-w-600"></span>Phone</span></th>
                      <th><span class="f-light f-w-600"></span>Email</span></th>
                      <th><span class="f-light f-w-600"></span>Task History</span></th>
                      <th><span class="f-light f-w-600"></span>Created At</span></th>
                      <th><span class="f-light f-w-600"></span>No of Orders</span></th>
                      <th><span class="f-light f-w-600"></span>Total Amount</span></th>
                      <th><span class="f-light f-w-600"></span>View Luckydraw History</span></th>
                      @if(Auth::guard('admin')->user()->user_type == 'Boss')
                      <th><span class="f-light f-w-600"></span>Bank Details</span></th>
                      <th><span class="f-light f-w-600"></span>Credit Permission</span></th>
                      @endif
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
                      <td><a href="{{ route('user.taskHistory', ['user_id' => $user->id]) }}" class="btn btn-primary">Task History</a></td>
                      <td>{{ $user->created_at }}</td>
                      <td>{{ taskCountForUser($user->id, $user->badge) }}</td>
                      <td>{{ $user->total_amount }}</td>
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="{{ route('luckydraw.list', ['user_id' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a>
                          </li>
                        </ul>
                      </td>
                      @if(Auth::guard('admin')->user()->user_type == 'Boss')
                      <td><a href="{{ route('user.bankDetails', ['user_id' => $user->id]) }}" class="btn btn-primary">Bank Details</a></td>
                      <td>

                        <div class="form-check form-switch">
                          <select name="credit_permission_{{ $user->id }}" id="" onchange="updateCreditPermission({{ $user->id }}, this)">>
                            <option value="0" {{ $user->credit_permission == 0 ? 'selected' : '' }}>Denied </option>
                            <option value="1" {{ $user->credit_permission == 1 ? 'selected' : '' }}>Access</option>
                          </select>

                        </div>
                      </td>
                      @endif
                      @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                      <td>
                        @if(Auth::guard('admin')->user()->user_type == 'Boss')

                        @if($user->is_blocked == 1)
                        <button class="badge badge-success mb-1 userStatus" data-event="unblock" data-name="{{ $user->name }}" data-id="{{ $user->id }}">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Allow transactions</span>
                        </button>
                        @else
                        <button class="badge badge-primary mb-1 userStatus" id="credit_permission" data-event="block" data-name="{{ $user->name }}" data-id="{{ $user->id }}">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Prohibition of transactions</span>
                        </button>
                        @endif
                        <button class="badge badge-danger mb-1 " onclick="setLuckyDraw({{ $user->id }}, '{{ $user->badge }}', {{ taskCountForUser($user->id, $user->badge) }})" id="set_lucky_draw" data-event="block">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Set Lucky Draw</span>
                        </button>
                        @elseif(Auth::guard('admin')->user()->user_type == 'Manager')
                        <button class="badge badge-danger mb-1 " onclick="setLuckyDraw({{ $user->id }}, '{{ $user->badge }}', {{ taskCountForUser($user->id, $user->badge) }})" id="set_lucky_draw" data-event="block">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Set Lucky Draw</span>
                        </button>
                        @endif
                      </td>
                      @endif
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="{{ route('user.view', ['user_id' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a>
                          </li>
                          @if(Auth::guard('admin')->user()->user_type == 'Boss')
                          <li class="edit">
                            <a href="{{ route('user.edit', ['user_id' => $user->id]) }}"><i class="fa-solid fa-pencil"></i></a>
                          </li>
                          <li>
                            <a href="{{ route('reset.userTasks', ['user_id' => $user->id]) }}" class="btn btn-danger">Reset</a>
                          </li>
                          @endif
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><span class="f-light f-w-600"></span>ID</span></th>
                      <th><span class="f-light f-w-600"></span>User ID</span></th>
                      <th><span class="f-light f-w-600"></span>Invitation Code</span></th>
                      <th><span class="f-light f-w-600"></span>Username</span></th>
                      <th><span class="f-light f-w-600"></span>Name</span></th>
                      <th><span class="f-light f-w-600"></span>Phone</span></th>
                      <th><span class="f-light f-w-600"></span>Email</span></th>
                      <th><span class="f-light f-w-600"></span>Task History</span></th>
                      <th><span class="f-light f-w-600"></span>Created At</span></th>
                      <th><span class="f-light f-w-600"></span>No of Orders</span></th>
                      <th><span class="f-light f-w-600"></span>Total Amount</span></th>
                      <th><span class="f-light f-w-600"></span>View Luckydraw History</span></th>
                      @if(Auth::guard('admin')->user()->user_type == 'Boss')
                      <th><span class="f-light f-w-600"></span>Bank Details</span></th>
                      <th><span class="f-light f-w-600"></span>Credit Permission</span></th>
                      @endif
                      @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                      <th><span class="f-light f-w-600"></span>Operate</span></th>
                      @endif
                      <th><span class="f-light f-w-600"></span>Action</span></th>
                    </tr>
                  </tfoot>
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
<div class="modal fade bd-example-modal-sm-title1" id="setLuckyDraw" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">Set Lucky Draw</h4>
        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.setLuckyDraw') }}" class="theme-form" method="post">
        @csrf
        <div class="modal-body dark-modal">
          <input type="hidden" name="user_id" id="user_id" value="" required>
          <input type="text" class="form-control mb-3" name="for_badge" required id="userLevel" readonly>
          <label for="show_at" class="form-label">Show task at which level</label>
          <select name="show_at" id="show_at" class="form-control" required>
            @for($i = 1; $i <= 30; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
          <label for="exceeding_amount" class="form-label mt-3">Task Price</label>
          <input type="number" step="0.01" placeholder="0.00" class="form-control" name="exceeding_amount" id="exceeding_amount" required>
          <label for="select_product" class="form-label mt-3">Select Product</label>
          <div class="search-container">
            <input type="text" class="form-control" required data-id="" autocomplete="off" id="searchBox" placeholder="Search...">
            <div class="suggestions" id="suggestionBox"></div>
          </div>
          <input type="hidden" name="product_id" id="product_id">
          <button class="mt-3 btn btn-success" type="submit">Save</button>
        </div>
      </form>
    </div>
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

    $('#searchBox').on('focus', function() {
      let price = $('#exceeding_amount').val();
      $.ajax({
        url: `{{ route('fetchproducts') }}`,
        type: "POST",
        data: {
          _token: "{{ csrf_token() }}",
          price: price,
        },
        success: function(response) {
          let suggestionBox = $('#suggestionBox');
          suggestionBox.html(''); // Clear previous suggestions

          if (response.count > 0) {
            response.products.forEach(product => {
              suggestionBox.append(`
                        <div class="suggestion-item" data-id="${product.id}">
                          <img style="border-radius: 50%; width:50px" src="{{ asset('${product.image_path}') }}" alt="Product Image">
                          <span class="text">${product.name}</span> (${product.price})
                        </div>
                      `);
            });
            suggestionBox.show();
          } else {
            suggestionBox.hide();
          }
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        }
      });
    });

    $(document).on('click', '.suggestion-item', function() {
      let selectedProduct = $(this).find('.text').text();
      let id = $(this).data('id');
      $('#searchBox').val(selectedProduct); // Set value in search box
      $('#product_id').val(id); // Store ID in searchBox
      $('#suggestionBox').hide(); // Hide suggestions after selection
      $('#searchBox').blur();
    });

    function setLuckyDraw(userID, badge, taskCount) {
      $('#show_at').find('option').each(function() {
        if ($(this).val() <= taskCount) {
          $(this).attr('disabled', true);
        }
      });
      $('#show_at').find('option').each(function() {
        if ($(this).val() == taskCount + 1) {
          $(this).prop('selected', true);
        } else if ($(this).val() <= taskCount) {
          $(this).attr('disabled', true);
        }
      });

      $('#user_id').val(userID);
      $('#userLevel').val(badge);
      $('#setLuckyDraw').modal('show');
    }


    $(document).ready(function() {

      $('.userStatus').on('click', function() {
        var data = $(this).data();
        let url = `{{ route('user.status') }}`;

        Swal.fire({
          title: `Are you sure you want to ${data.event} ${data.name}?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, do it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: url,
              type: "POST",
              data: {
                _token: "{{ csrf_token() }}",
                id: data.id,
                event: data.event,
              },
              success: function(response) {
                if (response.status === 'success') {
                  location.reload();
                } else {
                  Swal.fire("Error!", response.message, "error");
                }
              },
              error: function(xhr) {
                Swal.fire("Error!", "Something went wrong. Please try again.", "error");
              }
            });
          }
        });
      });
    });
  </script>