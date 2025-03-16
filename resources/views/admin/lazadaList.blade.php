@include('admin.partials.header')
<style>
    .pagination svg{
        width: 15px
    }
</style>
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
                        <h2 class="mb-3">Filters</h2>
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
                                    <button class="btn btn-primary" type="submit">Filter</button>
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
                                <form action="{{ route('lazada.upload') }}" method="POST" class="d-flex ms-2" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control me-2" accept=".csv" name="csv_file" required>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                                <a class="btn btn-primary mx-auto ms-2" href="{{ route('lazada.add') }}"><i class="fa-solid fa-plus"></i>Add Products</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table class="display nowrap" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Create Time</th>
                                            <th>Operate</th>
                                            <th>Actions</th>
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
                                                    <img style="height: 40px;" class="img-sm img-center" src="{{ asset( $product->image_path) }}">
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
                                                    <li class="edit"><a href="{{ route('lazada.edit', ['product_id' => $product->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></li>
                                                    <li class="delete">
                                                        <a data-id="{{ $product->id }}" class="deleteProduct"><i class="fa-solid fa-trash-can"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- Pagination Links -->
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
    $(document).on('click', '.deleteProduct', function(event) {
        event.preventDefault();
        let productId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('lazada.delete') }}",
                    type: "POST",
                    data: {
                        id: productId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            Swal.fire(
                                "Deleted!",
                                `Product has been deleted.`,
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
    });
</script>