<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$site_name = \helper\options::options_by_key_type('site_name');
$theme_url = '/' . DIR_THEME;
$game = \helper\game::find_by_slug($slug);
if ($game->source_html != '') {
    if (strpos($game->source_html, 'gamedistribution') || strpos('gamedistribution', $game->source_html)) {
        $game->source_html = $game->source_html . '?gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug . '.embed';
    }
}
// no background image + btn svg animation >
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
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
                            $array_source[1] = 'gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug . '.embed';
                            $game->source_html = $array_source[0] . $array_source[1];
                        }
                    } else {
                        $game->source_html = $game->source_html . '?gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug . '.embed';
                    }
                }
            }
            ?>
            <?php if (strpos($game->source_html, 'suika-game') !== false) : ?>
                <style>
                    .game-preloader {
                        align-items: center;
                        background: radial-gradient(#316883, #124056);
                        background-color: #232333;
                        box-sizing: border-box;
                        color: #fff;
                        display: flex;
                        flex-direction: column;
                        font-size: 16px;
                        line-height: normal;
                        height: 100%;
                        justify-content: center;
                        padding: 20px;
                        text-align: center;
                        width: 100%;
                    }

                    .game-preloader-image {
                        margin-bottom: 25px;
                    }

                    .game-preloader-image .gameplayimg {
                        border-radius: 10px;
                        box-shadow: 0 0 12px rgb(0 0 0 / 30%);
                    }

                    .fss74:hover {
                        transform: scale(1.1);
                        transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
                    }

                    .fss74 {
                        color: #3C1E6E;
                        cursor: pointer;
                        display: flex;
                        padding: 13px 24px 13px 24px;
                        position: relative;
                        transform: perspective(1px) translateZ(0);
                        align-items: center;
                        font-family: 'Fredoka One', sans-serif;
                        border-radius: 100px;
                        text-transform: capitalize;
                        justify-content: center;
                        background-color: #35FDFF;
                        transition-duration: 0.2s;
                        font-size: 21px;
                    }

                    .MuiSvgIcon-root {
                        fill: currentColor;
                        width: 1em;
                        height: 1em;
                        display: inline-block;
                        transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                        flex-shrink: 0;
                        user-select: none;
                    }

                    .fss73 {
                        animation: fss72 1.6s linear infinite;
                        font-size: 1.3em;
                        margin-left: 4px;
                        margin-right: -4px;
                        animation-delay: 0.2s;
                        background-size: contain;
                    }

                    @keyframes fss72 {
                        0% {
                            opacity: 1;
                            transform: translateX(0px) scale(1);
                        }

                        25% {
                            opacity: 0;
                            transform: translateX(10px) scale(0.9);
                        }

                        26% {
                            opacity: 0;
                            transform: translateX(-10px) scale(0.9);
                        }

                        55% {
                            opacity: 1;
                            transform: translateX(0px) scale(1);
                        }
                    }

                    .game-preloader-website-name {
                        background: linear-gradient(to right, rgba(30, 87, 153, 0) 0, rgba(0, 0, 0, .3) 50%, rgba(125, 185, 232, 0) 100%);
                        margin-top: 40px;
                        padding: 10px;
                        text-align: center;
                        color: white;
                        opacity: 0.5;
                        letter-spacing: 7px;
                        text-transform: uppercase;
                        font-size: 0.8571428571428571rem;
                        font-family: Montserrat, Arial, "Helvetica Neue", Helvetica, sans-serif;
                        font-weight: 400;
                        line-height: 1.66;
                    }
                </style>
                <div id="game-preloader" class="game-preloader">
                    <div class="game-preloader-image" onclick="startGame()">
                        <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 120, 'm'); ?>" width="260" height="155" class="gameplayimg" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>">
                    </div>
                    <div class="MuiGrid-root fss18 MuiGrid-item" onclick="start_game_frame()">
                        <div class="fss74 fss75">Play Now<svg class="MuiSvgIcon-root fss73" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="game-preloader-website-name">&nbsp;<?php echo $game->name; ?>&nbsp;</div>
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
                        if (document.getElementById("game-preloader")) {
                            await document.getElementById("game-preloader").remove();
                        }
                        document.body.append(frame_game);
                    }
                </script>
            <?php else : ?>
                <iframe id="iframehtml5" class="iframe-default" name="GAME FRAME" style="background-color:#fff" width="100%" height="100%" src="<?php echo $game->source_html ?>" title="<?php echo $game->name ?>" frameborder="0" border="0" scrolling="auto" allowfullscreen></iframe>
            <?php endif; ?>

        <?php elseif ($game->type == 'IN_GAME') : ?>
            <style>
                .game-preloader {
                    align-items: center;
                    background: radial-gradient(#316883, #124056);
                    background-color: #232333;
                    box-sizing: border-box;
                    color: #fff;
                    display: flex;
                    flex-direction: column;
                    font-size: 16px;
                    line-height: normal;
                    height: 100%;
                    justify-content: center;
                    padding: 20px;
                    text-align: center;
                    width: 100%;
                }

                .game-preloader-image {
                    margin-bottom: 25px;
                }

                .game-preloader-image .gameplayimg {
                    border-radius: 10px;
                    box-shadow: 0 0 12px rgb(0 0 0 / 30%);
                }

                .fss74:hover {
                    transform: scale(1.1);
                    transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
                }

                .fss74 {
                    color: #3C1E6E;
                    cursor: pointer;
                    display: flex;
                    padding: 13px 24px 13px 24px;
                    position: relative;
                    transform: perspective(1px) translateZ(0);
                    align-items: center;
                    font-family: 'Fredoka One', sans-serif;
                    border-radius: 100px;
                    text-transform: capitalize;
                    justify-content: center;
                    background-color: #35FDFF;
                    transition-duration: 0.2s;
                    font-size: 21px;
                }

                .MuiSvgIcon-root {
                    fill: currentColor;
                    width: 1em;
                    height: 1em;
                    display: inline-block;
                    transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                    flex-shrink: 0;
                    user-select: none;
                }

                .fss73 {
                    animation: fss72 1.6s linear infinite;
                    font-size: 1.3em;
                    margin-left: 4px;
                    margin-right: -4px;
                    animation-delay: 0.2s;
                    background-size: contain;
                }

                @keyframes fss72 {
                    0% {
                        opacity: 1;
                        transform: translateX(0px) scale(1);
                    }

                    25% {
                        opacity: 0;
                        transform: translateX(10px) scale(0.9);
                    }

                    26% {
                        opacity: 0;
                        transform: translateX(-10px) scale(0.9);
                    }

                    55% {
                        opacity: 1;
                        transform: translateX(0px) scale(1);
                    }
                }

                .game-preloader-website-name {
                    background: linear-gradient(to right, rgba(30, 87, 153, 0) 0, rgba(0, 0, 0, .3) 50%, rgba(125, 185, 232, 0) 100%);
                    margin-top: 40px;
                    padding: 10px;
                    text-align: center;
                    color: white;
                    opacity: 0.5;
                    letter-spacing: 7px;
                    text-transform: uppercase;
                    font-size: 0.8571428571428571rem;
                    font-family: Montserrat, Arial, "Helvetica Neue", Helvetica, sans-serif;
                    font-weight: 400;
                    line-height: 1.66;
                }
            </style>
            <div id="game-preloader" class="game-preloader">
                <div class="game-preloader-image" onclick="startGame()">
                    <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 120, 'm'); ?>" width="260" height="155" class="gameplayimg" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>">
                </div>
                <div class="MuiGrid-root fss18 MuiGrid-item" onclick="start_game_frame()">
                    <div class="fss74 fss75">Play Now<svg class="MuiSvgIcon-root fss73" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                        </svg>
                    </div>
                </div>
                <div class="game-preloader-website-name">&nbsp;<?php echo $game->name; ?>&nbsp;</div>
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
                    if (document.getElementById("game-preloader")) {
                        await document.getElementById("game-preloader").remove();
                    }
                    document.body.append(frame_game);
                }
            </script>

        <?php else : ?>
            <style>
                .game-preloader {
                    align-items: center;
                    background: radial-gradient(#316883, #124056);
                    background-color: #232333;
                    box-sizing: border-box;
                    color: #fff;
                    display: flex;
                    flex-direction: column;
                    font-size: 16px;
                    line-height: normal;
                    height: 100%;
                    justify-content: center;
                    padding: 20px;
                    text-align: center;
                    width: 100%;
                }

                .game-preloader-image {
                    margin-bottom: 25px;
                }

                .game-preloader-image .gameplayimg {
                    border-radius: 10px;
                    box-shadow: 0 0 12px rgb(0 0 0 / 30%);
                }

                .fss74:hover {
                    transform: scale(1.1);
                    transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
                }

                .fss74 {
                    color: #3C1E6E;
                    cursor: pointer;
                    display: flex;
                    padding: 13px 24px 13px 24px;
                    position: relative;
                    transform: perspective(1px) translateZ(0);
                    align-items: center;
                    font-family: 'Fredoka One', sans-serif;
                    border-radius: 100px;
                    text-transform: capitalize;
                    justify-content: center;
                    background-color: #35FDFF;
                    transition-duration: 0.2s;
                    font-size: 21px;
                }

                .MuiSvgIcon-root {
                    fill: currentColor;
                    width: 1em;
                    height: 1em;
                    display: inline-block;
                    transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                    flex-shrink: 0;
                    user-select: none;
                }

                .fss73 {
                    animation: fss72 1.6s linear infinite;
                    font-size: 1.3em;
                    margin-left: 4px;
                    margin-right: -4px;
                    animation-delay: 0.2s;
                    background-size: contain;
                }

                @keyframes fss72 {
                    0% {
                        opacity: 1;
                        transform: translateX(0px) scale(1);
                    }

                    25% {
                        opacity: 0;
                        transform: translateX(10px) scale(0.9);
                    }

                    26% {
                        opacity: 0;
                        transform: translateX(-10px) scale(0.9);
                    }

                    55% {
                        opacity: 1;
                        transform: translateX(0px) scale(1);
                    }
                }

                .game-preloader-website-name {
                    background: linear-gradient(to right, rgba(30, 87, 153, 0) 0, rgba(0, 0, 0, .3) 50%, rgba(125, 185, 232, 0) 100%);
                    margin-top: 40px;
                    padding: 10px;
                    text-align: center;
                    color: white;
                    opacity: 0.5;
                    letter-spacing: 7px;
                    text-transform: uppercase;
                    font-size: 0.8571428571428571rem;
                    font-family: Montserrat, Arial, "Helvetica Neue", Helvetica, sans-serif;
                    font-weight: 400;
                    line-height: 1.66;
                }
            </style>
            <div id="game-preloader" class="game-preloader">
                <div class="game-preloader-image" onclick="startGame()">
                    <img src="<?php echo \helper\image::get_thumbnail($game->image, 200, 120, 'm'); ?>" width="260" height="155" class="gameplayimg" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>">
                </div>
                <div class="MuiGrid-root fss18 MuiGrid-item" onclick="openInNewWindow()">
                    <div class="fss74 fss75">Play Now<svg class="MuiSvgIcon-root fss73" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                        </svg>
                    </div>
                </div>
                <div class="game-preloader-website-name">&nbsp;<?php echo $game->name; ?>&nbsp;</div>
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