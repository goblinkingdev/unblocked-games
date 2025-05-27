<style>
    * {
        box-sizing: border-box
    }

    .contact-box h1 {
        color: #222
    }

    .contact-box {
        color: #222;
        font-size: 1em;
        font-weight: 400;
        line-height: 1.5;
        padding: 20px 0;
        background-color: #fff;
        font-size: 16px;
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        min-width: 300px;
        overflow-x: hidden;
        min-height: 80vh;
        text-rendering: optimizeLegibility;
        text-size-adjust: 100%
    }

    @keyframes spinAround {
        from {
            transform: rotate(0)
        }

        to {
            transform: rotate(359deg)
        }
    }

    .contact-box h1 {
        margin: .67em 0;
        font-weight: 700
    }

    .contact-box .button,
    .contact-box .file {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .contact-box .button,
    .contact-box .file-cta,
    .contact-box .file-name,
    .contact-box .input,
    .contact-box .select select,
    .contact-box .textarea {
        -moz-appearance: none;
        -webkit-appearance: none;
        align-items: center;
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: none;
        display: inline-flex;
        font-size: 16px;
        height: 2.5em;
        justify-content: flex-start;
        line-height: 1.5;
        padding-bottom: calc(.5em - 1px);
        padding-left: calc(.75em - 1px);
        padding-right: calc(.75em - 1px);
        padding-top: calc(.5em - 1px);
        position: relative;
        vertical-align: top
    }

    .contact-box .button:active,
    .contact-box .button:focus,
    .contact-box .file-cta:active,
    .contact-box .file-cta:focus,
    .contact-box .file-name:active,
    .contact-box .file-name:focus,
    .contact-box .input:active,
    .contact-box .input:focus,
    .contact-box .select select:active,
    .contact-box .select select:focus,
    .contact-box .textarea:active,
    .contact-box .textarea:focus {
        outline: 0
    }

    .button[disabled],
    .file-cta[disabled],
    .file-name[disabled],
    .input[disabled],
    .select select[disabled],
    .textarea[disabled] {
        cursor: not-allowed
    }

    .contact-box button,
    .contact-box input,
    .contact-box select,
    .contact-box textarea {
        font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif
    }

    .contact-box input[type=checkbox],
    .contact-box input[type=radio] {
        vertical-align: baseline
    }

    .contact-box span {
        font-style: inherit;
        font-weight: inherit
    }

    .contact-box strong {
        color: #363636;
        font-weight: 700
    }

    .contact-box legend,
    .contact-box textarea {
        margin: 0;
        padding: 0
    }

    .contact-box button,
    .contact-box input,
    .contact-box select,
    .contact-box textarea {
        margin: 0
    }

    ::after,
    ::before {
        box-sizing: inherit
    }

    .contact-box .button {
        background-color: #fff;
        border-color: #dbdbdb;
        border-width: 1px;
        color: #363636;
        cursor: pointer;
        justify-content: center;
        padding-bottom: calc(.5em - 1px);
        padding-left: 1em;
        padding-right: 1em;
        padding-top: calc(.5em - 1px);
        text-align: center;
        white-space: nowrap
    }

    .contact-box .button strong {
        color: inherit
    }

    .contact-box .button:hover {
        border-color: #b5b5b5;
        color: #363636
    }

    .contact-box .button:focus {
        border-color: #3273dc;
        color: #363636
    }

    .contact-box .button:focus:not(:active) {
        box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25)
    }

    .contact-box .button:active {
        border-color: #4a4a4a;
        color: #363636
    }

    .contact-box .button.is-text {
        background-color: transparent;
        border-color: transparent;
        color: #4a4a4a;
        text-decoration: underline
    }

    .contact-box .button.is-text:focus,
    .contact-box .button.is-text:hover {
        background-color: #f5f5f5;
        color: #363636
    }

    .contact-box .button.is-text:active {
        background-color: #e8e8e8;
        color: #363636
    }

    .contact-box .button.is-text[disabled] {
        background-color: transparent;
        border-color: transparent;
        box-shadow: none
    }

    .contact-box .button.is-link {
        background-color: #3273dc;
        border-color: transparent;
        color: #fff
    }

    .contact-box .button.is-link:hover {
        background-color: #276cda;
        border-color: transparent;
        color: #fff
    }

    .contact-box .button.is-link:focus {
        border-color: transparent;
        color: #fff
    }

    .contact-box .button.is-link:focus:not(:active) {
        box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25)
    }

    .contact-box .button.is-link:active {
        background-color: #2366d1;
        border-color: transparent;
        color: #fff
    }

    .contact-box .button.is-link[disabled] {
        background-color: #3273dc;
        border-color: transparent;
        box-shadow: none
    }

    .contact-box .button.is-normal {
        font-size: 16px
    }

    .contact-box .button.is-medium {
        font-size: 20px
    }

    .contact-box .button[disabled] {
        background-color: #fff;
        border-color: #dbdbdb;
        box-shadow: none;
        opacity: .5
    }

    .contact-box .button.is-fullwidth {
        display: flex;
        width: 100%
    }

    .contact-box .buttons {
        align-items: center;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start
    }

    .contact-box .buttons .button {
        margin-bottom: 8px
    }

    .contact-box .buttons .button:not(:last-child):not(.is-fullwidth) {
        margin-right: 8px
    }

    .contact-box .buttons:last-child {
        margin-bottom: -8px
    }

    .contact-box .buttons:not(:last-child) {
        margin-bottom: 16px
    }

    .contact-box .input,
    .contact-box .select select,
    .contact-box .textarea {
        background-color: #fff;
        border-color: #dbdbdb;
        border-radius: 4px;
        color: #363636
    }

    .contact-box .input::-moz-placeholder,
    .contact-box .select select::-moz-placeholder,
    .contact-box .textarea::-moz-placeholder {
        color: rgba(54, 54, 54, .3)
    }

    .contact-box .input::-webkit-input-placeholder,
    .contact-box .select select::-webkit-input-placeholder,
    .contact-box .textarea::-webkit-input-placeholder {
        color: rgba(54, 54, 54, .3)
    }

    .contact-box .input:-moz-placeholder,
    .contact-box .select select:-moz-placeholder,
    .contact-box .textarea:-moz-placeholder {
        color: rgba(54, 54, 54, .3)
    }

    .contact-box .input:-ms-input-placeholder,
    .contact-box .select select:-ms-input-placeholder,
    .contact-box .textarea:-ms-input-placeholder {
        color: rgba(54, 54, 54, .3)
    }

    .contact-box .input:hover,
    .contact-box .select select:hover,
    .contact-box .textarea:hover {
        border-color: #b5b5b5
    }

    .contact-box .input:active,
    .contact-box .input:focus,
    .contact-box .select select:active,
    .contact-box .select select:focus,
    .contact-box .textarea:active,
    .contact-box .textarea:focus {
        border-color: #3273dc;
        box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25)
    }

    .contact-box .input[disabled],
    .contact-box .select select[disabled],
    .contact-box .textarea[disabled] {
        background-color: #f5f5f5;
        border-color: #f5f5f5;
        box-shadow: none;
        color: #7a7a7a
    }

    .contact-box .input[disabled]::-moz-placeholder,
    .contact-box .select select[disabled]::-moz-placeholder,
    .contact-box .textarea[disabled]::-moz-placeholder {
        color: rgba(122, 122, 122, .3)
    }

    .contact-box .input[disabled]::-webkit-input-placeholder,
    .contact-box .select select[disabled]::-webkit-input-placeholder,
    .contact-box .textarea[disabled]::-webkit-input-placeholder {
        color: rgba(122, 122, 122, .3)
    }

    .contact-box .input[disabled]:-moz-placeholder,
    .contact-box .select select[disabled]:-moz-placeholder,
    .contact-box .textarea[disabled]:-moz-placeholder {
        color: rgba(122, 122, 122, .3)
    }

    .contact-box .input[disabled]:-ms-input-placeholder,
    .contact-box .select select[disabled]:-ms-input-placeholder,
    .contact-box .textarea[disabled]:-ms-input-placeholder {
        color: rgba(122, 122, 122, .3)
    }

    .contact-box .input,
    .contact-box .textarea {
        box-shadow: inset 0 .0625em .125em rgba(10, 10, 10, .05);
        max-width: 100%;
        width: 100%
    }

    .contact-box .input[readonly],
    .contact-box .textarea[readonly] {
        box-shadow: none
    }

    .contact-box .is-link.input,
    .contact-box .is-link.textarea {
        border-color: #3273dc
    }

    .contact-box .is-link.input:active,
    .contact-box .is-link.input:focus,
    .contact-box .is-link.textarea:active,
    .contact-box .is-link.textarea:focus {
        box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25)
    }

    .is-medium.input,
    .is-medium.textarea {
        font-size: 20px
    }

    .contact-box .is-fullwidth.input,
    .contact-box .is-fullwidth.textarea {
        display: block;
        width: 100%
    }

    .contact-box .textarea {
        display: block;
        max-width: 100%;
        min-width: 100%;
        padding: calc(.75em - 1px);
        resize: vertical
    }

    .contact-box .textarea:not([rows]) {
        max-height: 40em;
        min-height: 8em
    }

    .contact-box .textarea[rows] {
        height: initial
    }

    .contact-box .checkbox,
    .contact-box .radio {
        cursor: pointer;
        display: inline-block;
        line-height: 1.25;
        position: relative
    }

    .contact-box .checkbox input,
    .contact-box .radio input {
        cursor: pointer
    }

    .contact-box .checkbox:hover,
    .contact-box .radio:hover {
        color: #363636
    }

    .contact-box .checkbox[disabled],
    .contact-box .radio[disabled] {
        color: #7a7a7a;
        cursor: not-allowed
    }

    .contact-box .radio+.radio {
        margin-left: .5em
    }

    .contact-box .select {
        display: inline-block;
        max-width: 100%;
        position: relative;
        vertical-align: top
    }

    .contact-box .select:not(.is-multiple) {
        height: 2.5em
    }

    .contact-box .select:not(.is-multiple):not(.is-loading)::after {
        border: 3px solid transparent;
        border-radius: 2px;
        border-right: 0;
        border-top: 0;
        content: " ";
        display: block;
        height: .625em;
        margin-top: -.4375em;
        pointer-events: none;
        position: absolute;
        top: 50%;
        transform: rotate(-45deg);
        transform-origin: center;
        width: .625em
    }

    .contact-box .select:not(.is-multiple):not(.is-loading)::after {
        border-color: #3273dc;
        right: 1.125em;
        z-index: 4
    }

    .contact-box .select select {
        cursor: pointer;
        display: block;
        font-size: 1em;
        max-width: 100%;
        outline: 0
    }

    .contact-box .select select::-ms-expand {
        display: none
    }

    .contact-box .select select[disabled]:hover {
        border-color: #f5f5f5
    }

    .contact-box .select select:not([multiple]) {
        padding-right: 2.5em
    }

    .contact-box .select select[multiple] {
        height: auto;
        padding: 0
    }

    .contact-box .select select[multiple] option {
        padding: .5em 1em
    }

    .contact-box .select.is-link:not(:hover)::after {
        border-color: #3273dc
    }

    .contact-box .select.is-link select {
        border-color: #3273dc
    }

    .contact-box .select.is-link select:hover {
        border-color: #2366d1
    }

    .contact-box .select.is-link select:active,
    .contact-box .select.is-link select:focus {
        box-shadow: 0 0 0 .125em rgba(50, 115, 220, .25)
    }

    .contact-box .select.is-medium {
        font-size: 20px
    }

    .contact-box .select.is-fullwidth {
        width: 100%
    }

    .contact-box .select.is-fullwidth select {
        width: 100%
    }

    .contact-box .file {
        align-items: stretch;
        display: flex;
        justify-content: flex-start;
        position: relative
    }

    .contact-box .file.is-link .file-cta {
        background-color: #3273dc;
        border-color: transparent;
        color: #fff
    }

    .contact-box .file.is-link:hover .file-cta {
        background-color: #276cda;
        border-color: transparent;
        color: #fff
    }

    .contact-box .file.is-link:focus .file-cta {
        border-color: transparent;
        box-shadow: 0 0 .5em rgba(50, 115, 220, .25);
        color: #fff
    }

    .contact-box .file.is-link:active .file-cta {
        background-color: #2366d1;
        border-color: transparent;
        color: #fff
    }

    .contact-box .file.is-medium {
        font-size: 20px
    }

    .contact-box .file.has-name .file-cta {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0
    }

    .contact-box .file.has-name .file-name {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0
    }

    .contact-box .file.is-fullwidth .file-label {
        width: 100%
    }

    .contact-box .file.is-fullwidth .file-name {
        flex-grow: 1;
        max-width: none
    }

    .contact-box .file-label {
        align-items: stretch;
        display: flex;
        cursor: pointer;
        justify-content: flex-start;
        overflow: hidden;
        position: relative
    }

    .contact-box .file-label:hover .file-cta {
        background-color: #eee;
        color: #363636
    }

    .contact-box .file-label:hover .file-name {
        border-color: #d5d5d5
    }

    .contact-box .file-label:active .file-cta {
        background-color: #e8e8e8;
        color: #363636
    }

    .contact-box .file-label:active .file-name {
        border-color: #cfcfcf
    }

    .contact-box .file-input {
        height: 100%;
        left: 0;
        opacity: 0;
        outline: 0;
        position: absolute;
        top: 0;
        width: 100%
    }

    .contact-box .file-cta,
    .contact-box .file-name {
        border-color: #dbdbdb;
        border-radius: 4px;
        font-size: 1em;
        padding-left: 1em;
        padding-right: 1em;
        white-space: nowrap
    }

    .contact-box .file-cta {
        background-color: #f5f5f5;
        color: #4a4a4a
    }

    .contact-box .file-name {
        border-color: #dbdbdb;
        border-style: solid;
        border-width: 1px 1px 1px 0;
        display: block;
        max-width: 16em;
        overflow: hidden;
        text-align: inherit;
        text-overflow: ellipsis
    }

    .contact-box .label {
        color: #363636;
        display: block;
        font-size: 16px;
        font-weight: 700
    }

    .contact-box .label:not(:last-child) {
        margin-bottom: .5em
    }

    .contact-box .label.is-medium {
        font-size: 20px
    }

    .contact-box .field:not(:last-child) {
        margin-bottom: 12px
    }

    .contact-box .field-label .label {
        font-size: inherit
    }

    @media screen and (max-width:768px) {
        .contact-box .field-label {
            margin-bottom: 8px
        }
    }

    @media screen and (min-width:769px),
    print {
        .contact-box .field-label {
            flex-basis: 0;
            flex-grow: 1;
            flex-shrink: 0;
            margin-right: 24px;
            text-align: right
        }

        .contact-box .field-label.is-normal {
            padding-top: .375em
        }

        .contact-box .field-label.is-medium {
            font-size: 20px;
            padding-top: .375em
        }
    }

    .contact-box .field-body .field .field {
        margin-bottom: 0
    }

    @media screen and (min-width:769px),
    print {
        .contact-box .field-body {
            display: flex;
            flex-basis: 0;
            flex-grow: 5;
            flex-shrink: 1
        }

        .contact-box .field-body .field {
            margin-bottom: 0
        }

        .contact-box .field-body>.field {
            flex-shrink: 1
        }

        .contact-box .field-body>.field:not(:last-child) {
            margin-right: 12px
        }
    }

    .contact-box .control {
        box-sizing: border-box;
        clear: both;
        font-size: 16px;
        position: relative;
        text-align: inherit
    }

    .contact-box .has-text-link {
        color: #3273dc !important
    }

    .my-0 {
        margin-top: 0 !important;
        margin-bottom: 0 !important
    }

    .my-1 {
        margin-top: 4px !important;
        margin-bottom: 4px !important
    }

    .my-2 {
        margin-top: 8px !important;
        margin-bottom: 8px !important
    }

    .my-3 {
        margin-top: 12px !important;
        margin-bottom: 12px !important
    }

    .my-4 {
        margin-top: 16px !important;
        margin-bottom: 16px !important
    }

    .my-5 {
        margin-top: 24px !important;
        margin-bottom: 24px !important
    }

    .my-6 {
        margin-top: 3rem !important;
        margin-bottom: 3rem !important
    }

    .px-0 {
        padding-left: 0 !important;
        padding-right: 0 !important
    }

    .px-1 {
        padding-left: 4px !important;
        padding-right: 4px !important
    }

    .px-2 {
        padding-left: 8px !important;
        padding-right: 8px !important
    }

    .px-3 {
        padding-left: 12px !important;
        padding-right: 12px !important
    }

    .px-4 {
        padding-left: 16px !important;
        padding-right: 16px !important
    }

    .px-5 {
        padding-left: 24px !important;
        padding-right: 24px !important
    }

    .px-6 {
        padding-left: 3rem !important;
        padding-right: 3rem !important
    }

    .has-text-weight-normal {
        font-weight: 400 !important
    }

    .has-text-weight-medium {
        font-weight: 500 !important
    }

    .is-hidden {
        display: none !important
    }

    @media screen and (max-width:1023px) {
        .is-hidden-touch {
            display: none !important
        }
    }

    .js-validate-error-label {
        color: #dc143c;
        font-size: .9em
    }

    .js-validate-error-field {
        border: 1px solid #dc3545 !important
    }

    .js-validate-error-field:focus {
        box-shadow: 0 0 0 0 transparent
    }

    .fcf-attribution {
        font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #363636;
        padding-top: 15px;
        padding-bottom: 10px;
        text-align: right
    }

    .fcf-attribution-link {
        font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #363636;
        text-decoration: none
    }

    .inner-contact-box {
        max-width: 500px;
        margin: 0 auto;
        padding: 15px;
        background-color: #fff;
        box-sizing: border-box
    }

    .error {
        color: crimson;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $google_captcha_api = (\helper\options::options_by_key_type('google_captcha')) ? \helper\options::options_by_key_type('google_captcha') : "6Le_z6IZAAAAAFpVi9_AGboY38LdDjp4F1UoS7dn"; ?>

<div class="containing">
    <div class="row">
        <div class="contact-box">
            <div class="inner-contact-box">
                <div id="fcf-form">
                    <form class="fcf-form-class" id="contact-form" method="post">
                        <h1><span style="font-style: normal; font-weight: 400;">Contact Us</span></h1>
                        <div class="field">
                            <label for="Name" class="label has-text-weight-normal">Your name</label>
                            <div class="control">
                                <input type="text" name="Name" id="Name" class="input is-full-width " maxlength="60" data-validate-field="Name" style="">
                            </div>
                        </div>
                        <div class="field">
                            <label for="Email" class="label has-text-weight-normal">Your email address</label>
                            <div class="control">
                                <input type="text" name="Email" id="Email" class="input is-full-width " maxlength="100" data-validate-field="Email" style="">
                            </div>
                        </div>
                        <div class="field">
                            <label for="Website" class="label has-text-weight-normal">Your Website</label>
                            <div class="control">
                                <input type="text" name="Website" id="Website" class="input is-full-width" maxlength="100" data-validate-field="Website" style="">
                            </div>
                        </div>
                        <div class="field">
                            <label for="Topic" class="label has-text-weight-normal">Subject</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="Topic" id="Topic" data-validate-field="Topic" class="">
                                        <option value="Others" selected="">Others</option>
                                        <option value="Advertisement">Advertisement</option>
                                        <option value="Copyright Infringement">Copyright Infringement</option>
                                        <option value="Technincal Issues">Technincal Issues</option>
                                        <option value="New Game Requests">New Game Requests</option>
                                        <option value="New Game Requests">Game's Error Report</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="Message" class="label has-text-weight-normal">Your message</label>
                            <div class="control">
                                <textarea name="Message" id="Message" class="textarea" maxlength="3000" rows="10" data-validate-field="Message" style=""></textarea>
                            </div>
                        </div>
                        <div class="field">
                            <div id="contact_err">

                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <div class="g-recaptcha" data-sitekey="<?php echo $google_captcha_api; ?>"></div>
                                <input type="hidden" class="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha" required="">
                            </div>
                        </div>
                        <div id="fcf-status" class="fcf-status"></div>
                        <div class="field">
                            <div class="buttons">
                                <button id="fcf-button" type="submit" class="button is-link is-medium is-fullwidth" style="">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="fcf-thank-you" style="display:none" class="field">
                    <strong>Thank you</strong>
                    <p>Thanks for contacting us, we will get back in touch with you soon.</p>
                    <br><br>
                    <button type="button" class="button is-link is-medium"><a href="/">Go to home page</a></button>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/<?php echo DIR_THEME ?>rs/js/jquery.validate.min.js"></script>
<script>
    window.addEventListener("DOMContentLoaded", function() {
        jQuery("#contact-form").validate({
            focusInvalid: false,
            onfocusout: false,
            ignore: ".ignore",
            rules: {
                Name: {
                    required: true,
                    maxlength: 255,
                },
                Email: {
                    required: true,
                    email: true,
                    maxlength: 100
                },
                Website: {
                    required: false,
                    maxlength: 255,
                },
                Topic: {
                    required: false,
                    maxlength: 255,
                },
                Message: {
                    required: true,
                    maxlength: 65525
                },
                "hiddenRecaptcha": {
                    required: function() {
                        if (grecaptcha.getResponse() == '') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            },
            messages: {
                Name: {
                    required: "Please type your name!",
                    maxlength: "255"
                },
                Email: {
                    required: "Please type your email!",
                    email: "Please check a valid email!",
                    maxlength: "100"
                },
                Message: {
                    required: "Please type your message!",
                    maxlength: "65525"
                },
                "hiddenRecaptcha": {
                    required: "Please verify you are human!",
                }
            },
            submitHandler: function() {
                let question_ajax = "<?php echo get_format_uri('ajax', 'make-contact'); ?>";
                let name = jQuery("#Name").val();
                let email = jQuery("#Email").val();
                let website = jQuery("#Website").val();
                let subject = jQuery("#Topic").val();
                let message = jQuery("#Message").val();
                let metadataload = {};
                metadataload.name = name;
                metadataload.email = email;
                metadataload.website = website;
                metadataload.subject = subject;
                metadataload.message = message;
                jQuery.ajax({
                    url: question_ajax,
                    data: metadataload,
                    type: 'POST',
                    success: function(data) {
                        if (data != 0 || data != '0') {
                            showSuccessMessage();
                        }
                    }
                });
            }
        });
    });

    function showSuccessMessage(message) {
        document.getElementById('fcf-status').innerHTML = '';
        document.getElementById('fcf-form').style.display = 'none';
        document.getElementById('fcf-thank-you').style.display = 'block';
    }

    function resetFormDemo() {
        document.getElementById('fcf-form').style.display = "block";
        document.getElementById('fcf-thank-you').style.display = "none";
    }
</script>