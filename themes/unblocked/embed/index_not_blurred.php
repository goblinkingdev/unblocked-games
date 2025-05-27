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
// not blurred + Warning for children under 16 years old
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
                <style type="text/css">
                    .FG-splash-button {
                        border-bottom-color: #ffb53d !important;
                        color: #000;
                        background: linear-gradient(140deg, #fbde04, #e2c803)
                    }

                    .FG-splash-button:hover {
                        border-bottom-color: #ff5e00 !important;
                        color: #fff;
                        background: linear-gradient(140deg, #ff9214, #fa8500)
                    }

                    .FG-splash-button:active {
                        border-bottom-color: #ff7e33 !important;
                        background: linear-gradient(140deg, #ffa947, #ff9d2e)
                    }

                    .talpa-splash-background-container {
                        box-sizing: border-box;
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: #000;
                        overflow: hidden
                    }

                    .talpa-splash-background-image {
                        box-sizing: border-box;
                        position: absolute;
                        top: -25%;
                        left: -25%;
                        width: 150%;
                        height: 150%;
                        background-image: var(--thumb);
                        background-size: cover;
                        filter: blur(50px) brightness(1.5)
                    }

                    .talpa-splash-container {
                        display: flex;
                        flex-flow: column;
                        box-sizing: border-box;
                        position: absolute;
                        bottom: 0;
                        width: 100%;
                        height: 100%
                    }

                    .talpa-splash-top {
                        display: flex;
                        flex-flow: column;
                        box-sizing: border-box;
                        flex: 1;
                        align-self: center;
                        justify-content: center;
                        padding: 20px
                    }

                    .talpa-splash-top>div {
                        text-align: center
                    }

                    .talpa-splash-top>div>button {
                        position: relative;
                        min-width: 180px;
                        min-height: 45px;
                        line-height: 45px;
                        border: 0;
                        border-radius: 25px;
                        border-bottom: 5px solid grey;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                        text-align: center;
                        text-transform: uppercase;
                        text-shadow: 1px 1px 1px rgba(0, 0, 0, .004);
                        font-family: Roboto Condensed, Helvetica Neue, Arial, "sans-serif";
                        font-size: 16px;
                        font-weight: 400;
                        cursor: pointer;
                        box-shadow: inset 0 -1px 1px hsla(0, 0%, 100%, .1), inset 0 1px 1px hsla(0, 0%, 100%, .2);
                        will-change: transform;
                        transition: transform .15s linear
                    }

                    .talpa-splash-top>div>button:focus {
                        outline: none
                    }

                    .talpa-splash-top>div>button:active {
                        box-shadow: 0 10px 20px rgba(0, 0, 0, .19), 0 6px 6px rgba(0, 0, 0, .13);
                        transform: translateY(-5px)
                    }

                    .talpa-splash-top>div>div:first-child {
                        position: relative;
                        width: 150px;
                        height: 150px;
                        margin: auto auto 20px;
                        border-radius: 10px;
                        overflow: hidden;
                        border: 2px solid hsla(0, 0%, 100%, .8);
                        box-shadow: inset 0 5px 5px rgba(0, 0, 0, .5), 0 2px 4px rgba(0, 0, 0, .3);
                        background-image: var(--thumb);
                        background-position: 50%;
                        background-size: cover
                    }

                    /* can not be used by children under 16 years old */
                    .talpa-splash-bottom {
                        display: flex;
                        flex-flow: column;
                        box-sizing: border-box;
                        align-self: center;
                        justify-content: center;
                        width: 100%;
                        padding: 0 0 20px
                    }

                    .talpa-splash-bottom>.talpa-splash-consent {
                        box-sizing: border-box;
                        width: 100%;
                        padding: 20px;
                        background: linear-gradient(90deg, transparent, rgba(0, 0, 0, .5) 50%, transparent);
                        color: #fff;
                        text-align: left;
                        font-size: 12px;
                        font-family: Arial;
                        font-weight: 400;
                        text-shadow: 0 0 1px rgba(0, 0, 0, .7);
                        line-height: 150%
                    }

                    .talpa-splash-bottom>.talpa-splash-consent a {
                        color: #fff
                    }
                </style>

                <div id="gdsdk__splash" style="z-index: 1010; position: fixed; width: 100%; height: 100%; top: 0px; left: 0px;">
                    <div class="container p-0 rounded overflow-hidden" style="max-width: 320px; box-shadow: rgba(0, 0, 0, 0.14) 0px 1px 1px 0px, rgba(0, 0, 0, 0.12) 0px 2px 1px -1px, rgba(0, 0, 0, 0.2) 0px 1px 3px 0px;">
                        <div style="background-color: rgb(48, 48, 48);">
                            <div class="talpa-splash-background-container">
                                <div class="talpa-splash-background-image" style="--thumb: url(<?php echo \helper\image::get_thumbnail($game->image, 156, 112, 'm') ?>);"></div>
                            </div>
                            <div class="talpa-splash-container">
                                <div class="talpa-splash-top">
                                    <div>
                                        <div style="--thumb: url(<?php echo \helper\image::get_thumbnail($game->image, 148, 148, 'm') ?>);" onclick="start_game_frame()"></div>
                                        <button aria-label="play now" id="talpa-splash-button" class="FG-splash-button" style="display: block;" onclick="start_game_frame()">play now!</button>
                                    </div>
                                </div>
                                <div class="talpa-splash-bottom">
                                    <div class="talpa-splash-consent">We may show personalized ads provided by our partners, and our services can not be used by children under 16 years old without the consent of their legal guardian. By clicking "PLAY GAME", you consent to transmit your data to our partners for advertising purposes and declare that you are 16 years old or have the permission of your legal guardian. You can review our terms
                                        <!-- <a target="_blank">here</a>.</div> -->
                                    </div>
                                </div>
                            </div>
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
                            if (document.getElementById("gdsdk__splash")) {
                                await document.getElementById("gdsdk__splash").remove();
                            }
                            document.body.append(frame_game);
                        }
                    </script>
                <?php else : ?>
                    <iframe id="iframehtml5" class="iframe-default" name="GAME FRAME" style="background-color:#fff" width="100%" height="100%" src="<?php echo $game->source_html ?>" title="<?php echo $game->name ?>" frameborder="0" border="0" scrolling="auto" allowfullscreen></iframe>
                <?php endif; ?>

            <?php elseif ($game->type == 'IN_GAME') : ?>
                <style type="text/css">
                    .FG-splash-button {
                        border-bottom-color: #ffb53d !important;
                        color: #000;
                        background: linear-gradient(140deg, #fbde04, #e2c803)
                    }

                    .FG-splash-button:hover {
                        border-bottom-color: #ff5e00 !important;
                        color: #fff;
                        background: linear-gradient(140deg, #ff9214, #fa8500)
                    }

                    .FG-splash-button:active {
                        border-bottom-color: #ff7e33 !important;
                        background: linear-gradient(140deg, #ffa947, #ff9d2e)
                    }

                    .talpa-splash-background-container {
                        box-sizing: border-box;
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: #000;
                        overflow: hidden
                    }

                    .talpa-splash-background-image {
                        box-sizing: border-box;
                        position: absolute;
                        top: -25%;
                        left: -25%;
                        width: 150%;
                        height: 150%;
                        background-image: var(--thumb);
                        background-size: cover;
                        filter: blur(50px) brightness(1.5)
                    }

                    .talpa-splash-container {
                        display: flex;
                        flex-flow: column;
                        box-sizing: border-box;
                        position: absolute;
                        bottom: 0;
                        width: 100%;
                        height: 100%
                    }

                    .talpa-splash-top {
                        display: flex;
                        flex-flow: column;
                        box-sizing: border-box;
                        flex: 1;
                        align-self: center;
                        justify-content: center;
                        padding: 20px
                    }

                    .talpa-splash-top>div {
                        text-align: center
                    }

                    .talpa-splash-top>div>button {
                        position: relative;
                        min-width: 180px;
                        min-height: 45px;
                        line-height: 45px;
                        border: 0;
                        border-radius: 25px;
                        border-bottom: 5px solid grey;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                        text-align: center;
                        text-transform: uppercase;
                        text-shadow: 1px 1px 1px rgba(0, 0, 0, .004);
                        font-family: Roboto Condensed, Helvetica Neue, Arial, "sans-serif";
                        font-size: 16px;
                        font-weight: 400;
                        cursor: pointer;
                        box-shadow: inset 0 -1px 1px hsla(0, 0%, 100%, .1), inset 0 1px 1px hsla(0, 0%, 100%, .2);
                        will-change: transform;
                        transition: transform .15s linear
                    }

                    .talpa-splash-top>div>button:focus {
                        outline: none
                    }

                    .talpa-splash-top>div>button:active {
                        box-shadow: 0 10px 20px rgba(0, 0, 0, .19), 0 6px 6px rgba(0, 0, 0, .13);
                        transform: translateY(-5px)
                    }

                    .talpa-splash-top>div>div:first-child {
                        position: relative;
                        width: 150px;
                        height: 150px;
                        margin: auto auto 20px;
                        border-radius: 10px;
                        overflow: hidden;
                        border: 2px solid hsla(0, 0%, 100%, .8);
                        box-shadow: inset 0 5px 5px rgba(0, 0, 0, .5), 0 2px 4px rgba(0, 0, 0, .3);
                        background-image: var(--thumb);
                        background-position: 50%;
                        background-size: cover
                    }

                    /* can not be used by children under 16 years old */
                    .talpa-splash-bottom {
                        display: flex;
                        flex-flow: column;
                        box-sizing: border-box;
                        align-self: center;
                        justify-content: center;
                        width: 100%;
                        padding: 0 0 20px
                    }

                    .talpa-splash-bottom>.talpa-splash-consent {
                        box-sizing: border-box;
                        width: 100%;
                        padding: 20px;
                        background: linear-gradient(90deg, transparent, rgba(0, 0, 0, .5) 50%, transparent);
                        color: #fff;
                        text-align: left;
                        font-size: 12px;
                        font-family: Arial;
                        font-weight: 400;
                        text-shadow: 0 0 1px rgba(0, 0, 0, .7);
                        line-height: 150%
                    }

                    .talpa-splash-bottom>.talpa-splash-consent a {
                        color: #fff
                    }
                </style>

                <div id="gdsdk__splash" style="z-index: 1010; position: fixed; width: 100%; height: 100%; top: 0px; left: 0px;">
                    <div class="container p-0 rounded overflow-hidden" style="max-width: 320px; box-shadow: rgba(0, 0, 0, 0.14) 0px 1px 1px 0px, rgba(0, 0, 0, 0.12) 0px 2px 1px -1px, rgba(0, 0, 0, 0.2) 0px 1px 3px 0px;">
                        <div style="background-color: rgb(48, 48, 48);">
                            <div class="talpa-splash-background-container">
                                <div class="talpa-splash-background-image" style="--thumb: url(<?php echo \helper\image::get_thumbnail($game->image, 156, 112, 'm') ?>);"></div>
                            </div>
                            <div class="talpa-splash-container">
                                <div class="talpa-splash-top">
                                    <div>
                                        <div style="--thumb: url(<?php echo \helper\image::get_thumbnail($game->image, 148, 148, 'm') ?>);" onclick="start_game_frame()"></div>
                                        <button aria-label="play now" id="talpa-splash-button" class="FG-splash-button" style="display: block;" onclick="start_game_frame()">play now!</button>
                                    </div>
                                </div>
                                <div class="talpa-splash-bottom">
                                    <div class="talpa-splash-consent">We may show personalized ads provided by our partners, and our services can not be used by children under 16 years old without the consent of their legal guardian. By clicking "PLAY GAME", you consent to transmit your data to our partners for advertising purposes and declare that you are 16 years old or have the permission of your legal guardian. You can review our terms
                                        <!-- <a target="_blank">here</a>.</div> -->
                                    </div>
                                </div>
                            </div>
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
                            if (document.getElementById("gdsdk__splash")) {
                                await document.getElementById("gdsdk__splash").remove();
                            }
                            document.body.append(frame_game);
                        }
                    </script>

                <?php else : ?>
                    <style type="text/css">
                        .FG-splash-button {
                            border-bottom-color: #ffb53d !important;
                            color: #000;
                            background: linear-gradient(140deg, #fbde04, #e2c803)
                        }

                        .FG-splash-button:hover {
                            border-bottom-color: #ff5e00 !important;
                            color: #fff;
                            background: linear-gradient(140deg, #ff9214, #fa8500)
                        }

                        .FG-splash-button:active {
                            border-bottom-color: #ff7e33 !important;
                            background: linear-gradient(140deg, #ffa947, #ff9d2e)
                        }

                        .talpa-splash-background-container {
                            box-sizing: border-box;
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: #000;
                            overflow: hidden
                        }

                        .talpa-splash-background-image {
                            box-sizing: border-box;
                            position: absolute;
                            top: -25%;
                            left: -25%;
                            width: 150%;
                            height: 150%;
                            background-image: var(--thumb);
                            background-size: cover;
                            filter: blur(50px) brightness(1.5)
                        }

                        .talpa-splash-container {
                            display: flex;
                            flex-flow: column;
                            box-sizing: border-box;
                            position: absolute;
                            bottom: 0;
                            width: 100%;
                            height: 100%
                        }

                        .talpa-splash-top {
                            display: flex;
                            flex-flow: column;
                            box-sizing: border-box;
                            flex: 1;
                            align-self: center;
                            justify-content: center;
                            padding: 20px
                        }

                        .talpa-splash-top>div {
                            text-align: center
                        }

                        .talpa-splash-top>div>button {
                            position: relative;
                            min-width: 180px;
                            min-height: 45px;
                            line-height: 45px;
                            border: 0;
                            border-radius: 25px;
                            border-bottom: 5px solid grey;
                            white-space: nowrap;
                            text-overflow: ellipsis;
                            text-align: center;
                            text-transform: uppercase;
                            text-shadow: 1px 1px 1px rgba(0, 0, 0, .004);
                            font-family: Roboto Condensed, Helvetica Neue, Arial, "sans-serif";
                            font-size: 16px;
                            font-weight: 400;
                            cursor: pointer;
                            box-shadow: inset 0 -1px 1px hsla(0, 0%, 100%, .1), inset 0 1px 1px hsla(0, 0%, 100%, .2);
                            will-change: transform;
                            transition: transform .15s linear
                        }

                        .talpa-splash-top>div>button:focus {
                            outline: none
                        }

                        .talpa-splash-top>div>button:active {
                            box-shadow: 0 10px 20px rgba(0, 0, 0, .19), 0 6px 6px rgba(0, 0, 0, .13);
                            transform: translateY(-5px)
                        }

                        .talpa-splash-top>div>div:first-child {
                            position: relative;
                            width: 150px;
                            height: 150px;
                            margin: auto auto 20px;
                            border-radius: 10px;
                            overflow: hidden;
                            border: 2px solid hsla(0, 0%, 100%, .8);
                            box-shadow: inset 0 5px 5px rgba(0, 0, 0, .5), 0 2px 4px rgba(0, 0, 0, .3);
                            background-image: var(--thumb);
                            background-position: 50%;
                            background-size: cover
                        }

                        /* can not be used by children under 16 years old */
                        .talpa-splash-bottom {
                            display: flex;
                            flex-flow: column;
                            box-sizing: border-box;
                            align-self: center;
                            justify-content: center;
                            width: 100%;
                            padding: 0 0 20px
                        }

                        .talpa-splash-bottom>.talpa-splash-consent {
                            box-sizing: border-box;
                            width: 100%;
                            padding: 20px;
                            background: linear-gradient(90deg, transparent, rgba(0, 0, 0, .5) 50%, transparent);
                            color: #fff;
                            text-align: left;
                            font-size: 12px;
                            font-family: Arial;
                            font-weight: 400;
                            text-shadow: 0 0 1px rgba(0, 0, 0, .7);
                            line-height: 150%
                        }

                        .talpa-splash-bottom>.talpa-splash-consent a {
                            color: #fff
                        }
                    </style>

                    <div id="gdsdk__splash" style="z-index: 1010; position: fixed; width: 100%; height: 100%; top: 0px; left: 0px;">
                        <div class="container p-0 rounded overflow-hidden" style="max-width: 320px; box-shadow: rgba(0, 0, 0, 0.14) 0px 1px 1px 0px, rgba(0, 0, 0, 0.12) 0px 2px 1px -1px, rgba(0, 0, 0, 0.2) 0px 1px 3px 0px;">
                            <div style="background-color: rgb(48, 48, 48);">
                                <div class="talpa-splash-background-container">
                                    <div class="talpa-splash-background-image" style="--thumb: url(<?php echo \helper\image::get_thumbnail($game->image, 156, 112, 'm') ?>);"></div>
                                </div>
                                <div class="talpa-splash-container">
                                    <div class="talpa-splash-top">
                                        <div>
                                            <div style="--thumb: url(<?php echo \helper\image::get_thumbnail($game->image, 148, 148, 'm') ?>);" onclick="openInNewWindow()"></div>
                                            <button aria-label="play now" id="talpa-splash-button" class="FG-splash-button" style="display: block;" onclick="openInNewWindow()">play now!</button>
                                        </div>
                                    </div>
                                    <div class="talpa-splash-bottom">
                                        <div class="talpa-splash-consent">We may show personalized ads provided by our partners, and our services can not be used by children under 16 years old without the consent of their legal guardian. By clicking "PLAY GAME", you consent to transmit your data to our partners for advertising purposes and declare that you are 16 years old or have the permission of your legal guardian. You can review our terms
                                            <!-- <a target="_blank">here</a>. -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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