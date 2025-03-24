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
                     <h2 class="mb-3">Filters</h2>
                     <form class="row g-3 custom-input" action="{{ route('admin.filter') }}" method="post" id="adminForm">
                        @csrf
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip09">Admin User Type</label>
                           <select class="form-select" id="validationTooltip09" name="user_type">
                              <option selected="" disabled="" value="">Choose...</option>
                              <option value="Boss" @if(isset($filters['user_type']) && $filters['user_type'] == 'Boss') selected @endif >Boss</option>
                              <option value="Manager" @if(isset($filters['user_type']) && $filters['user_type'] == 'Manager') selected @endif>Manager</option>
                              <option value="Worker" @if(isset($filters['user_type']) && $filters['user_type'] == 'Worker') selected @endif>Worker </option>
                           </select>
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip02">Admin User Name</label>
                           <input class="form-control" id="validationTooltip02" name="username" type="text" placeholder="Admin User ID"
                              value="@if(isset($filters['username'])) {{ $filters['username'] }} @endif">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip03">Name</label>
                           <input class="form-control" id="validationTooltip03" name="name" type="text" placeholder="Name"
                              value="@if(isset($filters['name'])) {{ $filters['name'] }} @endif">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip04">Phone</label>
                           <input class="form-control" id="validationTooltip04" name="phone" type="tel" placeholder="Phone"
                              value="@if(isset($filters['phone'])) {{ $filters['phone'] }} @endif">
                        </div>
                        <div class="col-md-3 position-relative">
                           <label class="form-label" for="validationTooltip05">Email</label>
                           <input class="form-control" id="validationTooltip05" name="email" type="email" placeholder="Email"
                              value="@if(isset($filters['email'])) {{ $filters['email'] }} @endif">
                        </div>
                        <div class="col-6 mt-5">
                           <button class="btn btn-primary" type="submit" name="admin_create">Filter</button>
                           <a class="btn btn-secondary" href="{{ route('admin.list') }}" >Reset</a>
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
                     @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                     <div class="btn-group">
                        <a class="btn btn-primary mx-auto " href="{{ route('admin.add') }}"><i class="fa-solid fa-plus"></i></a>
                     </div>
                     @endif
                  </div>
                  <div class="card-body">
                     <div class="table-responsive custom-scrollbar">

                        <table id="myTable" class="table table-striped" style="width:100%">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Admin User ID</th>
                                 <th>Admin User Type</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>

                                 @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                 <th>Action</th>
                                 @endif
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
                                 @if(Auth::guard('admin')->user()->user_type !== 'Worker')
                                 <td>
                                    <ul class="action">
                                       @if(Auth::guard('admin')->user()->user_type == 'Manager' && $user->user_type == 'Worker')
                                       <li class="edit">
                                          <a href="{{ route('admin.edit', ['user_id' => $user->id]) }}"><i class="fa-solid fa-pencil"></i></a>
                                       </li>
                                       <li class="delete">
                                          <a title="Delete" data-name="{{ $user->name }}" data-id="{{ $user->id }}" onclick="handleDelete(event, this)" @if($user->id !== Auth::guard('admin')->user()->id) onclick="handleDelete(event, this)" @endif><i class="fa-solid fa-trash"></i></a>
                                       </li>
                                       @elseif(Auth::guard('admin')->user()->user_type == 'Boss')
                                       <li class="edit">
                                          <a href="{{ route('admin.edit', ['user_id' => $user->id]) }}"><i class="fa-solid fa-pencil"></i></a>
                                       </li>
                                       <li class="delete">
                                          <a title="Delete" data-name="{{ $user->name }}" data-id="{{ $user->id }}" @if($user->id !== Auth::guard('admin')->user()->id) onclick="handleDelete(event, this)" @endif><i class="fa-solid fa-trash"></i></a>
                                       </li>
                                       @endif
                                    </ul>
                                 </td>
                                 @endif
                              </tr>
                              @endforeach
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>ID</th>
                                 <th>Admin User ID</th>
                                 <th>Admin User Type</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>

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
</script>