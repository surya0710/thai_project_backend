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

              <div class="btn-group">
                <button style="padding: 3px 10px 0px 13px; margin-right: 4px;" onclick="" class="btn btn-primary" type="button">
                  <i class="fa-solid fa-rotate"></i>
                </button>
                <button style="padding: 4px;" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa-solid fa-share-from-square"></i></button>
                <ul class="dropdown-menu dropdown-block">
                  <div id="exportOptions">
                    <label><input type="checkbox" class="exportField" value="ID" checked> ID</label>
                    <label><input type="checkbox" class="exportField" value="User ID" checked> User ID</label>
                    <label><input type="checkbox" class="exportField" value="Invitation Code" checked> Invitation Code</label>
                    <label><input type="checkbox" class="exportField" value="Username" checked> Username</label>
                    <label><input type="checkbox" class="exportField" value="Name" checked> Name</label>
                    <label><input type="checkbox" class="exportField" value="Phone" checked> Phone</label>
                    <label><input type="checkbox" class="exportField" value="Email" checked> Email</label>
                    <label><input type="checkbox" class="exportField" value="Login Time" checked> Login Time</label>
                    <label><input type="checkbox" class="exportField" value="Registration Time" checked> Registration Time</label>
                    <label><input type="checkbox" class="exportField" value="Number of Orders" checked> Number of Orders</label>
                    <label><input type="checkbox" class="exportField" value="Money" checked> Money</label>
                    <label><input type="checkbox" class="exportField" value="Credit Permission" checked> Credit Permission</label>
                    <label><input type="checkbox" class="exportField" value="Country" checked> Country</label>

                  </div>

                  <li><a class="dropdown-item" href="javascript:;" onclick="exportToExcel('basic-1')">Excel</a></li>
                  <li><a class="dropdown-item" href="javascript:;" onclick="exportToCSV('basic-1')">CSV</a></li>
                  <li><a class="dropdown-item" href="javascript:;" onclick="exportToPDF('basic-1')">PDF</a></li>
                  <li><a class="dropdown-item" href="javascript:;" onclick="importCSV()">Import CSV</a></li>
                </ul>
              </div>
              <a class="btn btn-primary mx-auto " data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm-title1"><i class="fa-solid fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive custom-scrollbar ">
                <table class="display dataTable" id="basic-1" role="grid" aria-describedby="basic-1_info">
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
                      <th><span class="f-light f-w-600"></span>Registration Time</span></th>
                      <th><span class="f-light f-w-600"></span>Number of Orders</span></th>
                      <th><span class="f-light f-w-600"></span>Money</span></th>
                      <th><span class="f-light f-w-600"></span>Credit Permission</span></th>
                      <th><span class="f-light f-w-600"></span>Country</span></th>
                      <th><span class="f-light f-w-600"></span>Operate</span></th>
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
                      <td>
                        <input type="checkbox" name="credit_permission" data-user-id="{{ $user->id }}" id="checkboxInput" value="1"
                          {{ $user->credit_permission == 1 ? 'checked' : '' }}>
                        <label for="checkboxInput" class="toggleSwitch">
                        </label>
                      </td>
                      <!-- <td>61</td>
                      <td>2011/04/25</td> -->
                      <td>{{ $user->country }}</td>

                      <td>
                        <!-- <a class="badge badge-success mb-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl-check">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">check</span>
                        </a>
                        <a class="badge badge-primary mb-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Reset order grabbing</span>
                        </a>
                        <a class="badge badge-danger mb-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm-title">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">title</span>
                        </a> -->
                        <!-- <a class="badge badge-success mb-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-xl">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Ordinary order</span>
                        </a> -->

                        <!-- <a class="badge badge-secondary mb-1" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModalpermission">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">make an appointment</span>
                        </a> -->
                        <a class="badge badge-primary mb-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Prohibition of transactions</span>
                        </a>
                        <!-- <a class="badge badge-danger mb-1" data-bs-toggle="modal" data-bs-target=".bd-example-modal-sm1">
                          <i class="fa-solid fa-bars"></i>
                          <span class="lable">Ban invitations</span>
                        </a> -->
                      </td>
                      <td>
                        <ul class="action">
                          <li class="edit">
                            <a href="{{ route('user.edit') }}"><i class="fa-solid fa-eye"></i></a>
                          </li>
                          <li class="edit">
                            <a href="{{ route('user.edit') }}"><i class="fa-solid fa-pencil"></i></a>
                          </li>
                          <!-- <li class="delete">
                            <a data-name="{{ $user->name }}" data-id="{{  $user->id }}" onclick="handleDelete(event, this)"><i class="fa-solid fa-trash"></i></a>
                          </li> -->
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


  function getSelectedFields() {
    let selectedFields = [];
    document.querySelectorAll(".exportField:checked").forEach(checkbox => {
      selectedFields.push(checkbox.value);
    });
    return selectedFields;
  }

  function filterTableBySelectedFields(table) {
    let selectedFields = getSelectedFields();
    let headers = table.querySelectorAll("thead tr th");
    let columnsToKeep = [];

    headers.forEach((th, index) => {
      if (selectedFields.includes(th.innerText.trim())) {
        columnsToKeep.push(index);
      }
    });

    let rows = table.rows;
    for (let row of rows) {
      let cells = row.cells;
      for (let i = cells.length - 1; i >= 0; i--) {
        if (!columnsToKeep.includes(i)) {
          row.deleteCell(i);
        }
      }
    }
  }

  function exportToExcel(tableID, filename = 'User_List') {
    let table = document.getElementById(tableID);
    filterTableBySelectedFields(table);
    let ws = XLSX.utils.table_to_sheet(table);
    let wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
    XLSX.writeFile(wb, `${filename}.xlsx`);
  }

  function exportToCSV(tableID, filename = 'User_List') {
    let table = document.getElementById(tableID);
    filterTableBySelectedFields(table);
    let ws = XLSX.utils.table_to_sheet(table);
    let csv = XLSX.utils.sheet_to_csv(ws);
    let blob = new Blob([csv], {
      type: 'text/csv'
    });
    let link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = `${filename}.csv`;
    link.click();
  }

  function exportToPDF(tableID, filename = 'User_List') {
    const {
      jsPDF
    } = window.jspdf;
    let doc = new jsPDF();
    let table = document.getElementById(tableID);
    filterTableBySelectedFields(table);

    let rows = [];
    let headers = [];

    table.querySelectorAll("thead tr th").forEach(th => headers.push(th.innerText));
    table.querySelectorAll("tbody tr").forEach(tr => {
      let rowData = [];
      tr.querySelectorAll("td").forEach(td => rowData.push(td.innerText));
      rows.push(rowData);
    });

    doc.autoTable({
      head: [headers],
      body: rows,
      theme: 'grid'
    });
    doc.save(`${filename}.pdf`);
  }

  function importCSV() {
    let input = document.createElement('input');
    input.type = 'file';
    input.accept = '.csv';
    input.onchange = function(event) {
      let file = event.target.files[0];
      let reader = new FileReader();

      reader.onload = function(e) {
        let data = e.target.result;
        let workbook = XLSX.read(data, {
          type: 'binary'
        });
        let sheet = workbook.Sheets[workbook.SheetNames[0]];
        let jsonData = XLSX.utils.sheet_to_json(sheet);

        console.log("Parsed CSV Data:", jsonData);
      };
      reader.readAsBinaryString(file);
    };
    input.click();
  }
</script>