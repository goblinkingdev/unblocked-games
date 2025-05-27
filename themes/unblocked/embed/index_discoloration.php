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
// discoloration version
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
            }

            html,
            body {
                background-color: #fff;
                color: #eee;
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
                    @keyframes pluto-gradient {
                        0% {
                            background-position: 0 50%
                        }

                        50% {
                            background-position: 100% 50%
                        }

                        to {
                            background-position: 0 50%
                        }
                    }

                    .splash {
                        background: linear-gradient(-45deg, #7887db, #e86195);
                        position: absolute;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        width: 100%;
                        z-index: 1;
                        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab) 0 0/300% 300%;
                        animation: pluto-gradient 60s ease 0s infinite normal none running;
                    }

                    .splash-content {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        z-index: 2;
                        transform: translate(-50%, -50%);
                    }

                    .splash-content img {
                        width: 180px;
                        height: auto;
                        border: 2px solid #fff;
                        border-radius: 8px;
                    }

                    .btn-play {
                        width: 184px;
                        height: 60px;
                        font-size: 20px;
                        font-weight: bold;
                        margin-top: 15px;
                        background: rgba(255, 255, 255, 0.8);
                        border: none;
                        border-radius: 8px;
                        cursor: pointer;
                    }

                    .splash-game-title {
                        position: absolute;
                        top: 95%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        font-size: 20px;
                    }
                </style>

                <div class="splash" id="splash">
                    <div class="splash-content">
                        <div class="splash-thumbnail" onclick="start_game_frame()">
                            <img src="<?php echo \helper\image::get_thumbnail($game->image, 160, 160, 'm'); ?>" width="160" height="160" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
                        </div>
                        <button aria-label="play now" class="btn-play" onclick="start_game_frame()">Play</button>
                    </div>
                    <div class="splash-game-title"><?php echo ucwords($game->name) ?></div>
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
                        document.getElementById("splash").remove();
                        document.body.append(frame_game);
                    }
                </script>
            <?php else : ?>
                <iframe id="iframehtml5" class="iframe-default" name="GAME FRAME" style="background-color:#fff" width="100%" height="100%" src="<?php echo $game->source_html ?>" title="<?php echo $game->name ?>" frameborder="0" border="0" scrolling="auto" allowfullscreen></iframe>
            <?php endif; ?>

        <?php elseif ($game->type == 'IN_GAME') : ?>
            <style>
                @keyframes pluto-gradient {
                    0% {
                        background-position: 0 50%
                    }

                    50% {
                        background-position: 100% 50%
                    }

                    to {
                        background-position: 0 50%
                    }
                }

                .splash {
                    background: linear-gradient(-45deg, #7887db, #e86195);
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    z-index: 1;
                    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab) 0 0/300% 300%;
                    animation: pluto-gradient 60s ease 0s infinite normal none running;
                }

                .splash-content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    z-index: 2;
                    transform: translate(-50%, -50%);
                }

                .splash-content img {
                    width: 180px;
                    height: auto;
                    border: 2px solid #fff;
                    border-radius: 8px;
                }

                .btn-play {
                    width: 184px;
                    height: 60px;
                    font-size: 20px;
                    font-weight: bold;
                    margin-top: 15px;
                    background: rgba(255, 255, 255, 0.8);
                    border: none;
                    border-radius: 8px;
                    cursor: pointer;
                }

                .splash-game-title {
                    position: absolute;
                    top: 95%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 20px;
                }
            </style>

            <div class="splash" id="splash">
                <div class="splash-content">
                    <div class="splash-thumbnail" onclick="start_game_frame()">
                        <img src="<?php echo \helper\image::get_thumbnail($game->image, 160, 160, 'm'); ?>" width="160" height="160" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
                    </div>
                    <button aria-label="play now" class="btn-play" onclick="start_game_frame()">Play</button>
                </div>
                <div class="splash-game-title"><?php echo ucwords($game->name) ?></div>
            </div>
            <script>
                let url_game2 = "<?php echo $game->source_html ?>";
                console.log(url_game2);
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
                    document.getElementById("splash").remove();
                    document.body.append(frame_game);
                }
            </script>

        <?php else : ?>
            <style>
                @keyframes pluto-gradient {
                    0% {
                        background-position: 0 50%
                    }

                    50% {
                        background-position: 100% 50%
                    }

                    to {
                        background-position: 0 50%
                    }
                }

                .splash {
                    background: linear-gradient(-45deg, #7887db, #e86195);
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    z-index: 1;
                    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab) 0 0/300% 300%;
                    animation: pluto-gradient 60s ease 0s infinite normal none running;
                }

                .splash-content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    z-index: 2;
                    transform: translate(-50%, -50%);
                }

                .splash-content img {
                    width: 180px;
                    height: auto;
                    border: 2px solid #fff;
                    border-radius: 8px;
                }

                .btn-play {
                    width: 184px;
                    height: 60px;
                    font-size: 20px;
                    font-weight: bold;
                    margin-top: 15px;
                    background: rgba(255, 255, 255, 0.8);
                    border: none;
                    border-radius: 8px;
                    cursor: pointer;
                }

                .splash-game-title {
                    position: absolute;
                    top: 95%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    font-size: 20px;
                }
            </style>

            <div class="splash" id="splash">
                <div class="splash-content">
                    <div class="splash-thumbnail" onclick="openInNewWindow()">
                        <img src="<?php echo \helper\image::get_thumbnail($game->image, 160, 160, 'm'); ?>" width="160" height="160" alt="<?php echo $game->name; ?>" title="<?php echo $game->name; ?>" />
                    </div>
                    <button aria-label="play now" class="btn-play" onclick="openInNewWindow()">Play</button>
                </div>
                <div class="splash-game-title"><?php echo ucwords($game->name) ?></div>
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