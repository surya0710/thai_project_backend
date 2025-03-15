@include('customer.partials.header')
<style>
   body>.skiptranslate,
   .goog-logo-link,
   .gskiptranslate,
   .goog-te-gadget span,
   .goog-te-banner-frame,
   #goog-gt-tt,
   .goog-te-balloon-frame,
   div#goog-gt- {
      display: none !important;
   }

   .goog-te-gadget {
      color: transparent !important;
      font-size: 0px;
   }

   .goog-text-highlight {
      background: none !important;
      box-shadow: none !important;
   }

   #google_translate_element select {
      background: #333337;
      color: #fff4e4;
      border: none;
      font-weight: bold;
      border-radius: 3px;
      padding: 8px 12px
   }

   .language-wrapper {
      position: relative;
      display: inline-block;
   }

   /* Style for select box */
   .language-select {
      appearance: none;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 5px;
      cursor: pointer;
      width: 170px;
      background: white;
   }

   /* Dropdown container with flag */
   .language-select-container {
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
   }

   /* Flag icons */
   .flag-icon {
      width: 24px;
      height: 16px;
   }

   /* Hide Google Translate Banner */
   .goog-te-banner-frame {
      display: none !important;
   }

   .goog-te-combo {
      display: none;
   }
</style>
<div class="header-profile fixed-top">
   <div class="main-logo-img">
      <img src="{{ asset('assets/images/logo/paytmicon-png.png') }}" alt="logo">
   </div>
   <div class="content-left">
      <a href="profile.html" class="avt">
         <img src="{{ asset('assets/images/avt/avt2.jpg') }}" alt="avatar">
      </a>
      <h5>Hello, {{ Auth::guard('customer')->user()->name }}!</h5>
   </div>
   <div class="right">
      <div id='google_translate_element' class="skiptranslate goog-te-gadget" dir="ltr" style="">
         <div class="language-wrapper">
            <div class="language-select-container">
               <img id="selected-flag" src="https://flagcdn.com/w40/us.png" class="flag-icon" alt="Flag">
               <select id="language-selector" class="language-select" onchange="changeLanguage()">
                  <option value="en" data-flag="https://flagcdn.com/w40/us.png">English</option>
                  <option value="hi" data-flag="https://flagcdn.com/w40/in.png">Hindi</option>
                  <option value="ja" data-flag="https://flagcdn.com/w40/jp.png">Japanese</option>
                  <option value="ko" data-flag="https://flagcdn.com/w40/kr.png">Korean</option>
                  <option value="my" data-flag="https://flagcdn.com/w40/mm.png">Burmese</option>
                  <option value="th" data-flag="https://flagcdn.com/w40/th.png">Thai</option>
                  <option value="ru" data-flag="https://flagcdn.com/w40/ru.png">Russian</option>
                  <option value="ms" data-flag="https://flagcdn.com/w40/sg.png">Malay (Singapore)</option>
                  <option value="ar" data-flag="https://flagcdn.com/w40/sa.png">Arabic</option>
                  <option value="ur" data-flag="https://flagcdn.com/w40/pk.png">Urdu</option>
               </select>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="app-content style-5">
   <div class="tf-container">
      <div class="upper-main-btn mt-24 justify-content-between align-items-end">
         <div class="">
            <h3>USD {{ Auth::guard('customer')->user()->total_amount }}</h3>
            <p class="meta-item">Available Balance</p>
         </div>
         <div class="d-flex mt-3">
            <a href="{{ route('customer.recharge') }}"> <button class="tf-btn primary btn-sm inline m-1">Recharge</button></a>
            <a href="{{ route('customer.withdrawal') }}"> <button class="tf-btn primary btn-sm inline m-1">Withdraw</button></a>
         </div>
      </div>
      <div class="content">
         <div class="home-main-btn mt-10 align-items-center gap-16">
            <button class="btnd content d-block">
               <div class="body-4 text-white-2 fw-bold text-val-drop">{{ Auth::guard('customer')->user()->revenue_generated}}</div>
               <p class=" text-white-5 desc-val-drop">Revenue(USD)</p>
            </button>
            <button class="btnd content d-block">
               <div class="body-4 text-white-2 fw-bold text-val-drop">{{ Auth::guard('customer')->user()->revenue_generated}}</div>
               <p class=" text-white-5 desc-val-drop">Frozen(USD)</p>
            </button>
            <button class="btnd content d-block">
               <div class="body-4 text-white-2 fw-bold text-val-drop">{{ Auth::guard('customer')->user()->total_amount }}</div>
               <p class=" text-white-5 desc-val-drop">Total(USD)</p>
            </button>
         </div>
      </div>
      <!-- task  -->
      <div class="row mt-32">
         <div class="col-lg-7">
            <div class="mt-32">
               <div class="section-title d-flex justify-content-between align-items-center">
                  <h3>Level Description Platform Rule</h3>
                  <!-- <a href="my-task.html" class="font-title-btn text-black-5">View All</a> -->
               </div>
               <a href="" class="mt-20 box-task style-2">
                  <div class="box-icon w-52 radius-8">
                     <img src="{{ asset('assets/images/logo/lv0.png') }}" alt="">
                  </div>
                  <div class="content">
                     <div class="font-title-btn text-black-2">VIP0&Mall Level</div>
                     <div class="mt-10 d-flex align-items-center gap-16">
                        <span class="meta-item"> 3% Commission on tasks</span>
                        <span class="meta-item"> 30.00 USD Activation level</span>
                     </div>
                  </div>
               </a>
               <a href="" class="mt-20 box-task style-2">
                  <div class="box-icon w-52 radius-8">
                     <img src="{{ asset('assets/images/logo/lv1.png') }}" alt="">
                  </div>
                  <div class="content">
                     <div class="font-title-btn text-black-2">VIP1&Mall Level</div>
                     <div class="mt-10 d-flex align-items-center gap-16">
                        <span class="meta-item"> 3% Commission on tasks</span>
                        <span class="meta-item"> 201.00 USD Activation level</span>
                     </div>
                  </div>
               </a>
               <a href="" class="mt-20 box-task style-2">
                  <div class="box-icon w-52 radius-8">
                     <img src="{{ asset('assets/images/logo/lv2.png') }}" alt="">
                  </div>
                  <div class="content">
                     <div class="font-title-btn text-black-2">VIP2&Mall Level</div>
                     <div class="mt-10 d-flex align-items-center gap-16">
                        <span class="meta-item"> 4% Commission on tasks</span>
                        <span class="meta-item"> 501.00 USD Activation level</span>
                     </div>
                  </div>
               </a>
               <a href="" class="mt-20 box-task style-2">
                  <div class="box-icon w-52 radius-8">
                     <img src="{{ asset('assets/images/logo/lv3.png') }}" alt="">
                  </div>
                  <div class="content">
                     <div class="font-title-btn text-black-2">VIP3&Mall Level</div>
                     <div class="mt-10 d-flex align-items-center gap-16">
                        <span class="meta-item"> 5% Commission on tasks</span>
                        <span class="meta-item"> 1000.00 USD Activation level</span>
                     </div>
                  </div>
               </a>
               <a href="" class="mt-20 box-task style-2">
                  <div class="box-icon w-52 radius-8">
                     <img src="{{ asset('assets/images/logo/lv4.png') }}" alt="">
                  </div>
                  <div class="content">
                     <div class="font-title-btn text-black-2">VIP4&Mall Level</div>
                     <div class="mt-10 d-flex align-items-center gap-16">
                        <span class="meta-item"> 7% Commission on tasks</span>
                        <span class="meta-item"> 2000.00 USD Activation level</span>
                     </div>
                  </div>
               </a>
               <a href="" class="mt-20 box-task style-2">
                  <div class="box-icon w-52 radius-8">
                     <img src="{{ asset('assets/images/logo/lv5.png') }}" alt="">
                  </div>
                  <div class="content">
                     <div class="font-title-btn text-black-2">VIP5&Mall Level</div>
                     <div class="mt-10 d-flex align-items-center gap-16">
                        <span class="meta-item"> 10% Commission on tasks</span>
                        <span class="meta-item"> 5000.00 USD Activation level</span>
                     </div>
                  </div>
               </a>
            </div>
         </div>
         <div class="col-lg-5">
            <style>
               .header {
                  font-weight: bold;
                  padding: 10px;
                  background: #eee;
                  border-radius: 8px;
               }

               .entry {
                  display: flex;
                  justify-content: space-between;
                  padding: 10px 25px 10px 10px;
                  border-bottom: 1px solid #ddd;
                  border-radius: 6px;
                  background: rgba(240, 240, 255, 0.5);
                  font-size: 15px;
               }

               .entry:last-child {
                  border-bottom: none;
               }

               .time {
                  font-size: 12px;
                  color: gray;
               }

               .amount {
                  color: red;
                  font-weight: bold;
               }
            </style>


            <div class="tf-container mt-32">
               <div class="header">Member Earned</div>
               <div id="dataList"></div>
            </div>

            <script>
               function getRandomAmount() {
                  return (Math.random() * 200 + 10).toFixed(2);
               }

               function getCurrentTime() {
                  let now = new Date();
                  return now.toLocaleDateString() + " " + now.toLocaleTimeString();
               }

               function addEntry() {
                  let dataList = document.getElementById("dataList");
                  let entry = document.createElement("div");
                  entry.className = "entry";

                  entry.innerHTML = `
               <div>
                   <div>****</div>
                   <div class="time">${getCurrentTime()}</div>
               </div>
               <div class="amount">+$${getRandomAmount()}</div>
           `;

                  dataList.prepend(entry);

                  if (dataList.children.length > 5) {
                     dataList.removeChild(dataList.lastChild);
                  }
               }

               setInterval(addEntry, 3000);
            </script>
         </div>
      </div>



   </div>
</div>
@include('customer.partials.footer')