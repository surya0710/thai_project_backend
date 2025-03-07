<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="index.php"> <img class="img-fluid for-light"
                        src="../images/logo/paytmicon-png.png" alt=""><img class="img-fluid for-dark"
                        src="../images/logo/paytmicon-png.png" alt=""></a></div>
            <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                    <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#stroke-animation"></use>
                </svg>
            </div>
        </div>
        <form class="col-sm-4 form-inline search-full d-none d-xl-block" action="#" method="get">
            <div class="form-group">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Type to Search .." name="q" title="" autofocus>
                        <svg class="search-bg svg-color">
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#search"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </form>
        <div class="nav-right col-xl-8 col-lg-12 col-auto pull-right right-header p-0">
            <ul class="nav-menus">
                <li class="serchinput">
                    <div class="serchbox">
                        <svg>
                            <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#search"></use>
                        </svg>
                    </div>
                    <div class="form-group search-form">
                        <input type="text" placeholder="Search here...">
                    </div>
                </li>

                <li>
                    <button class="badge badge-success mb-1">
                        <span class="lable">Top up 1</span>
                    </button>
                </li>
                <li>
                    <button class="badge badge-danger mb-1">
                        <span class="lable">Withdraw 1</span>
                    </button>
                </li>
                <!-- <li>
              <button class="badge badge-danger mb-1">
                <span class="lable">Turn on voice</span>
                <i class="fa-solid fa-volume-high"></i>
              </button>
            </li> -->
                <!-- <li>
              <div class="mode">
                <svg class="for-dark">
                  <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#moon"></use>
                </svg>
                <svg class="for-light">
                  <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#Sun"></use>
                </svg>
              </div>
            </li> -->

                <!-- <li class="language-nav">
              <div class="translate_wrapper">
                <div class="current_lang">
                  <div class="lang"><i class="flag-icon flag-icon-gb"></i><span class="lang-txt box-col-none">EN </span>
                  </div>
                </div>
                <div class="more_lang">
                  <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span
                      class="lang-txt">English<span> (US)</span></span></div>
                  <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span
                      class="lang-txt">Deutsch</span></div>
                  <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span
                      class="lang-txt">Español</span></div>
                  <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span
                      class="lang-txt">Français</span></div>
                  <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span
                      class="lang-txt">Português<span> (BR)</span></span></div>
                  <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span
                      class="lang-txt">简体中文</span></div>
                  <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية
                      <span> (ae)</span></span></div>
                </div>
              </div>
            </li> -->

                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="d-flex align-items-center profile-media"><img class="b-r-25"
                            src="assets/images/dashboard/profile.png" alt="">
                        <div class="flex-grow-1 user"><span>Helen Walter</span>
                            <p class="mb-0 font-nunito">Admin
                                <svg>
                                    <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#header-arrow-down"></use>
                                </svg>
                            </p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="profile.php"><i data-feather="user"></i><span>Account </span></a></li>
                        <li><a href="login.php"> <i data-feather="log-in"></i><span>Log Out</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">              
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                <div class="ProfileCard-realName">{{name}}</div>
                </div>
                </div>
              </script>
        <!-- <script class="empty-template"
          type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script> -->
    </div>
</div>