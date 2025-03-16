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
    .goog-te-combo{
        display: none;
    }
</style>
    <div class="header fixed-top line-bt">
        <div class="left">
            <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
        </div>
        <h5>My Account</h5>
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
    <div class="app-content">

        <div class="tf-container">
            <div class="upper-main-btn mt-24 justify-content-between align-items-end">
                <div class="">
                    <p class="">KRISHHOP UID</p>
                    <h3>{{ $userData->uuid }}</h3>
                </div>
                <div class=" mt-3">
                    <p class="">INVITATION CODE</p>
                    <h3>{{ $userData->invitation_code }}</h3>
                </div>
            </div>
            <div class="box-profile">
                <div class="avatar avt-100">
                    <img src="{{ asset('assets/images/avt/avt1.jpg') }}" alt="img">
                </div>
                <div class="content text-center">
                    <h5>USER NAME - {{  $userData->username }}</h5>
                    <p class="mt-4 body-4 text-black-4">LEVEL - {{  $userData->badge }}</p>
                </div>
            </div>
            <div class="content">
                <div class="home-main-btn mt-10 align-items-center gap-16">
                    <button class="btnd content d-block">
                        <div class="body-4 text-white-2 fw-bold text-val-drop">{{  $userData->revenue_generated}} USD</div>
                        <p class="body-2 text-gery-5 desc-val-drop">Total Revenue</p>
                    </button>
                    <button class="btnd content d-block">
                        <div class="body-4 text-white-2 fw-bold text-val-drop">{{ number_format($userData->total_amount - $userData->frozen_amount, 2) }} USD</div>
                        <p class="body-2 text-white-5 desc-val-drop">Account Amount</p>
                    </button>
                </div>
            </div>
            <!-- <a href="edit-profile.html" class="tf-btn primary mt-3">Edit Profile</a> -->

            <ul class="mt-32">
                <li class="list-view-item style-1 line-bt" data-bs-toggle="offcanvas" data-bs-target="#upgradePremium"
                    aria-controls="offcanvasBottom">
                    <a href="{{ route('customer.recharge') }}" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.7667 1.04938C11.4776 0.444472 12.5224 0.444472 13.2333 1.04938C13.7356 1.47685 14.4235 1.61369 15.0512 1.411C15.9395 1.12419 16.9047 1.52398 17.33 2.35489C17.6305 2.94207 18.2137 3.33174 18.8712 3.3847C19.8016 3.45965 20.5403 4.19836 20.6153 5.12879C20.6683 5.78628 21.0579 6.36946 21.6451 6.67C22.476 7.0953 22.8758 8.06048 22.589 8.94876C22.3863 9.57647 22.5231 10.2644 22.9506 10.7667C23.5555 11.4776 23.5555 12.5224 22.9506 13.2333C22.5231 13.7356 22.3863 14.4235 22.589 15.0512C22.8758 15.9395 22.476 16.9047 21.6451 17.33C21.0579 17.6305 20.6683 18.2137 20.6153 18.8712C20.5403 19.8016 19.8016 20.5403 18.8712 20.6153C18.2137 20.6683 17.6305 21.0579 17.33 21.6451C16.9047 22.476 15.9395 22.8758 15.0512 22.589C14.4235 22.3863 13.7356 22.5231 13.2333 22.9506C12.5224 23.5555 11.4776 23.5555 10.7667 22.9506C10.2644 22.5231 9.57647 22.3863 8.94876 22.589C8.06048 22.8758 7.0953 22.476 6.67 21.6451C6.36946 21.0579 5.78628 20.6683 5.12879 20.6153C4.19837 20.5403 3.45965 19.8016 3.3847 18.8712C3.33174 18.2137 2.94207 17.6305 2.35489 17.33C1.52398 16.9047 1.12419 15.9395 1.411 15.0512C1.61369 14.4235 1.47685 13.7356 1.04938 13.2333C0.444472 12.5224 0.444472 11.4776 1.04938 10.7667C1.47685 10.2644 1.61369 9.57647 1.411 8.94876C1.12419 8.06048 1.52398 7.0953 2.35489 6.67C2.94207 6.36946 3.33174 5.78628 3.3847 5.12879C3.45965 4.19837 4.19837 3.45965 5.12879 3.3847C5.78628 3.33174 6.36946 2.94207 6.67 2.35489C7.0953 1.52398 8.06048 1.12419 8.94876 1.411C9.57647 1.61369 10.2644 1.47685 10.7667 1.04938Z"
                                    fill="#64BEF1" />
                                <circle cx="12" cy="12" r="8" fill="#7980FF" />
                                <path
                                    d="M12 4C14.1217 4 16.1566 4.84285 17.6569 6.34315C19.1571 7.84344 20 9.87827 20 12C20 14.1217 19.1571 16.1566 17.6569 17.6569C16.1566 19.1571 14.1217 20 12 20L12 12L12 4Z"
                                    fill="#0055DD" />
                                <path d="M14.8736 9H9.17241L8 11H16L14.8736 9Z" fill="white" />
                                <path d="M14.8736 9H12V11H16L14.8736 9Z" fill="#B2F5FF" />
                                <path d="M16 11H8L12 16L16 11Z" fill="#B2F5FF" />
                                <path d="M16 11H12V16L16 11Z" fill="#18E0FF" />
                            </svg>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Recharge
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1 line-bt">
                    <a href="{{ route('customer.withdrawal') }}" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <i class="icon-life-buoy fs-20"></i>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Withdraw
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1 line-bt" data-bs-toggle="offcanvas" data-bs-target="#helpCenter"
                    aria-controls="offcanvasRight">
                    <a href="javascript:void(0);" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <i class="icon-star fs-20"></i>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Service
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1 line-bt" data-bs-toggle="offcanvas" data-bs-target="#privacyPolicy"
                    aria-controls="offcanvasRight">
                    <a href="javascript:void(0);" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <i class="icon-view fs-20"></i>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Personal Info
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1 line-bt">
                    <a href="{{ route('customer.myAddress') }}" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <i class="icon icon-btn-group fs-20"></i>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Address Modification
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1 line-bt">
                    <a href="{{ route('customer.bankDetails') }}" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <i class="icon icon-input fs-20"></i>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Accounts
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1 line-bt">
                    <a href="{{ route('customer.rechargeWithdrawalHistory') }}" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6463 1.66687C11.6821 1.66687 11.7172 1.66988 11.7513 1.67567L11.8654 1.67637C12.0354 1.67637 12.1979 1.74554 12.3162 1.86804L16.5371 6.26554C16.6487 6.38137 16.7113 6.5372 16.7113 6.69804V14.3364C16.7262 16.4272 15.0979 18.1355 13.0037 18.2205L6.32122 18.2214H6.23039C4.18877 18.1752 2.55136 16.5241 2.50147 14.5024L2.50122 5.40887C2.54955 3.34137 4.25705 1.67637 6.30955 1.67637L11.5413 1.67567C11.5754 1.66988 11.6105 1.66687 11.6463 1.66687ZM11.0212 2.92604L6.31122 2.92637C4.93039 2.92637 3.78372 4.0447 3.75122 5.42387V14.3364C3.72039 15.7639 4.84539 16.9397 6.25872 16.9714H12.9787C14.3696 16.9139 15.4712 15.758 15.4613 14.3414L15.4612 7.48604L13.7863 7.48687C12.2613 7.4827 11.0213 6.23937 11.0213 4.71604L11.0212 2.92604ZM11.4906 12.1736C11.8356 12.1736 12.1156 12.4536 12.1156 12.7986C12.1156 13.1436 11.8356 13.4236 11.4906 13.4236H6.99064C6.64564 13.4236 6.36564 13.1436 6.36564 12.7986C6.36564 12.4536 6.64564 12.1736 6.99064 12.1736H11.4906ZM9.78655 9.04695C10.1316 9.04695 10.4116 9.32695 10.4116 9.67195C10.4116 10.017 10.1316 10.297 9.78655 10.297H6.98989C6.64489 10.297 6.36489 10.017 6.36489 9.67195C6.36489 9.32695 6.64489 9.04695 6.98989 9.04695H9.78655ZM12.2712 3.62687L12.2713 4.71604C12.2713 5.5527 12.9521 6.23437 13.788 6.23687L14.7762 6.23604L12.2712 3.62687Z" fill="#31394F"></path>
                            </svg>
                        </div>
                        <div class="font-title-btn text-black-2 title">
                            Recharge & Withdraw Record
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
                <li class="list-view-item style-1" data-bs-toggle="modal" data-bs-target="#logout">
                    <a href="javascript:void(0);" class="gap-20">
                        <div class="box-icon w-36 bg-grey-2 radius-12">
                            <i class="icon-log-out text-danger fs-20"></i>
                        </div>
                        <div class="font-title-btn text-black-2 title text-danger">
                            Log out
                        </div>
                        <div class="box-icon w-20">
                            <i class="icon-arr-r fs-12"></i>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <script>
        function changeLanguage() {
            var selectBox = document.getElementById("language-selector");
            var selectedOption = selectBox.options[selectBox.selectedIndex];
            var selectedFlag = selectedOption.getAttribute("data-flag");

            document.getElementById("selected-flag").src = selectedFlag;

            var googleTranslateFrame = document.querySelector(".goog-te-combo");
            if (googleTranslateFrame) {
                googleTranslateFrame.value = selectedOption.value;
                googleTranslateFrame.dispatchEvent(new Event("change"));
            } else {
                console.warn("Google Translate not loaded");
            }
        }
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement(
                { pageLanguage: 'en', 
                autoDisplay: 'false',
                includedLanguages: 'en,hi,ja,ko,my,th,ru,ms,ar,ur' },
                'google_translate_element'
            );
        }
    </script>

    <!-- log out -->
    <div class="modal fade modalCenter" id="logout">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-notiCenter">
                <h5 class="title text-black-2 line-bt2">Are you sure, you want to log out?</h5>
                <a href="{{ route('customer.logout') }}" class="text-danger font-title-btn d-block text-center line-bt2">Log Out</a>
                <a href="javascript:void(0);" class="text-black-5 font-title-btn d-block text-center"
                    data-bs-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
    <!-- language -->
    <div class="offcanvas offcanvas-bottom" id="language">
        <div class="offcanvas-header justify-content-center line-bt">
            <h5 class="flex-grow-1 text-center text-black-3">Change Language</h5>
            <span class="icon-close2 icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        </div>
       
        <div class="overflow-auto pb-100 language">
            <div class="tf-container">
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

                
                <div class="footer-fixed button">
                    <a href="javascript:void(0);" class="tf-btn primary" data-bs-dismiss="offcanvas"
                        aria-label="Close">Done</a>
                </div>
            </div>


        </div>
    </div>
    <!-- help center -->
    <div class="offcanvas offcanvas-end full" id="helpCenter">
        <div class="header fixed-top line-bt">
            <div class="left" data-bs-dismiss="offcanvas">
                <a href="javascript:void(0);" class="icon"><i class="icon-back"></i></a>
            </div>
            <h5>Customer Service</h5>
        </div>
        <div class="overflow-auto app-content style-3 pb-32">
            <div class="tf-container">
                <img src="{{ asset('assets/images/logo/customer-service.jpg') }}" alt="">
                <div class="pt-28 pb-24 line-bt">
                    <h6>Customer service center</h6>
                    <p class="mt-8 body-2 text-black-5">If you need any assistance, have any questions, or are facing any issues, please contact our online customer support.</p>

                </div>
                <ul class="pt-28 pb-24 line-bt">
                    <li>
                        <a href="javascript:void(0);" class="d-flex align-items-center gap-16">
                            <div class="font-title-btn flex-grow-1">Online customer online service</div>
                            <div class="font-title-btn ">Working time 24x7</div>
                            <a href="" class="tf-btn outline-btn-primary mt-16">Contact us</a>
                        </a>
                    </li>
                    <li style="margin-top: 40px;">
                        <a href="javascript:void(0);" class="d-flex align-items-center gap-16">
                            <div class="font-title-btn flex-grow-1">Online customer tg service</div>
                            <div class="font-title-btn ">Working time 24x7</div>
                            <a href="" class="tf-btn outline-btn-primary mt-16">Contact us</a>
                        </a>
                    </li>
                </ul>
            </div>
            <script src='//fw-cdn.com/12542621/4940638.js' chat='true'></script>
        </div>
    </div>
    <!-- personal info -->
    <div class="offcanvas offcanvas-end full" id="privacyPolicy">
        <div class="header fixed-top line-bt">
            <div class="left" data-bs-dismiss="offcanvas">
                <a href="javascript:void(0);" class="icon"><i class="icon-back"></i></a>
            </div>
            <h5>Personal Info</h5>
        </div>
        <div class="overflow-auto app-content style-3 pb-24">
            <div class="tf-container">
                <ul class="mt-32">
                    <li class="list-view-item style-1 line-bt" data-bs-toggle="offcanvas"
                        data-bs-target="#upgradePremium" aria-controls="offcanvasBottom">
                        <a href="{{ route('customer.profile') }}" class="gap-20">
                            <div class="box-icon w-36 bg-grey-2 radius-12">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.7667 1.04938C11.4776 0.444472 12.5224 0.444472 13.2333 1.04938C13.7356 1.47685 14.4235 1.61369 15.0512 1.411C15.9395 1.12419 16.9047 1.52398 17.33 2.35489C17.6305 2.94207 18.2137 3.33174 18.8712 3.3847C19.8016 3.45965 20.5403 4.19836 20.6153 5.12879C20.6683 5.78628 21.0579 6.36946 21.6451 6.67C22.476 7.0953 22.8758 8.06048 22.589 8.94876C22.3863 9.57647 22.5231 10.2644 22.9506 10.7667C23.5555 11.4776 23.5555 12.5224 22.9506 13.2333C22.5231 13.7356 22.3863 14.4235 22.589 15.0512C22.8758 15.9395 22.476 16.9047 21.6451 17.33C21.0579 17.6305 20.6683 18.2137 20.6153 18.8712C20.5403 19.8016 19.8016 20.5403 18.8712 20.6153C18.2137 20.6683 17.6305 21.0579 17.33 21.6451C16.9047 22.476 15.9395 22.8758 15.0512 22.589C14.4235 22.3863 13.7356 22.5231 13.2333 22.9506C12.5224 23.5555 11.4776 23.5555 10.7667 22.9506C10.2644 22.5231 9.57647 22.3863 8.94876 22.589C8.06048 22.8758 7.0953 22.476 6.67 21.6451C6.36946 21.0579 5.78628 20.6683 5.12879 20.6153C4.19837 20.5403 3.45965 19.8016 3.3847 18.8712C3.33174 18.2137 2.94207 17.6305 2.35489 17.33C1.52398 16.9047 1.12419 15.9395 1.411 15.0512C1.61369 14.4235 1.47685 13.7356 1.04938 13.2333C0.444472 12.5224 0.444472 11.4776 1.04938 10.7667C1.47685 10.2644 1.61369 9.57647 1.411 8.94876C1.12419 8.06048 1.52398 7.0953 2.35489 6.67C2.94207 6.36946 3.33174 5.78628 3.3847 5.12879C3.45965 4.19837 4.19837 3.45965 5.12879 3.3847C5.78628 3.33174 6.36946 2.94207 6.67 2.35489C7.0953 1.52398 8.06048 1.12419 8.94876 1.411C9.57647 1.61369 10.2644 1.47685 10.7667 1.04938Z"
                                        fill="#64BEF1" />
                                    <circle cx="12" cy="12" r="8" fill="#7980FF" />
                                    <path
                                        d="M12 4C14.1217 4 16.1566 4.84285 17.6569 6.34315C19.1571 7.84344 20 9.87827 20 12C20 14.1217 19.1571 16.1566 17.6569 17.6569C16.1566 19.1571 14.1217 20 12 20L12 12L12 4Z"
                                        fill="#0055DD" />
                                    <path d="M14.8736 9H9.17241L8 11H16L14.8736 9Z" fill="white" />
                                    <path d="M14.8736 9H12V11H16L14.8736 9Z" fill="#B2F5FF" />
                                    <path d="M16 11H8L12 16L16 11Z" fill="#B2F5FF" />
                                    <path d="M16 11H12V16L16 11Z" fill="#18E0FF" />
                                </svg>
                            </div>
                            <div class="font-title-btn text-black-2 title">
                                Personal Data
                            </div>
                            <div class="box-icon w-20">
                                <i class="icon-arr-r fs-12"></i>
                            </div>
                        </a>
                    </li>
                    <li class="list-view-item style-1 line-bt">
                        <a href="{{ route('customer.changePassword') }}" class="gap-20">
                            <div class="box-icon w-36 bg-grey-2 radius-12">
                                <i class="icon-life-buoy fs-20"></i>
                            </div>
                            <div class="font-title-btn text-black-2 title">
                                Login password management
                            </div>
                            <div class="box-icon w-20">
                                <i class="icon-arr-r fs-12"></i>
                            </div>
                        </a>
                    </li>
                    <li class="list-view-item style-1 line-bt">
                        <a href="{{ route('customer.transactionPassword') }}" class="gap-20">
                            <div class="box-icon w-36 bg-grey-2 radius-12">
                                <i class="icon-life-buoy fs-20"></i>
                            </div>
                            <div class="font-title-btn text-black-2 title">
                                Transaction password management
                            </div>
                            <div class="box-icon w-20">
                                <i class="icon-arr-r fs-12"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@include('customer.partials.footer')