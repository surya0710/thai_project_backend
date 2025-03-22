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
    <!-- Page Sidebar Ends-->
    <div class="page-body">
    <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6 box-col-3">
                        <h3> Luckydraw Edit</h3>
                    </div>
                    <div class="col-6 box-col-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">
                                    <i class="fa-solid fa-home"></i>
                                </a></li>
                            <li class="breadcrumb-item active">Luckydraw Edit </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>{{ $luckyDraw->user->name }}</h5>
                        </div>
                        <form class="form theme-form" method="post" action="{{  route('luckydraw.update', ['id' => $luckyDraw->id]) }}">
                            <div class="card-body">
                            
                                @csrf
                                <div class="row">
                                    <span class="text-danger error">
                                        @if (session()->has('error'))
                                        {{ session()->get('error') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="validationTooltip02">User Badge</label>
                                        <input type="text" class="form-control" readonly value="{{ $luckyDraw->user->badge ?? '' }}">
                                    </div>
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="validationTooltip01">Show At</label>
                                        <select class="form-select" id="validationTooltip01" name="show_at">
                                            <option selected="" disabled="" value="">Choose...</option>
                                            @for ($i = 1; $i <= 30; $i++)
                                            <option value="{{ $i }}" {{ $luckyDraw->show_at == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="validationTooltip01">Task Price</label>
                                        <input class="form-control" step="0.01" type="number" name="exceeding_amount" id="exceeding_amount" required value="{{ $luckyDraw->product->price ?? '' }}">
                                    </div>
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="validationTooltip01">Select Product</label>
                                        <div class="search-container">
                                            <input type="text" class="form-control" required data-id="" value="{{ $luckyDraw->product->name ?? '' }}" autocomplete="off" id="searchBox" placeholder="Search...">
                                            <div class="suggestions" id="suggestionBox"></div>
                                        </div>
                                        <input type="hidden" name="product_id" id="product_id" value="{{ $luckyDraw->product_id ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col">
                                    <div class="text-end"><button type="submit" name="product_create" class="btn btn-success me-3">Save Changes</button><a class="btn btn-danger" href="{{ route('admin.list') }}">Cancel</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
 @include('admin.partials.footer')
 <script>
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
        $('#product_id').val(id);  // Store ID in searchBox
        $('#suggestionBox').hide(); // Hide suggestions after selection
        $('#searchBox').blur();
    });
 </script>