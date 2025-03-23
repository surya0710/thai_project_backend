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
                        <h3>Luckydraw List</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid default-dashboard">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-no-border pb-0"></div>
                        <div class="card-body">
                            <div class="tab-content" id="topline-tabContent">
                                <div class="tab-pane fade show active" id="topline-top-user" role="tabpanel" aria-labelledby="topline-top-user-tab">
                                    <div class="card">
                                        <!-- <div class="card-header pb-0 card-no-border" style="height: 50px;"></div> -->
                                        <div class="card-body">
                                            <div class="table-responsive custom-scrollbar">

                                                <table id="myTable" class="table table-striped" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Level</th>
                                                            <th>Task</th>
                                                            <th>Product Name</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                                            <th>Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($luckyDrawList as $list )
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $list->user['username'] }}</td>
                                                            <td>{{ $list->for_badge }}</td>
                                                            <td>{{ $list->show_at }}</td>
                                                            <td>{{ $list->product['name'] }}</td>
                                                            <td>{{ $list->product['price'] }}</td>
                                                            <td>{{ $list->status == 1 ? 'Completed' : 'Pending' }}</td>
                                                            @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                                            <td>
                                                                @if($list->status == 0)
                                                                <ul class="action">
                                                                    <li>
                                                                        <a href="{{ route('luckydraw.edit', ['id' => $list->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a data-id="{{ $list->id }}" class="deleteProduct"><i class="fa-solid fa-trash-can"></i></a>
                                                                    </li>
                                                                </ul>
                                                                @endif
                                                            </td>
                                                            @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Level</th>
                                                            <th>Task</th>
                                                            <th>Product Name</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                                            <th>Action</th>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    @include('admin.partials.footer')
    <script>
        $('.deleteProduct').click(function() {
            let id = $(this).data('id');
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
                        url: "{{ route('luckydraw.delete') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                location.reload();
                            }
                        }
                    });
                }
            })
        });
    </script>