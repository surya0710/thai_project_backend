@include('admin.partials.header')
<div class="page-body-wrapper">
   <!-- Page Sidebar Ends-->
   @include('admin.partials.sidenav')
   <div class="page-body">
      <div class="container-fluid">
         <div class="page-title">
            <div class="row">
               <div class="col-xl-4 col-sm-7 box-col-3">
                  <h3>Admin List</h3>
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
                     <form class="row g-3 custom-input" novalidate="" method="post" id="adminForm">
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip09">Admin User Type</label>
                           <select class="form-select" id="validationTooltip09" name="user_type" required="">
                              <option selected="" disabled="" value="">Choose...</option>
                              <option value="Boss">Boss</option>
                              <option value="Manager">Manager</option>
                              <option value="Worker">Worker </option>
                           </select>
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip02">Admin User ID</label>
                           <input class="form-control" id="validationTooltip02" name="admin_user_id" type="text" placeholder="Admin User ID"
                              required="">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip03">Name</label>
                           <input class="form-control" id="validationTooltip03" name="name" type="text" placeholder="Name"
                              required="">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip04">Phone</label>
                           <input class="form-control" id="validationTooltip04" name="phone" type="tel" placeholder="Phone"
                              required="">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip05">Email</label>
                           <input class="form-control" id="validationTooltip05" name="email" type="email" placeholder="Email"
                              required="">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip06">Password </label>
                           <input class="form-control" id="validationTooltip06" name="password" type="text" placeholder="Password" required="">
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
                     <div class="row">
                        <span class="text-success error"> {{ session()->get('success') }} </span>
                     </div>
                     <div class="btn-group">
                        <button style="padding: 3px 10px 0px 13px; margin-right: 4px;" class="btn btn-primary " type="button"><i class="fa-solid fa-rotate"></i></button>

                        <button style="padding: 4px;" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                              class="fa-solid fa-share-from-square"></i></button>
                        <ul class="dropdown-menu dropdown-block">
                           <div id="exportOptions">
                              <label><input type="checkbox" class="exportField" value="ID" checked> ID</label>
                              <label><input type="checkbox" class="exportField" value="Admin User ID" checked> Admin User ID</label>
                              <label><input type="checkbox" class="exportField" value="Admin User Type" checked> Admin User Type</label>
                              <label><input type="checkbox" class="exportField" value="Name" checked> Name</label>
                              <label><input type="checkbox" class="exportField" value="Email" checked> Email</label>
                              <label><input type="checkbox" class="exportField" value="Phone" checked> Phone</label>
                           </div>
                           <!-- <button onclick="exportToExcel('basic-1')">Export Excel</button>
                           <button onclick="exportToCSV('basic-1')">Export CSV</button>
                           <button onclick="exportToPDF('basic-1')">Export PDF</button> -->

                           <li><a class="dropdown-item" href="javascript:;" onclick="exportToExcel('basic-1')">Excel</a></li>
                           <li><a class="dropdown-item" href="javascript:;" onclick="exportToCSV('basic-1')">CSV</a></li>
                           <li><a class="dropdown-item" href="javascript:;" onclick="exportToPDF('basic-1')">PDF</a></li>
                           <li><a class="dropdown-item" href="javascript:;" onclick="importCSV()">Import CSV</a></li>
                        </ul>
                        <a class="btn btn-primary mx-auto " href="{{ route('admin.add') }}"><i class="fa-solid fa-plus"></i></a>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive custom-scrollbar">
                        <table class="display dataTable no-footer" id="basic-1" role="grid" aria-describedby="basic-1_info">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Admin User ID</th>
                                 <th>Admin User Type</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($users as $user)
                              <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ $user->username }}</td>
                                 <td>{{ $user->user_type }}</td>
                                 <td>{{ $user->name }}</td>
                                 <td>{{ $user->email }}</td>
                                 <td>{{ $user->phone }}</td>
                                 <td>
                                    <ul class="action">
                                       <li class="edit">
                                          <a href="{{ route('admin.edit', ['user_id' => $user->id]) }}"><i class="fa-solid fa-pencil"></i></a>
                                       </li>
                                       <li class="delete">
                                          <a title="Delete" data-name="{{ $user->name }}" data-id="{{  $user->id }}" onclick="handleDelete(event, this)"><i class="fa-solid fa-trash"></i></a>
                                       </li>
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
      <!-- Container-fluid Ends-->
   </div>
   @include('admin.partials.footer')
</div>

<script>
   function handleDelete(event, element) {
      event.preventDefault();
      const userId = element.getAttribute("data-id");
      const userName = element.getAttribute("data-name");

      Swal.fire({
         title: "Are you sure?",
         text: `You are about to delete user ${userName}`,
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#d33",
         cancelButtonColor: "#3085d6",
         confirmButtonText: "Yes, delete it!"
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               url: "{{ route('admin.delete') }}",
               type: "POST",
               data: {
                  id: userId,
                  _token: "{{ csrf_token() }}"
               },
               success: function(response) {
                  console.log(response);
                  if (response.status === 'success') {
                     Swal.fire(
                        "Deleted!",
                        `User ${userName} has been deleted.`,
                        "success"
                     ).then(() => {
                        location.reload();
                     });
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
               }
            });
         }
      });
   }

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

   function exportToExcel(tableID, filename = 'Admin_List') {
      let table = document.getElementById(tableID);
      filterTableBySelectedFields(table);
      let ws = XLSX.utils.table_to_sheet(table);
      let wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
      XLSX.writeFile(wb, `${filename}.xlsx`);
   }

   function exportToCSV(tableID, filename = 'Admin_List') {
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

   function exportToPDF(tableID, filename = 'Admin_List') {
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