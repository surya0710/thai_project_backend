@include('customer.partials.header')
<style>
    .faq-drawer {
        margin-bottom: 30px;
    }

    .faq-drawer__content-wrapper {
        margin-top: 15px;
        font-size: 1.25em;
        line-height: 1.4em;
        max-height: 0px;
        overflow: hidden;
        transition: 0.25s ease-in-out;
    }

    .faq-drawer__title {
        border-top: #000 1px solid;
        cursor: pointer;
        display: block;
        font-size: 1.25em;
        font-weight: 700;
        padding: 15px 0 0 0;
        position: relative;
        margin-bottom: 0;
        transition: all 0.25s ease-out;
    }

    .faq-drawer__title::after {
        border-style: solid;
        border-width: 1px 1px 0 0;
        content: " ";
        display: inline-block;
        float: right;
        height: 10px;
        left: 2px;
        position: relative;
        right: 20px;
        top: 2px;
        transform: rotate(135deg);
        transition: 0.35s ease-in-out;
        vertical-align: top;
        width: 10px;
    }
    .faq-drawer__title:hover {
        color: #4E4B52;
    }

    .faq-drawer__trigger:checked+.faq-drawer__title+.faq-drawer__content-wrapper {
        max-height: 1000px;
    }

    .faq-drawer__trigger:checked+.faq-drawer__title::after {
        transform: rotate(-45deg);
        transition: 0.25s ease-in-out;
    }

    input[type="checkbox"] {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        .container {
            padding: 80px;
        }
    }
</style>
<div class="header fixed-top line-bt">
    <div class="left">
        <a href="javascript:void(0);" class="icon back-btn"><i class="icon-back"></i></a>
    </div>
    <h5>Plateform Introduction</h5>

</div>
<div class="app-content">
    <div class="tf-container">
        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer">Welcome to PayMall – Inspired by Paytm Mall </label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">
                    <p>
                        Hello, Welcome to PayMall! <br>
                        PayMall is a third-party intelligent task-matching
                        platform. We collaborate with global e-commerce
                        merchants to provide users with task-based earning
                        opportunities. Our intelligent system efficiently matches
                        merchant orders to platform users, allowing them to
                        complete activities and earn rewards.
                    </p> <br>
                    <p> <strong>Important Note:</strong> PayMall does not charge any fees to
                        part-time members in any form. If you have any
                        questions, please contact our online customer service
                        for assistance.
                    </p> <br>
                    <p>The recharge processing time on our platform begins at 24 hours.</p> <br>
                    <p>For inquiries, go to <strong> My Account → Customer Service
                            Center → </strong> Online Customer Service to get assistance.</p>
                </div>
            </div>
        </div>

        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-2" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer-2">Paytm Mall Overview</label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">
                    <p>
                        Paytm Mall is a leading e-commerce platform in India,
                        offering a vast range of products across
                        multiple categories, including electronics, fashion, home
                        appliances, groceries, and more. It follows
                        a hybrid business model that combines online
                        marketplace and offline retail, enabling customers to
                        order online and pick up from local stores. Paytm Mall is
                        known for its cashback offers, discounts,
                        and seamless shopping experience, making it a popular
                        choice for online shoppers.
                    </p>
                </div>
            </div>
        </div>

        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-3" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer-3">History and Evolution of Paytm Mall:
            </label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">

                    <li>2010 - Paytm Mall was launched as a digital wallet and recharge platform.
                    </li>
                    <li>2017 - Paytm Mall was introduced as a separate e-commerce
                        platform.
                    </li>
                    <li>2018-2019 - Paytm Mall expanded its product categories and services</li>

                </div>
            </div>
        </div>
        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-4" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer-4">Membership Levels and Profit Ratios</label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">
                    <li> <b> LVO members</b> - Order 30 orders per day, profit ratio is 5%</li>
                    <li> <b> LV1 members</b> - Order 30 orders per day, profit ratio is 5%</li>
                    <li> <b> LV2 members</b> - Order 30 orders per day, profit ratio is 7%</li>
                    <li> <b> LV3 members</b> - Order 30 orders per day, profit ratio is 7%</li>
                    <li> <b> LV4 members</b> - Order 30 orders per day, profit ratio is 8%</li>
                    <li> <b> LV5 members</b> - Order 30 orders per day, profit ratio is 10%</li>
                </div>
            </div>
        </div>
        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-5" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer-5">Membership Level System and Commission
                Ratios</label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">
                    <p>
                        The membership system categorizes members into six
                        levels: LVO, LV1, LV2, LV3, LV4, and LV5. <br>
                        Each level has different commission structures and
                        benefits based on order volume and spending
                    </p>
                </div>
            </div>
        </div>
        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-6" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer-6">Membership Level Commission Ratios</label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">
                    <li>$15-$16 LVO commission - 5%</li>
                    <li>$30-$40 LV1 commission - 5%</li>
                    <li>$70-$90 LV2 commission - 7%</li>
                    <li>$100-$150 LV3 commission - 7%</li>
                    <li>$150-$200 LV4 commission - 8%</li>
                    <li>Above $500-$1000 LV5 commission - 10%</li>
                </div>
            </div>
        </div>
        <div class="faq-drawer">
            <input class="faq-drawer__trigger" id="faq-drawer-7" type="checkbox" /><label class="faq-drawer__title"
                for="faq-drawer-7">Withdrawal Terms & Conditions
            </label>
            <div class="faq-drawer__content-wrapper">
                <div class="faq-drawer__content">
                    <p>
                        To ensure smooth transactions, please read the
                        following withdrawal terms carefully:
                    </p> <br>
                    <ul> <b> 1. Complete 30 Tasks for Withdrawal </b> </ul>
                    <li> Before withdrawing money, you must complete 30vtasks at your current level.
                    </li>
                    <li>Until you complete all 30 tasks, withdrawal will not
                        be possible.</li> <br>
                    <ul> <b> 2. One Withdrawal Per Day </b> </ul>
                    <li>You can withdraw money only once per day</li>
                    <li>If you withdraw today, your next withdrawal can
                        only be made the following day.</li>
                    <ul> <b> 3. Daily Level Completion Requirement </b> </ul>
                    <li>Each day, you must complete your current level
                        before making a withdrawal.
                    </li>
                    <li>For example, if you are at Level 2, you must
                        complete 30 tasks of Level 2 before withdrawing.</li>
                        <br>

                    <p>Note: If you move to a new level the next day, you will
                    need to complete that level’s 30 tasks before
                    withdrawing again. <br>
                    For any questions, please contact our <b> Online Customer
                    Support. </b></p>      

                </div>
            </div>
        </div>

    </div>
</div>
@include('customer.partials.footer')