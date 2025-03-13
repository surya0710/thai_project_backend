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
                        <h3>lazada Product library</h3>
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
                            <form class="row g-3 needs-validation custom-input" novalidate="">

                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip02"> ID</label>
                                    <input class="form-control" id="validationTooltip02" type="text" placeholder="ID" required="">
                                </div>

                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip05">Name</label>
                                    <input class="form-control" id="validationTooltip05" type="text" placeholder="Name" required="">
                                </div>

                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="validationTooltip07">Price</label>
                                    <div class="row">
                                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                                                placeholder="Price" required=""></div>
                                        <div class="col-1 mt-2">-</div>
                                        <div class="col-5"> <input class="form-control" id="validationTooltip07" type="text"
                                                placeholder="Price" required=""></div>
                                    </div>

                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip08">Create Time</label>
                                    <input class="form-control" id="validationTooltip08" type="text" placeholder="Create Time"
                                        required="">
                                </div>

                                <div class="col-6 mt-5">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- table start  -->
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
                                        <label><input type="checkbox" class="exportField" value="Name" checked> Name</label>
                                        <label><input type="checkbox" class="exportField" value="Price" checked> Price</label>
                                        <label><input type="checkbox" class="exportField" value="Create Time" checked> Create Time</label>

                                    </div>

                                    <li><a class="dropdown-item" href="javascript:;" onclick="exportToExcel('basic-1')">Excel</a></li>
                                    <li><a class="dropdown-item" href="javascript:;" onclick="exportToCSV('basic-1')">CSV</a></li>
                                    <li><a class="dropdown-item" href="javascript:;" onclick="exportToPDF('basic-1')">PDF</a></li>
                                    <li><a class="dropdown-item" href="javascript:;" onclick="importCSV()">Import CSV</a></li>
                                </ul>
                            </div>

                            <!-- <div class="btn-group">
                                <button style="padding: 4px;" class=" dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table-cells"></i></button>
                                <ul class="dropdown-menu " role="menu">
                                    <li role="menuitem"><label><input type="checkbox" data-field="id" value="0" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Id</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="name" value="1" checked="checked"> Name</label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="price" value="2" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">price</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="image" value="3" checked="checked"> Image</label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="createtime" value="4" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Createtime</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="5" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Operate</font>
                                            </font>
                                        </label></li>
                                    <li role="menuitem"><label><input type="checkbox" data-field="operate" value="6" checked="checked">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Operate</font>
                                            </font>
                                        </label></li>
                                </ul>
                            </div> -->
                            <a class="btn btn-primary mx-auto " href="{{ route('lazada.add') }}"><i class="fa-solid fa-plus"></i></a>
                            <!-- <button class="btn btn-success" type="button"><i class="fa-solid fa-pen-to-square"></i> </button> -->
                            <!-- <button class="btn btn-secondary" type="button"><i class="fa-solid fa-trash-can"></i></button> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Create Time</th>
                                            <th>Operate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a href="javascript:">
                                                    <img style="height: 40px;" class="img-sm img-center" src="{{ asset('uploads/products/' . $product->image_path) }}">
                                                </a>
                                            </td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-danger btn-chooseone btn-xs">
                                                    <i class="fa fa-check"></i>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Choose</font>
                                                    </font>
                                                </a>
                                            </td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></li>
                                                    <li class="delete"><a href="#"><i class="fa-solid fa-trash-can"></i></a></li>
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
    <script>
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

        function exportToExcel(tableID, filename = 'Lazada_List') {
            let table = document.getElementById(tableID);
            filterTableBySelectedFields(table);
            let ws = XLSX.utils.table_to_sheet(table);
            let wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
            XLSX.writeFile(wb, `${filename}.xlsx`);
        }

        function exportToCSV(tableID, filename = 'Lazada_List') {
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

        function exportToPDF(tableID, filename = 'Lazada_List') {
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