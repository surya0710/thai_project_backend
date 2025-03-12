@include('admin.partials.header')
<div class="page-body-wrapper">
   <!-- Page Sidebar Ends-->
   @include('admin.partials.sidenav')
    <!-- Page Sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6 box-col-3">
                        <h3> Admin Add</h3>
                    </div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <i class="fa-solid fa-home"></i>
                                </a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Admin Add </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form theme-form" method="post" action="{{ route('admin.update',['user_id' => $user->id]) }}">
                                @csrf
                                <div class="row">
                                    <span class="text-danger error">
                                        @if (session()->has('error'))
                                            {{ session()->get('error') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 position-relative">
                                        <label class="form-label" for="validationTooltip09">Admin User Type</label>
                                        <select class="form-select" id="validationTooltip09" name="user_type" required="">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            <option value="Boss" {{ $user->user_type == 'Boss' ? 'selected' : '' }}>Boss</option>
                                            <option value="Manager" {{ $user->user_type == 'Manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="Worker" {{ $user->user_type == 'Worker' ? 'selected' : '' }}>Worker </option>
                                        </select>
                                        <span class="error text-danger">
                                            @error('user_type')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label class="form-label" for="validationTooltip02">Admin User ID</label>
                                        <input class="form-control" id="validationTooltip02" name="username" type="text" placeholder="Admin User ID"
                                            required="" value="{{ $user->username ?? old('username') }}">
                                        <span class="error text-danger">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label class="form-label" for="validationTooltip03">Name</label>
                                        <input class="form-control" id="validationTooltip03" name="name" type="text" placeholder="Name" required="" 
                                        value="{{ $user->name ?? old('name') }}">
                                        <span class="error text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label class="form-label" for="validationTooltip04">Phone</label>
                                        <input class="form-control" id="validationTooltip04" name="phone" type="tel" placeholder="Phone" required="" 
                                        value="{{ $user->phone ?? old('phone') }}">
                                        <span class="error text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label class="form-label" for="validationTooltip05">Email</label>
                                        <input class="form-control" id="validationTooltip05" name="email" type="email" placeholder="Email" required="" 
                                        value="{{ $user->email ?? old('email') }}">
                                        <span class="error text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                        <label class="form-label" for="validationTooltip06">Password </label>
                                        <input class="form-control" id="validationTooltip06" name="password" type="password" placeholder="Password">
                                        <span class="error text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" name="product_create" class="btn btn-success me-3">Save Changes</button><a class="btn btn-danger" href="{{ route('admin.list') }}">Cancel</a></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@include('admin.partials.footer')
<script>
   function handleDelete(event, element){
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
               url: "{{ route('user.delete') }}",
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