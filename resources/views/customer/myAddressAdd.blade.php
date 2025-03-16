@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
          <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Add Address</h5>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="card mt-20">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('address.store') }}">
                        @csrf
                        <fieldset class="mt-20 input-line">
                            <label>Contact name</label>
                            <input type="text" placeholder="" name="contact_name" value="{{ $address->contact_name ?? $userData->name }}" required class="form-control">
                            <span class="error text-danger">
                                @error('contact_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                        
                        <fieldset class="mt-26 input-line">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="" name="contact_number" value="{{ $address->contact_number ?? $userData->phone }}" required class="form-control">
                            <span class="error text-danger">
                                @error('contact_number')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                        <fieldset class="mt-20 input-line">
                            <label>Location</label>
                            <input type="text" placeholder="" name="location" value="{{ $address->location ?? old('location') }}" required class="form-control">
                            <span class="error text-danger">
                                @error('location')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                        <fieldset class="mt-20 input-line">
                            <label>Detailed Address</label>
                            <input type="text" class="form-control" value="{{ $address->detailed_address ?? old('detailed_address') }}" name="detailed_address" required>
                            <span class="error text-danger">
                                @error('detailed_address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </fieldset>
                    
                        <button type="submit" class="mt-20 tf-btn primary">Submit</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
@include('customer.partials.footer')