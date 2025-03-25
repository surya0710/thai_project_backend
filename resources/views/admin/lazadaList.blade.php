@include('admin.partials.header')

<style>
    .pagination svg {
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
                            <form class="row g-3 needs-validation custom-input" method="post" action="{{ route('lazada.filter') }}">
                                @csrf
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip05">Name</label>
                                    <input class="form-control" id="validationTooltip05" type="text" name="name" placeholder="Name"
                                    value="{{ isset($filters['name']) ? $filters['name'] : '' }}">
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="validationTooltip07">Price</label>
                                    <div class="row">
                                        <div class="col-5"> 
                                            <input class="form-control" id="validationTooltip07" type="number" step="0.01" name="price_start" 
                                            placeholder="Price Start" value="{{ isset($filters['price_start']) ? $filters['price_start'] : '' }}">
                                        </div>
                                        <div class="col-1 mt-2">-</div>
                                        <div class="col-5">
                                            <input class="form-control" id="validationTooltip07" type="number" step="0.01" name="price_end" 
                                            placeholder="Price End" value="{{ isset($filters['price_end']) ? $filters['price_end'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-5">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                    <a class="btn btn-primary" href="{{ route('lazada.list') }}">Reset</a>
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
                        @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                        <div class="card-header pb-0 card-no-border">
                            <div class="row">
                                <span class="text-success error"> {{ session()->get('success') }} </span>
                            </div>
                            <div class="btn-group">
                                <form action="{{ route('lazada.upload') }}" method="POST" class="d-flex ms-2" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" class="form-control me-2" name="csv_file" required>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                                <a class="btn btn-primary ms-2" href="{{ route('lazada.add') }}"><i class="fa-solid fa-plus"></i>Add Products</a>
                            </div>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive custom-scrollbar">
                                <table id="myTable" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Create Time</th>
                                            <!-- <th>Operate</th> -->
                                            @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                            <th>Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $loop->index }}">
                                                    <img style="height: 40px;" class="img-sm img-center" src="{{ asset( $product->image_path) }}">
                                                </a>

                                                <div class="modal fade" id="exampleModal_{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img style="width: 100%; height: 100%;" src="{{ asset( $product->image_path) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $product->created_at }}</td>
                                            <!-- <td>
                                                <a href="javascript:;" class="btn btn-danger btn-chooseone btn-xs">
                                                    <i class="fa fa-check"></i>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">Choose</font>
                                                    </font>
                                                </a>
                                            </td> -->
                                            @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"><a href="{{ route('lazada.edit', ['product_id' => $product->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a></li>
                                                    <li class="delete">
                                                        <a data-id="{{ $product->id }}" class="deleteProduct"><i class="fa-solid fa-trash-can"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Create Time</th>
                                            <!-- <th>Operate</th> -->
                                            @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                            <th>Actions</th>
                                            @endif
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