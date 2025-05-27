<?php
if ($list_cate) {
    $name = $list_cate[0]->name;
    $slug = '/games' . '/' . $list_cate[0]->slug;
} elseif ($list_tags) {
    $name = $list_tags[0]->name;
    $slug = '/tag' . '/' . $list_tags[0]->slug;
}
$game_name = $game->name;
?>

<style>
    .share_btn {
        margin: 4px;
        transition: opacity 0.2s ease 0s;
        opacity: 0.88;
        background-color: transparent;
        border: none;
        padding: 0px;
        font: inherit;
        color: inherit;
        cursor: pointer;
    }

    .share_btn:hover {
        z-index: 2;
        opacity: 1;
        position: relative;
        top: -4px;
    }

    .share_btn_comon {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        background: rgb(44, 100, 246);
    }

    .twitter {
        background: black;
    }

    .reddit {
        background: rgb(236, 101, 61);
    }

    .pinterest {
        background: #cb2027;
    }

    .whatsapp {
        background: rgb(88, 190, 85);
    }

    .telegram {
        background: #08c;
    }

    .share_svg {
        display: inline-block;
        fill: currentcolor;
        color: white;
        width: 24px;
        height: 24px;
    }

    .share_position {
        max-width: 600px;
        /* width: 100%; */
        position: absolute;
        top: 57px;
        left: -78px;
        display: flex;
        justify-content: center;
        overflow: hidden;
    }

    @media (max-width: 991px) {
        .share_position {
            left: 0;
        }
    }

    @media (max-width: 430px) {
        .share_btn:last-child {
            display: none;
        }
    }

    .hide-share {
        display: none;
    }


    /* fullscreen.php */
    .force_full_screen {
        position: fixed !important;
        width: 100% !important;
        height: 100% !important;
        z-index: 99999;
        top: 0px !important;
        border: 0px !important;
        left: 0px !important;
        right: 0px !important;
        cursor: pointer !important;
    }

    .exit-fullscreen {
        width: 36px;
        height: 36px;
        position: fixed;
        top: 5px;
        right: 5px;
        z-index: 100000;
        padding: 8px;
        color: white;
        background-color: rgba(0, 0, 0, 0.65);
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        cursor: pointer;
        font-family: sans-serif;
        line-height: 21px;
        font-size: 25px;
        border-radius: 6px;
    }

    .hidden {
        display: none;
    }
</style>


<div class="row mt-32" <?php echo $mt; ?>>
    <div class="col-lg order-1 order-lg-0">
        <div class="mb-4">
            <div class="card-category">
                <?php if ($name && $slug) : ?>
                    <a class="link-title card-category-title" href="<?php echo $slug ?>" title="<?php echo $name ?>"><?php echo $name ?></a>
                <?php else : ?>
                    <span class="">Game</span>
                <?php endif ?>
            </div>
            <h1 class="fs-4 text-title"><?php echo $game_name ?></h1>
        </div>
    </div>

    <?php if ($game) : ?>
        <div class="col-lg-auto text-end ">
            <div class="w-lg-300">
                <div class="mb-2 d-flex align-items-center justify-content-lg-end flex-nowrap play-btn-wrap">
                    <div class="d-flex play-btn">
                        <div class="dropdown mx-1 py-1 share-wrap">
                            <button class="header-game-extend dropdown-toggle" onclick="showSharingBox()" aria-label="open share" title="Share" data-title="Share">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M512,253.001L295.204,36.204v144.388C132.168,180.592,0,312.76,0,475.796c59.893-109.171,178.724-165.462,295.204-151.033 v145.034L512,253.001z"></path>
                                </svg>
                            </button>
                            <!-- share -->
                            <div class="share_position hide-share">
                                <button title="open facebook" aria-label="facebook" class="share_btn" onclick=" window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $url ?>', 'facebook-share-dialog', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false;">
                                    <div class="share_btn_comon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true" class="share_svg">
                                            <path d="M13.7416 22V12.8777H16.8023L17.2615 9.32156H13.7416V7.05147C13.7416 6.0222 14.0262 5.32076 15.5039 5.32076L17.3854 5.31999V2.13923C17.06 2.09695 15.9431 2 14.6431 2C11.9285 2 10.07 3.65697 10.07 6.69927V9.32156H7V12.8777H10.07V22H13.7416Z"></path>
                                        </svg>
                                    </div>
                                </button>
                                <button title="open twitter" aria-label="twitter" class="share_btn" onclick=" window.open('http://twitter.com/share?text=<?php echo $game_name; ?>&url=<?php echo $url ?>', 'twitter-share-dialog', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false">
                                    <div class="share_btn_comon twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" focusable="false" aria-hidden="true" class="share_svg">
                                            <path fill="white" d="M22.1885 3.75H26.0219L17.6469 13.3229L27.5 26.3469H19.7854L13.7437 18.4469L6.82917 26.3469H2.99375L11.9521 16.1073L2.5 3.75104H10.4104L15.8719 10.9719L22.1885 3.75ZM20.8438 24.0531H22.9677L9.25625 5.92396H6.97708L20.8438 24.0531Z"></path>
                                        </svg>
                                    </div>
                                </button>
                                <button title="open reddit" aria-label="reddit" class="share_btn" onclick=" window.open('https://www.reddit.com/login/?dest=https%3A%2F%2Fwww.reddit.com%2Fsubmit%3Ftitle%3D<?php echo $game_name; ?>%26url%3D<?php echo $url ?>', 'reddit-share-dialog', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false">
                                    <div class="share_btn_comon reddit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" focusable="false" aria-hidden="true" class="share_svg">
                                            <path fill="white" d="M20.3032 16.2506C20.3032 16.659 20.141 17.0507 19.8522 17.3395C19.5634 17.6283 19.1717 17.7905 18.7633 17.7905C18.3548 17.7905 17.9631 17.6283 17.6743 17.3395C17.3855 17.0507 17.2233 16.659 17.2233 16.2506C17.2233 15.8422 17.3855 15.4505 17.6743 15.1617C17.9631 14.8729 18.3548 14.7106 18.7633 14.7106C19.1717 14.7106 19.5634 14.8729 19.8522 15.1617C20.141 15.4505 20.3032 15.8422 20.3032 16.2506ZM11.2305 17.79C11.6388 17.79 12.0303 17.6278 12.319 17.3391C12.6077 17.0504 12.7699 16.6589 12.7699 16.2506C12.7699 15.8423 12.6077 15.4507 12.319 15.162C12.0303 14.8733 11.6388 14.7111 11.2305 14.7111C10.8222 14.7111 10.4306 14.8733 10.1419 15.162C9.85323 15.4507 9.69104 15.8423 9.69104 16.2506C9.69104 16.6589 9.85323 17.0504 10.1419 17.3391C10.4306 17.6278 10.8222 17.79 11.2305 17.79ZM11.6486 19.5795C11.4699 19.4743 11.2573 19.4429 11.0558 19.4918C10.8543 19.5407 10.6798 19.6661 10.5692 19.8414C10.4586 20.0168 10.4205 20.2283 10.4631 20.4312C10.5057 20.6341 10.6257 20.8124 10.7975 20.9285L11.1645 21.1604C12.3114 21.8838 13.6396 22.2676 14.9955 22.2676C16.3515 22.2676 17.6797 21.8838 18.8266 21.1604L19.1936 20.9295C19.2823 20.8736 19.3592 20.8008 19.4197 20.7152C19.4803 20.6297 19.5234 20.533 19.5467 20.4307C19.5699 20.3285 19.5727 20.2227 19.555 20.1193C19.5374 20.016 19.4995 19.9171 19.4436 19.8284C19.3877 19.7397 19.3149 19.6629 19.2293 19.6023C19.1438 19.5417 19.0471 19.4986 18.9448 19.4754C18.8426 19.4521 18.7368 19.4493 18.6334 19.467C18.5301 19.4846 18.4312 19.5225 18.3425 19.5784L17.9755 19.8103C17.0834 20.373 16.0503 20.6717 14.9955 20.6717C13.9408 20.6717 12.9077 20.373 12.0156 19.8103L11.6486 19.5795Z"></path>
                                            <path fill="white" d="M23.4684 3.75C22.5396 3.75 21.7279 4.2596 21.3002 5.01389L17.4702 4.22768C17.2897 4.19071 17.102 4.21735 16.9389 4.30306C16.7758 4.38877 16.6474 4.52829 16.5755 4.69792C16.1382 5.72562 15.4829 7.28421 14.935 8.61831C14.7414 9.09067 14.5605 9.53644 14.4084 9.92156C12.2306 10.0088 10.2135 10.578 8.56342 11.5004C8.29782 11.055 7.92984 10.6793 7.49003 10.4045C7.05021 10.1298 6.55122 9.96386 6.03445 9.92052C5.51768 9.87719 4.99802 9.95769 4.51858 10.1553C4.03914 10.353 3.61375 10.6621 3.27767 11.0571C2.94159 11.452 2.70453 11.9214 2.58614 12.4263C2.46775 12.9312 2.47145 13.457 2.59692 13.9602C2.7224 14.4634 2.96604 14.9294 3.30764 15.3196C3.64923 15.7098 4.07893 16.0129 4.5611 16.2038C4.42067 16.7144 4.34726 17.2432 4.34726 17.79C4.34726 20.0688 5.63349 22.0583 7.5655 23.4467C9.49963 24.8371 12.1295 25.6712 14.9999 25.6712C17.8692 25.6712 20.5001 24.8371 22.4343 23.4477C24.3663 22.0583 25.6525 20.0688 25.6525 17.79C25.6525 17.2432 25.578 16.7134 25.4397 16.2048C25.9217 16.0138 26.3513 15.7107 26.6927 15.3205C27.0342 14.9304 27.2777 14.4644 27.4031 13.9613C27.5286 13.4583 27.5322 12.9325 27.4139 12.4277C27.2955 11.923 27.0585 11.4537 26.7226 11.0587C26.3866 10.6638 25.9613 10.3547 25.482 10.157C25.0027 9.95928 24.4832 9.87866 23.9665 9.92183C23.4499 9.96501 22.9509 10.1307 22.5111 10.4052C22.0712 10.6798 21.7032 11.0552 21.4374 11.5004C19.9193 10.6524 18.0915 10.1024 16.1148 9.95135C16.2085 9.72155 16.3074 9.47686 16.4127 9.22366C16.8574 8.13744 17.3766 6.89908 17.7894 5.92244L21.0002 6.58205C21.0653 7.05616 21.2656 7.50149 21.577 7.86485C21.8885 8.22821 22.2979 8.49424 22.7565 8.63115C23.2151 8.76806 23.7034 8.77008 24.163 8.63695C24.6227 8.50382 25.0343 8.24118 25.3488 7.8804C25.6632 7.51962 25.8671 7.07595 25.9362 6.60239C26.0053 6.12883 25.9365 5.6454 25.7382 5.20985C25.54 4.77429 25.2205 4.40503 24.818 4.14616C24.4155 3.88729 23.9469 3.74976 23.4684 3.75ZM22.5726 6.2416C22.5726 6.00389 22.667 5.7759 22.8351 5.60781C23.0032 5.43972 23.2312 5.34529 23.4689 5.34529C23.7066 5.34529 23.9346 5.43972 24.1027 5.60781C24.2708 5.7759 24.3652 6.00389 24.3652 6.2416C24.3652 6.47932 24.2708 6.70731 24.1027 6.8754C23.9346 7.04349 23.7066 7.13792 23.4689 7.13792C23.2312 7.13792 23.0032 7.04349 22.8351 6.8754C22.667 6.70731 22.5726 6.47932 22.5726 6.2416ZM14.9999 11.5057C15.1637 11.5057 15.3265 11.5089 15.4893 11.5153C15.4876 11.5489 15.4833 11.5823 15.4765 11.6153L15.4744 11.6206L15.4776 11.6099L15.5084 11.5163C17.8745 11.6078 19.9778 12.3355 21.5023 13.4313C23.1375 14.6058 24.0567 16.158 24.0567 17.7911C24.0567 19.4252 23.1364 20.9774 21.5034 22.153C19.8693 23.3254 17.5734 24.0765 14.9999 24.0765C12.4264 24.0765 10.1305 23.3254 8.49746 22.1519C6.86227 20.9774 5.94308 19.4252 5.94308 17.7911C5.94308 16.158 6.86227 14.6058 8.49639 13.4313C10.1316 12.2546 12.4274 11.5036 14.9999 11.5036V11.5057ZM4.09512 13.1706C4.09521 12.7993 4.21938 12.4386 4.4479 12.1459C4.67642 11.8531 4.9962 11.6451 5.35644 11.5549C5.71669 11.4647 6.09674 11.4974 6.43626 11.6479C6.77577 11.7984 7.05527 12.058 7.23038 12.3855C6.38034 13.0557 5.67392 13.8462 5.17283 14.7303C4.85604 14.6106 4.58323 14.3972 4.39071 14.1186C4.19818 13.84 4.09508 13.5093 4.09512 13.1706ZM24.8269 14.7303C24.3258 13.8473 23.6194 13.0547 22.7694 12.3855C22.8965 12.1481 23.0792 11.9451 23.3018 11.7938C23.5245 11.6424 23.7806 11.5473 24.0481 11.5166C24.3156 11.4859 24.5865 11.5204 24.8377 11.6173C25.0889 11.7142 25.3129 11.8705 25.4905 12.0729C25.6681 12.2753 25.794 12.5177 25.8574 12.7793C25.9208 13.041 25.9199 13.3141 25.8546 13.5754C25.7894 13.8366 25.6618 14.0781 25.4829 14.2793C25.3039 14.4804 25.0788 14.6352 24.8269 14.7303Z"></path>
                                        </svg>
                                    </div>
                                </button>
                                <button title="open pinterest" aria-label="pinterest" class="share_btn" onclick=" window.open('https://www.pinterest.com/pin-builder/?description=<?php echo $game_name; ?>&media=<?php echo load_url()->domain_url() . '/' . $game->image ?>&method=button&url=<?php echo $url ?>', 'pinterest-share-dialog', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=600, height=300, toolbar=0, status=0');return false">
                                    <div class="share_btn_comon pinterest">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="share_svg">
                                            <path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z" />
                                        </svg>
                                    </div>
                                </button>
                                <button title="open whatsapp" aria-label="whatsapp" class="share_btn" onclick=" window.open('https://api.whatsapp.com/send?text=<?php echo $game_name; ?> <?php echo $url ?>', 'whatsapp-share-dialog', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false">
                                    <div class="share_btn_comon whatsapp">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" focusable="false" aria-hidden="true" class="share_svg">
                                            <path fill="white" d="M23.75 6.13757C22.604 4.97998 21.239 4.06216 19.7345 3.43764C18.2301 2.81312 16.6164 2.4944 14.9875 2.50007C8.1625 2.50007 2.6 8.06257 2.6 14.8876C2.6 17.0751 3.175 19.2001 4.25 21.0751L2.5 27.5001L9.0625 25.7751C10.875 26.7626 12.9125 27.2876 14.9875 27.2876C21.8125 27.2876 27.375 21.7251 27.375 14.9001C27.375 11.5876 26.0875 8.47507 23.75 6.13757ZM14.9875 25.1876C13.1375 25.1876 11.325 24.6876 9.7375 23.7501L9.3625 23.5251L5.4625 24.5501L6.5 20.7501L6.25 20.3626C5.22218 18.7213 4.67642 16.8241 4.675 14.8876C4.675 9.21257 9.3 4.58757 14.975 4.58757C17.725 4.58757 20.3125 5.66257 22.25 7.61257C23.2094 8.56753 23.9696 9.7034 24.4867 10.9544C25.0039 12.2053 25.2675 13.5465 25.2625 14.9001C25.2875 20.5751 20.6625 25.1876 14.9875 25.1876ZM20.6375 17.4876C20.325 17.3376 18.8 16.5876 18.525 16.4751C18.2375 16.3751 18.0375 16.3251 17.825 16.6251C17.6125 16.9376 17.025 17.6376 16.85 17.8376C16.675 18.0501 16.4875 18.0751 16.175 17.9126C15.8625 17.7626 14.8625 17.4251 13.6875 16.3751C12.7625 15.5501 12.15 14.5376 11.9625 14.2251C11.7875 13.9126 11.9375 13.7501 12.1 13.5876C12.2375 13.4501 12.4125 13.2251 12.5625 13.0501C12.7125 12.8751 12.775 12.7376 12.875 12.5376C12.975 12.3251 12.925 12.1501 12.85 12.0001C12.775 11.8501 12.15 10.3251 11.9 9.70007C11.65 9.10007 11.3875 9.17507 11.2 9.16257H10.6C10.3875 9.16257 10.0625 9.23757 9.775 9.55007C9.5 9.86257 8.7 10.6126 8.7 12.1376C8.7 13.6626 9.8125 15.1376 9.9625 15.3376C10.1125 15.5501 12.15 18.6751 15.25 20.0126C15.9875 20.3376 16.5625 20.5251 17.0125 20.6626C17.75 20.9001 18.425 20.8626 18.9625 20.7876C19.5625 20.7001 20.8 20.0376 21.05 19.3126C21.3125 18.5876 21.3125 17.9751 21.225 17.8376C21.1375 17.7001 20.95 17.6376 20.6375 17.4876Z"></path>
                                        </svg>
                                    </div>
                                </button>
                                <button title="open telegram" aria-label="telegram" class="share_btn" onclick=" window.open('https://t.me/share/url?url=<?php echo $url ?>&amp;text=<?php echo $game_name; ?>', 'telegram-share-dialog', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false">
                                    <div class="share_btn_comon telegram">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="share_svg">
                                            <path d="M29.919 6.163l-4.225 19.925c-0.319 1.406-1.15 1.756-2.331 1.094l-6.438-4.744-3.106 2.988c-0.344 0.344-0.631 0.631-1.294 0.631l0.463-6.556 11.931-10.781c0.519-0.462-0.113-0.719-0.806-0.256l-14.75 9.288-6.35-1.988c-1.381-0.431-1.406-1.381 0.288-2.044l24.837-9.569c1.15-0.431 2.156 0.256 1.781 2.013z"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <div class="dropdown mx-1 py-1">
                            <button class="header-game-extend" id="expand" aria-label="open fullscreen" title="Fullscreen" data-title="Fullscreen">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 9.5C8.38071 9.5 9.5 8.38071 9.5 7V2.5C9.5 1.94772 9.05228 1.5 8.5 1.5H7.5C6.94772 1.5 6.5 1.94772 6.5 2.5V6.5H2.5C1.94772 6.5 1.5 6.94772 1.5 7.5V8.5C1.5 9.05228 1.94772 9.5 2.5 9.5H7Z" />
                                    <path d="M17 9.5C15.6193 9.5 14.5 8.38071 14.5 7V2.5C14.5 1.94772 14.9477 1.5 15.5 1.5H16.5C17.0523 1.5 17.5 1.94772 17.5 2.5V6.5H21.5C22.0523 6.5 22.5 6.94772 22.5 7.5V8.5C22.5 9.05228 22.0523 9.5 21.5 9.5H17Z" />
                                    <path d="M17 14.5C15.6193 14.5 14.5 15.6193 14.5 17V21.5C14.5 22.0523 14.9477 22.5 15.5 22.5H16.5C17.0523 22.5 17.5 22.0523 17.5 21.5V17.5H21.5C22.0523 17.5 22.5 17.0523 22.5 16.5V15.5C22.5 14.9477 22.0523 14.5 21.5 14.5H17Z" />
                                    <path d="M9.5 17C9.5 15.6193 8.38071 14.5 7 14.5H2.5C1.94772 14.5 1.5 14.9477 1.5 15.5V16.5C1.5 17.0523 1.94772 17.5 2.5 17.5H6.5V21.5C6.5 22.0523 6.94772 22.5 7.5 22.5H8.5C9.05228 22.5 9.5 22.0523 9.5 21.5V17Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="action-game">
                        <div class="fs-sm"><?php echo \helper\number::convert_vn($game->views); ?> played </div>
                        <div class="progress mt-2 bg-transparent" style="height: 6px;">
                            <div class="progress-bar bg-theme rounded-pill" role="progressbar" style="width: 100%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end mt-2">
                            <button class="total-like" id-game="<?php echo $game->id; ?>" aria-label="click like" title="Like">
                                <svg xmlns="http://www.w3.org/2000/svg" class="emojis-img" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9 4.5C15.9 3 14.418 2 13.26 2c-.806 0-.869.612-.993 1.82-.055.53-.121 1.174-.267 1.93-.386 2.002-1.72 4.56-2.996 5.325V17C9 19.25 9.75 20 13 20h3.773c2.176 0 2.703-1.433 2.899-1.964l.013-.036c.114-.306.358-.547.638-.82.31-.306.664-.653.927-1.18.311-.623.27-1.177.233-1.67-.023-.299-.044-.575.017-.83.064-.27.146-.475.225-.671.143-.356.275-.686.275-1.329 0-1.5-.748-2.498-2.315-2.498H15.5S15.9 6 15.9 4.5zM5.5 10A1.5 1.5 0 0 0 4 11.5v7a1.5 1.5 0 0 0 3 0v-7A1.5 1.5 0 0 0 5.5 10z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>

<span class="exit-fullscreen hidden" id="_exit_full_screen">✕</span>

<script>
    function showSharingBox() {
        $(".share_position").toggleClass("hide-share");
        // $(".share_position").slideToggle("fast");
    }
</script>