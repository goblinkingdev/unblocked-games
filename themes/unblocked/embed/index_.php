<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$site_name = \helper\options::options_by_key_type('site_name');
$game = \helper\game::find_by_slug($slug);
if ($game->source_html != '') {
    if (strpos($game->source_html, 'gamedistribution') || strpos('gamedistribution', $game->source_html)) {
        $game->source_html = $game->source_html . '?gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug . '.embed';
    }
}
// beautiful
?>

<?php if ($game) : ?>
    <html lang="en">

    <head>
        <title>Play <?php echo $game->name; ?> Game Online !</title>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex, nofollow, noodp, noydir" />
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0, user-scalable=no, minimal-ui" />
        <!-- <meta http-equiv="x-ua-compatible" content="ie=edge"> -->
        <meta http-equiv="X-UA-Compatible" content="requiresActiveX=true,IE=Edge,chrome=1" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="<?php echo $site_name; ?>">
        <meta http-equiv="Content-Language" content="en-US" />
        <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
        <meta property="og:type" content="game">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Helvetica Neue", "Calibri Light", Roboto, sans-serif;
            }

            html,
            body {
                background-color: #fff;
            }
        </style>

    </head>

    <body id="run_IFRAME_HTML">
        <?php if ($game->type == 'IFRAME_HTML') : ?>
            <?php
            if ($game->source_html != '') {
                if (strpos($game->source_html, 'gamedistribution')) {
                    $domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
                    if (strpos($game->source_html, 'gd_sdk_referrer_url')) {
                        $array_source = explode("gd_sdk_referrer_url", "$game->source_html");
                        if (count($array_source) > 1) {
                            $array_source[1] = 'gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug;
                            $game->source_html = $array_source[0] . $array_source[1];
                        }
                    } else {
                        $game->source_html = $game->source_html . '?gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug;
                    }
                }
            }
            ?>
            <?php if (strpos($game->source_html, 'y8') !== false) : ?>
                <style>
                    .PlayButton_container__MiBq1 {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        margin-bottom: auto;
                        transition: none;
                        overflow: hidden;
                    }

                    .PlayButton_container__MiBq1:before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        right: 0;
                        background: linear-gradient(142deg, rgba(61, 99, 205, 0.5), rgba(100, 36, 219, 0.5)), rgba(0, 0, 0, 0.7);
                        z-index: 2;
                    }

                    .PlayButton_imgBackground__Yldp3 {
                        position: relative;
                        width: 100%;
                        height: 100%;
                        filter: blur(10px);
                    }

                    .PlayButton_imgBackground__Yldp3 img {
                        width: 100%;
                        height: 100%;
                        object-position: center;
                        object-fit: fill;
                    }

                    .PlayButton_contentContainer__iaiRH {
                        position: absolute;
                        z-index: 2;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        margin: auto;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        gap: 12px;
                    }

                    @media (min-width: 768px) {
                        .PlayButton_contentContainer__iaiRH {
                            gap: 16px;
                        }
                    }

                    .PlayButton_smallImg__Rr1wP {
                        border-radius: 8px;
                    }

                    .PlayButton_title__j4bUo {
                        font-weight: 700;
                        font-size: 16px;
                        color: #fff;
                        text-align: center;
                    }

                    @media (min-width: 768px) {
                        .PlayButton_title__j4bUo {
                            font-size: 28px;
                        }
                    }

                    @keyframes PlayButton_pulse-grow-on-hover__qKNiD {
                        to {
                            transform: scale(1.1);
                        }
                    }

                    .PlayButton_btnContainer__DSUNb {
                        border: none;
                        outline: none;
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        min-width: 185px;
                        max-height: 60px;
                        width: max-content;
                        padding: 8px 16px 8px 8px;
                        z-index: 3;
                        border-radius: 70px;
                        background: linear-gradient(94.63deg, #3d63cd 10.2%, #6424db 89.98%);
                        box-shadow: 6px 2px 20px 0 hsla(0, 0%, 4%, 0.3);
                        cursor: pointer;
                        overflow: hidden;
                    }

                    @media (min-width: 768px) {
                        .PlayButton_btnContainer__DSUNb {
                            margin-top: 8px;
                            gap: 12px;
                            padding-left: 10px;
                        }
                    }

                    .PlayButton_btnContainer__DSUNb:hover {
                        animation-name: PlayButton_pulse-grow-on-hover__qKNiD;
                        animation-duration: 0.3s;
                        animation-timing-function: ease-out;
                        animation-iteration-count: infinite;
                        animation-direction: alternate;
                        animation-fill-mode: backwards;
                    }

                    .PlayButton_btnContainer__DSUNb svg {
                        transition: all 0.3s;
                    }

                    .PlayButton_btnText__81nj6 {
                        color: #fff;
                        font-size: 24px;
                        font-weight: 700;
                        line-height: 120%;
                        margin-top: -4px;
                        text-align: center;
                        min-height: 24px;
                        max-height: 24px;
                    }
                </style>
                <div class="PlayButton_container__MiBq1" id="preloading-game">
                    <div class="PlayButton_imgBackground__Yldp3">
                        <img width="156" height="105" src="<?php echo \helper\image::get_thumbnail($game->image, 160, 96, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
                    </div>
                    <div class="PlayButton_contentContainer__iaiRH">
                        <img class="PlayButton_smallImg__Rr1wP" style="color: transparent;" src="<?php echo \helper\image::get_thumbnail($game->image, 160, 96, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" fetchpriority="high" width="160" height="96" decoding="async" data-nimg="1" />
                        <h3 class="PlayButton_title__j4bUo"><?php echo $game->name; ?></h3>
                        <button class="PlayButton_btnContainer__DSUNb" onclick="start_game_frame()">
                            <svg width="46" height="46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 .25C10.456.25.25 10.456.25 23S10.456 45.75 23 45.75 45.75 35.544 45.75 23 35.544.25 23 .25Zm8.178 23.767L18.66 31.58a1.179 1.179 0 0 1-1.785-1.018V15.44a1.178 1.178 0 0 1 1.785-1.018l12.518 7.562a1.19 1.19 0 0 1 0 2.034Z" fill="#fff"></path>
                            </svg>
                            <span class="PlayButton_btnText__81nj6">Play now</span>
                        </button>
                    </div>
                </div>
                <script>
                    let url_game = "<?php echo $game->source_html ?>";
                    let is_game_layer = url_game.includes("gamedistribution") || url_game.includes("crazygame");
                    if (is_game_layer) {
                        start_game_frame();
                    }
                    async function start_game_frame() {
                        let frame_game = document.createElement('iframe');
                        frame_game.setAttribute('id', 'iframehtml5');
                        frame_game.setAttribute('width', '100%');
                        frame_game.setAttribute('height', '100%');
                        frame_game.setAttribute('frameborder', '0');
                        frame_game.setAttribute('border', '0');
                        frame_game.setAttribute('scrolling', 'auto');
                        frame_game.setAttribute('class', 'iframe-default');
                        frame_game.setAttribute('allowfullscreen', 'true');
                        frame_game.setAttribute('src', "<?php echo $game->source_html ?>");
                        frame_game.setAttribute('title', "<?php echo $game->name ?>");
                        if (document.getElementById("preloading-game")) {
                            await document.getElementById("preloading-game").remove();
                        }
                        document.body.append(frame_game);
                    }
                </script>
            <?php else : ?>
                <iframe id="iframehtml5" class="iframe-default" name="GAME FRAME" style="background-color:#fff" width="100%" height="100%" src="<?php echo $game->source_html ?>" title="<?php echo $game->name ?>" frameborder="0" border="0" scrolling="auto" allowfullscreen></iframe>
            <?php endif; ?>

        <?php elseif ($game->type == 'IN_GAME') : ?>
            <style>
                .PlayButton_container__MiBq1 {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    margin-bottom: auto;
                    transition: none;
                    overflow: hidden;
                }

                .PlayButton_container__MiBq1:before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    background: linear-gradient(142deg, rgba(61, 99, 205, 0.5), rgba(100, 36, 219, 0.5)), rgba(0, 0, 0, 0.7);
                    z-index: 2;
                }

                .PlayButton_imgBackground__Yldp3 {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    filter: blur(10px);
                }

                .PlayButton_imgBackground__Yldp3 img {
                    width: 100%;
                    height: 100%;
                    object-position: center;
                    object-fit: fill;
                }

                .PlayButton_contentContainer__iaiRH {
                    position: absolute;
                    z-index: 2;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    margin: auto;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    gap: 12px;
                }

                @media (min-width: 768px) {
                    .PlayButton_contentContainer__iaiRH {
                        gap: 16px;
                    }
                }

                .PlayButton_smallImg__Rr1wP {
                    border-radius: 8px;
                }

                .PlayButton_title__j4bUo {
                    font-weight: 700;
                    font-size: 16px;
                    color: #fff;
                    text-align: center;
                }

                @media (min-width: 768px) {
                    .PlayButton_title__j4bUo {
                        font-size: 28px;
                    }
                }

                @keyframes PlayButton_pulse-grow-on-hover__qKNiD {
                    to {
                        transform: scale(1.1);
                    }
                }

                .PlayButton_btnContainer__DSUNb {
                    border: none;
                    outline: none;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    min-width: 185px;
                    max-height: 60px;
                    width: max-content;
                    padding: 8px 16px 8px 8px;
                    z-index: 3;
                    border-radius: 70px;
                    background: linear-gradient(94.63deg, #3d63cd 10.2%, #6424db 89.98%);
                    box-shadow: 6px 2px 20px 0 hsla(0, 0%, 4%, 0.3);
                    cursor: pointer;
                    overflow: hidden;
                }

                @media (min-width: 768px) {
                    .PlayButton_btnContainer__DSUNb {
                        margin-top: 8px;
                        gap: 12px;
                        padding-left: 10px;
                    }
                }

                .PlayButton_btnContainer__DSUNb:hover {
                    animation-name: PlayButton_pulse-grow-on-hover__qKNiD;
                    animation-duration: 0.3s;
                    animation-timing-function: ease-out;
                    animation-iteration-count: infinite;
                    animation-direction: alternate;
                    animation-fill-mode: backwards;
                }

                .PlayButton_btnContainer__DSUNb svg {
                    transition: all 0.3s;
                }

                .PlayButton_btnText__81nj6 {
                    color: #fff;
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 120%;
                    margin-top: -4px;
                    text-align: center;
                    min-height: 24px;
                    max-height: 24px;
                }
            </style>
            <div class="PlayButton_container__MiBq1" id="preloading-game">
                <div class="PlayButton_imgBackground__Yldp3">
                    <img width="156" height="105" src="<?php echo \helper\image::get_thumbnail($game->image, 160, 96, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
                </div>
                <div class="PlayButton_contentContainer__iaiRH">
                    <img class="PlayButton_smallImg__Rr1wP" style="color: transparent;" src="<?php echo \helper\image::get_thumbnail($game->image, 160, 96, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" fetchpriority="high" width="160" height="96" decoding="async" data-nimg="1" />
                    <h3 class="PlayButton_title__j4bUo"><?php echo $game->name; ?></h3>
                    <button class="PlayButton_btnContainer__DSUNb" onclick="start_game_frame()">
                        <svg width="46" height="46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 .25C10.456.25.25 10.456.25 23S10.456 45.75 23 45.75 45.75 35.544 45.75 23 35.544.25 23 .25Zm8.178 23.767L18.66 31.58a1.179 1.179 0 0 1-1.785-1.018V15.44a1.178 1.178 0 0 1 1.785-1.018l12.518 7.562a1.19 1.19 0 0 1 0 2.034Z" fill="#fff"></path>
                        </svg>
                        <span class="PlayButton_btnText__81nj6">Play now</span>
                    </button>
                </div>
            </div>
            <script>
                let url_game2 = "<?php echo $game->source_html ?>";
                let is_game_layer2 = url_game2.includes("gamedistribution") || url_game2.includes("crazygame");
                if (is_game_layer2) {
                    start_game_frame();
                }
                async function start_game_frame() {
                    let frame_game = document.createElement('iframe');
                    frame_game.setAttribute('id', 'iframehtml5');
                    frame_game.setAttribute('width', '100%');
                    frame_game.setAttribute('height', '100%');
                    frame_game.setAttribute('frameborder', '0');
                    frame_game.setAttribute('border', '0');
                    frame_game.setAttribute('scrolling', 'auto');
                    frame_game.setAttribute('class', 'iframe-default');
                    frame_game.setAttribute('allowfullscreen', 'true');
                    frame_game.setAttribute('src', "<?php echo $game->source_html ?>");
                    frame_game.setAttribute('title', "<?php echo $game->name ?>");
                    if (document.getElementById("preloading-game")) {
                        await document.getElementById("preloading-game").remove();
                    }
                    document.body.append(frame_game);
                }
            </script>
        <?php else : ?>
            <style>
                .PlayButton_container__MiBq1 {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    margin-bottom: auto;
                    transition: none;
                    overflow: hidden;
                }

                .PlayButton_container__MiBq1:before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    background: linear-gradient(142deg, rgba(61, 99, 205, 0.5), rgba(100, 36, 219, 0.5)), rgba(0, 0, 0, 0.7);
                    z-index: 2;
                }

                .PlayButton_imgBackground__Yldp3 {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    filter: blur(10px);
                }

                .PlayButton_imgBackground__Yldp3 img {
                    width: 100%;
                    height: 100%;
                    object-position: center;
                    object-fit: fill;
                }

                .PlayButton_contentContainer__iaiRH {
                    position: absolute;
                    z-index: 2;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    margin: auto;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    gap: 12px;
                }

                @media (min-width: 768px) {
                    .PlayButton_contentContainer__iaiRH {
                        gap: 16px;
                    }
                }

                .PlayButton_smallImg__Rr1wP {
                    border-radius: 8px;
                }

                .PlayButton_title__j4bUo {
                    font-weight: 700;
                    font-size: 16px;
                    color: #fff;
                    text-align: center;
                }

                @media (min-width: 768px) {
                    .PlayButton_title__j4bUo {
                        font-size: 28px;
                    }
                }

                @keyframes PlayButton_pulse-grow-on-hover__qKNiD {
                    to {
                        transform: scale(1.1);
                    }
                }

                .PlayButton_btnContainer__DSUNb {
                    border: none;
                    outline: none;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    min-width: 185px;
                    max-height: 60px;
                    width: max-content;
                    padding: 8px 16px 8px 8px;
                    z-index: 3;
                    border-radius: 70px;
                    background: linear-gradient(94.63deg, #3d63cd 10.2%, #6424db 89.98%);
                    box-shadow: 6px 2px 20px 0 hsla(0, 0%, 4%, 0.3);
                    cursor: pointer;
                    overflow: hidden;
                }

                @media (min-width: 768px) {
                    .PlayButton_btnContainer__DSUNb {
                        margin-top: 8px;
                        gap: 12px;
                        padding-left: 10px;
                    }
                }

                .PlayButton_btnContainer__DSUNb:hover {
                    animation-name: PlayButton_pulse-grow-on-hover__qKNiD;
                    animation-duration: 0.3s;
                    animation-timing-function: ease-out;
                    animation-iteration-count: infinite;
                    animation-direction: alternate;
                    animation-fill-mode: backwards;
                }

                .PlayButton_btnContainer__DSUNb svg {
                    transition: all 0.3s;
                }

                .PlayButton_btnText__81nj6 {
                    color: #fff;
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 120%;
                    margin-top: -4px;
                    text-align: center;
                    min-height: 24px;
                    max-height: 24px;
                }
            </style>
            <div class="PlayButton_container__MiBq1" id="preloading-game">
                <div class="PlayButton_imgBackground__Yldp3">
                    <img width="156" height="105" src="<?php echo \helper\image::get_thumbnail($game->image, 160, 96, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
                </div>
                <div class="PlayButton_contentContainer__iaiRH">
                    <img class="PlayButton_smallImg__Rr1wP" style="color: transparent;" src="<?php echo \helper\image::get_thumbnail($game->image, 160, 96, 'm'); ?>" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" fetchpriority="high" width="160" height="96" decoding="async" data-nimg="1" />
                    <h3 class="PlayButton_title__j4bUo"><?php echo $game->name; ?></h3>
                    <button class="PlayButton_btnContainer__DSUNb" onclick="openInNewWindow()">
                        <svg width="46" height="46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 .25C10.456.25.25 10.456.25 23S10.456 45.75 23 45.75 45.75 35.544 45.75 23 35.544.25 23 .25Zm8.178 23.767L18.66 31.58a1.179 1.179 0 0 1-1.785-1.018V15.44a1.178 1.178 0 0 1 1.785-1.018l12.518 7.562a1.19 1.19 0 0 1 0 2.034Z" fill="#fff"></path>
                        </svg>
                        <span class="PlayButton_btnText__81nj6">Play now</span>
                    </button>
                </div>
            </div>
            <script>
                let height2 = window.innerHeight || 600;
                let width2 = window.innerWidth || 600;
                async function openInNewWindow() {
                    const myWindow = window.open("<?php echo $game->source_html ?>", "", "width=" + width2 + ",height=" + height2);
                }
            </script>
        <?php endif; ?>
    </body>

    </html>
<?php endif; ?>