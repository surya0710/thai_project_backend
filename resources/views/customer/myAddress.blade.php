@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>My Address</h5>
    </div>
    <div class="app-content style-2">
        <div class="tf-container">
            <ul class="mt-24" style="height: 62vh;">
                @foreach($addresses as $address)
                <li class="box-select-role act-suggest">
                    <div class="box-icon w-36">
                       
                        <svg  width="100" height="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" xml:space="preserve">
                            <path fill="#282828"
                                d="M100.232 149.198c-2.8 0-5.4-1.8-7.2-5.2-22.2-41-22.4-41.4-22.4-41.6-3.2-5.1-4.9-11.3-4.9-17.6 0-19.1 15.5-34.6 34.6-34.6s34.6 15.5 34.6 34.6c0 6.5-1.8 12.8-5.2 18.2 0 0-1.2 2.4-22.2 41-1.9 3.4-4.4 5.2-7.3 5.2zm.1-95c-16.9 0-30.6 13.7-30.6 30.6 0 5.6 1.5 11.1 4.5 15.9.6 1.3 16.4 30.4 22.4 41.5 2.1 3.9 5.2 3.9 7.4 0 7.5-13.8 21.7-40.1 22.2-41 3.1-5 4.7-10.6 4.7-16.3-.1-17-13.8-30.7-30.6-30.7z" />
                            <path fill="#282828"
                                d="M100.332 105.598c-10.6 0-19.1-8.6-19.1-19.1s8.5-19.2 19.1-19.2c10.6 0 19.1 8.6 19.1 19.1s-8.6 19.2-19.1 19.2zm0-34.3c-8.3 0-15.1 6.8-15.1 15.1s6.8 15.1 15.1 15.1 15.1-6.8 15.1-15.1-6.8-15.1-15.1-15.1z" />
                        </svg>
                    </div>
                    <div class="content">
                        <div class="body-4 fw-bold">{{ $address->location ?? '' }}</div>
                        <p class="body-2 text-black-5">{{ $address->detailed_address ?? '' }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
            @if($addresses->count() > 0)
                <a href="{{ route('address.edit') }}" class="tf-btn primary">Edit Address</a>
            @else
                <a href="{{ route('address.add') }}" class="tf-btn primary">Add Address</a>
            @endif
        </div>

    </div>
@include('customer.partials.footer')