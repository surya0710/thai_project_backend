@include('customer.partials.header')
    <div class="header fixed-top line-bt">
        <div class="left">
          <a href="{{ route('customer.myAccount') }}" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>Recharge</h5>
    </div>
    <div class="app-content">
        <div class="tf-container">
            <div class="card mt-20">
                <div class="card-body">
                    <form method="post" action="{{ route('customer.rechargeSubmit') }}" enctype="multipart/form-data">
                        @csrf
                        <span class="text-danger error">
                            @if (session()->has('error'))
                                {{ session()->get('error') }}
                            @endif
                        </span>
                        <span class="text-success error">
                            @if (session()->has('success'))
                                {{ session()->get('success') }}
                            @endif
                        </span>
                        <fieldset class="mt-26 input-line">
                            <label>Recharge Amount</label>
                            <input type="number" step="0.01" placeholder="0.00" name="amount" class="form-control" value="{{  old('amount')}}" required>
                        </fieldset>
                        <span class="text-danger error">
                            @if ($errors->has('amount'))
                                {{ $errors->first('amount') }}
                            @endif
                        </span>
                       
                        <fieldset class="mt-26 input-upload">
                            <span class="icon icon-upload2"></span>
                            <input type="file" class="upload-file" name="image" id="file-upload" accept="image/*" required>
                            <p id="file-name" class="mt-2 text-sm text-gray-700"></p>
                            <img id="file-preview" class="mt-2 hidden " style="width: 100px;" />
                        </fieldset>
                        <span class="text-danger error">
                            @if ($errors->has('image'))
                                {{ $errors->first('image') }}
                            @endif
                        </span>
                       
                        <button class="mt-20 tf-btn primary">Submit</button>
                    </form>
                </div>
            </div>   
        </div>
    </div>
@include('customer.partials.footer')
<script>
    const fileInput = document.getElementById("file-upload");
    const fileNameDisplay = document.getElementById("file-name");
    const filePreview = document.getElementById("file-preview");

    fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            fileNameDisplay.textContent = `📂 ${file.name}`;

            // Display image preview
            const reader = new FileReader();
            reader.onload = function (e) {
                filePreview.src = e.target.result;
                filePreview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        } else {
            fileNameDisplay.textContent = "";
            filePreview.classList.add("hidden");
        }
    });

    document.querySelector("label").addEventListener("click", function () {
        fileInput.click();
    });
</script>