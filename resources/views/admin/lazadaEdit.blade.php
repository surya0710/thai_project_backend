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
                        <h3> Lazada Product Library</h3>
                    </div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa-solid fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">Lazada Product Library </li>
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
                            <form class="form theme-form" method="post" action="{{  route('lazada.update',['product_id' => $product->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <span class="error text-danger">
                                        @if (session()->has('error'))
                                            {{ session()->get('error') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="Name*" name="name" required 
                                            value="{{ $product->name, old('name') }}">
                                            <span class="error text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Url</label>
                                            <input class="form-control" type="text" placeholder="Url*" name="url" required 
                                            value="{{ $product->url, old('url') }}">
                                            <span class="error text-danger">
                                                @error('url')
                                                    {{ $message }}  
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Price</label>
                                            <input class="form-control" type="text" placeholder="Price*" name="price" required 
                                            value="{{ $product->price, old('price') }}">
                                            <span class="error text-danger">
                                                @error('price')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <input class="form-control" type="file" placeholder="Image" name="image" value="{{ old('image') }}">
                                            <a href="{{ asset( $product->image_path) }}" target="_blank">
                                                <img src="{{ asset( $product->image_path) }}" alt="" width="100px">
                                            </a>
                                            <span class="error text-danger">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label>Content</label>
                                            <textarea class="form-control" type="text" placeholder="Description" name="description" required>{{ $product->description, old('description')}}</textarea>
                                            <span class="error text-danger">
                                                @error('description')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end"><button type="submit" name="product_create" class="btn btn-success me-3">Save Changes</button><a class="btn btn-danger" href="add-lazada-product-library.php">Cancel</a></div>
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