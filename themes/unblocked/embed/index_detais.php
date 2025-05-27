<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$site_name = \helper\options::options_by_key_type('site_name');
$game = \helper\game::find_by_slug($slug);
if ($game->source_html != '') {
    if (strpos($game->source_html, 'gamedistribution') || strpos('gamedistribution', $game->source_html)) {
        $game->source_html = $game->source_html . '?gd_sdk_referrer_url=' . $domain_url . '/' . $game->slug . '.embed';
    }
}
// detais version: btn, title, desc, img
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
                font-family: Roboto, sans-serif;
            }

            html,
            body {
                background-color: #fff;
            }
        </style>
    </head>

    <body cz-shortcut-listen="true" aria-hidden="false">
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
                    .gamePlayerSplash .gamePlayerBg .gamePlayerBgImage,.gamePlayerThumb>div{position:absolute;top:0;left:0;width:100%;height:100%;background-size:cover}.gamePlayerSplash,.gamePlayerThumb>div{background-repeat:no-repeat;background-position:center}#gamePlayermw1jclueedb9wbbpdztq{width:100%;background-color:#000;padding:inherit;box-sizing:border-box;overflow:hidden;position:relative;z-index:9999}#gamePlayermw1jclueedb9wbbpdztq>div:first-child{z-index:2147483647}:root{--min5050:50px;--min202:20px;--min203:20px;--min405:40px;--min255:25px;--min143:14px;--min22040:150px;--min15015:150px;--min505:50px;--min364:36px;--min202:20px}@supports (padding:min(12px,13vw)){:root{--min5050:min(50px, 5vw);--min202:min(20px, 2vw);--min405:40px;--min203:min(20px, 3vh);--min405:min(40px, 5vw);--min255:min(25px, 5vw);--min143:min(14px, 3vw);--min22040:min(220px, 40vw);--min15015:min(150px, 15vw);--min505:min(50px, 5vw);--min364:min(36px, 4vh);--min202:min(20px, 2vw)}}.gamePlayerSplash *{font-family:Roboto,sans-serif!important;font-weight:300}.gamePlayerSplash{display:block;padding:var(--min5050);overflow:hidden;width:100%;height:100%;position:relative;outline:0!important;transition:opacity .4s;opacity:1}.gamePlayerSplash .gamePlayerBg{display:block;width:100%;height:100%;position:absolute;top:0;left:0;z-index:1}.gamePlayerSplash .gamePlayerBg .gamePlayerBgImage{filter:blur(45px);transform:scale(1.3)}.gamePlayerSplash .gamePlayerSplashContent{background:rgba(255,255,255,.4);border-radius:50px;display:block;width:100%;height:100%;z-index:10;box-shadow:0 0 0 0 #fff,10px 20px 21px rgba(0,0,0,.4);position:relative;transition:box-shadow .2s}.gamePlayerSplash .gamePlayerSplashContent:hover{box-shadow:-2px -2px 10px 1px #fff,10px 20px 21px rgba(0,0,0,.4)}.gamePlayerSplashContent .gamePlayerCenterContent{display:grid;width:100%;height:100%;grid-template-columns:2fr 1fr;box-sizing:border-box;place-items:center;padding:var(--min202)}.gamePlayerSplashContent .gamePlayerCenterContent>div{text-align:center;padding:var(--min202);width:100%}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollInfo{display:grid;width:100%;text-align:left;row-gap:20px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerButtons{display:inline-block;text-align:center;display:grid;row-gap:20px;width:max-content;padding:20px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA{transition:.2s;position:relative;cursor:pointer}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover{transform:scale(1.1)}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA span{display:grid;grid-template-columns:auto auto;grid-gap:10px;background-color:#1c1c1c;color:#fff;border-radius:100px;padding:var(--min203) var(--min405);font-weight:400;font-size:var(--min255);box-shadow:0 0 20px rgba(0,0,0,.8);align-items:center;cursor:pointer;transition:.3s;text-transform:uppercase;user-select:none;pointer-events:none}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover span{background-color:#91000a}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA span:before{display:block;content:" ";background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAPCAYAAADUFP50AAABKklEQVQokY2TvyvEcRjHX75dDFIGFhmuFFaLC7NFERkNBvInuCubhdtsBsUimVx28iPJarHSme4kAyU/6qVPPur6du7uqc+zPJ/3834/7+fzQR1Un9RzNavSykmAXaAMVIB7YAvopVmoFXU9skypD+qbuqZm/mMPqaxupAp59V2tqrNqkgYmUVBbSlgR6Ab2gBJwBeRqLyQNJvkA8kBPnP8GOAGyzYB/8QzMARNAF3AGTLcC7I+s11HuKXDQCBi6bwMXcd5O4BCYAVbrAYNRi8Aj0AesAMvAKzAcZIaGmTrAfWASWIim7ESp89Hh34h73KzZ0ai6pJbUF7gamePlayerdqT3GBjbga/YZwQoAGPAETAEVOs6oN6ql2pR/VaP1YFmDz2kcfVTvVNzLf0O5QcZKy4YNKUs+wAAAABJRU5ErkJggg==);background-repeat:no-repeat;background-position:center;width:15px;height:15px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover span:before{animation:.3s infinite gamePlayerKnock}.gamePlayerPrerollCTA{position:relative}@keyframes gamePlayerKnock{0%{transform:translateX(0)}100%{transform:translateX(-10px)}}.gamePlayerThumb{display:block;position:relative;border-radius:50%;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,.4);width:var(--min22040);height:var(--min22040);transition:.3s;cursor:pointer;margin:auto}.gamePlayerThumb:hover{transform:scale(1.1);box-shadow:-2px -2px 10px 1px #fff,0 5px 40px rgba(0,0,0,.4)}.gamePlayerThumb>div{border-radius:50%;background-image:url(<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm') ?>)}.gamePlayerTitle{font-weight:300;font-size:var(--min364);user-select:none;color:#1c1c1c;line-height:normal;text-transform:capitalize}.gamePlayerTitle:after{content:""!important}.gamePlayerPrerollDescription{font-weight:400;font-size:15px;user-select:none;color:#1c1c1c}.gamePlayerBg .gamePlayerBgImage{background-image:url('<?php echo \helper\image::get_thumbnail($game->image, 180, 135, 'm') ?>')!important}@media only screen and (max-width:480px){.gamePlayerThumb{display:none}}
                </style>
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

                        if (document.getElementById("gamePlayermw1jclueedb9wbbpdztq")) {
                            await document.getElementById("gamePlayermw1jclueedb9wbbpdztq").remove();
                        }
                        document.body.append(frame_game);
                    }
                </script>

                <div id="gamePlayermw1jclueedb9wbbpdztq" data-gamePlayerplayer="true" class="">
                    <div class="gamePlayerSplashPreroll gamePlayerSplash">
                        <div class="gamePlayerBg">
                            <div class="gamePlayerBgImage"></div>
                        </div>
                        <div class="gamePlayerSplashContent">
                            <div class="gamePlayerCenterContent">
                                <div>
                                    <div class="gamePlayerPrerollInfo">
                                        <div class="gamePlayerButtons">
                                            <div class="gamePlayerPrerollCTA" id="btn_playgame" onclick="start_game_frame()">
                                                <span>Play game</span>
                                            </div>
                                        </div>
                                        <div class="gamePlayerTitle"><?php echo $game->name; ?></div>
                                        <div class="gamePlayerPrerollDescription"><?php echo $game->excerpt; ?>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="gamePlayerThumb">
                                        <div onclick="start_game_frame()"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <iframe id="iframehtml5" class="iframe-default" name="GAME FRAME" width="100%" height="100%" src="<?php echo $game->source_html ?>" title="<?php echo $game->name ?>" frameborder="0" border="0" scrolling="auto" allowfullscreen></iframe>
            <?php endif; ?>

        <?php elseif ($game->type == 'IN_GAME') : ?>
            <style>
                .gamePlayerSplash .gamePlayerBg .gamePlayerBgImage,.gamePlayerThumb>div{position:absolute;top:0;left:0;width:100%;height:100%;background-size:cover}.gamePlayerSplash,.gamePlayerThumb>div{background-repeat:no-repeat;background-position:center}#gamePlayermw1jclueedb9wbbpdztq{width:100%;background-color:#000;padding:inherit;box-sizing:border-box;overflow:hidden;position:relative;z-index:9999}#gamePlayermw1jclueedb9wbbpdztq>div:first-child{z-index:2147483647}:root{--min5050:50px;--min202:20px;--min203:20px;--min405:40px;--min255:25px;--min143:14px;--min22040:150px;--min15015:150px;--min505:50px;--min364:36px;--min202:20px}@supports (padding:min(12px,13vw)){:root{--min5050:min(50px, 5vw);--min202:min(20px, 2vw);--min405:40px;--min203:min(20px, 3vh);--min405:min(40px, 5vw);--min255:min(25px, 5vw);--min143:min(14px, 3vw);--min22040:min(220px, 40vw);--min15015:min(150px, 15vw);--min505:min(50px, 5vw);--min364:min(36px, 4vh);--min202:min(20px, 2vw)}}.gamePlayerSplash *{font-family:Roboto,sans-serif!important;font-weight:300}.gamePlayerSplash{display:block;padding:var(--min5050);overflow:hidden;width:100%;height:100%;position:relative;outline:0!important;transition:opacity .4s;opacity:1}.gamePlayerSplash .gamePlayerBg{display:block;width:100%;height:100%;position:absolute;top:0;left:0;z-index:1}.gamePlayerSplash .gamePlayerBg .gamePlayerBgImage{filter:blur(45px);transform:scale(1.3)}.gamePlayerSplash .gamePlayerSplashContent{background:rgba(255,255,255,.4);border-radius:50px;display:block;width:100%;height:100%;z-index:10;box-shadow:0 0 0 0 #fff,10px 20px 21px rgba(0,0,0,.4);position:relative;transition:box-shadow .2s}.gamePlayerSplash .gamePlayerSplashContent:hover{box-shadow:-2px -2px 10px 1px #fff,10px 20px 21px rgba(0,0,0,.4)}.gamePlayerSplashContent .gamePlayerCenterContent{display:grid;width:100%;height:100%;grid-template-columns:2fr 1fr;box-sizing:border-box;place-items:center;padding:var(--min202)}.gamePlayerSplashContent .gamePlayerCenterContent>div{text-align:center;padding:var(--min202);width:100%}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollInfo{display:grid;width:100%;text-align:left;row-gap:20px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerButtons{display:inline-block;text-align:center;display:grid;row-gap:20px;width:max-content;padding:20px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA{transition:.2s;position:relative;cursor:pointer}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover{transform:scale(1.1)}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA span{display:grid;grid-template-columns:auto auto;grid-gap:10px;background-color:#1c1c1c;color:#fff;border-radius:100px;padding:var(--min203) var(--min405);font-weight:400;font-size:var(--min255);box-shadow:0 0 20px rgba(0,0,0,.8);align-items:center;cursor:pointer;transition:.3s;text-transform:uppercase;user-select:none;pointer-events:none}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover span{background-color:#91000a}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA span:before{display:block;content:" ";background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAPCAYAAADUFP50AAABKklEQVQokY2TvyvEcRjHX75dDFIGFhmuFFaLC7NFERkNBvInuCubhdtsBsUimVx28iPJarHSme4kAyU/6qVPPur6du7uqc+zPJ/3834/7+fzQR1Un9RzNavSykmAXaAMVIB7YAvopVmoFXU9skypD+qbuqZm/mMPqaxupAp59V2tqrNqkgYmUVBbSlgR6Ab2gBJwBeRqLyQNJvkA8kBPnP8GOAGyzYB/8QzMARNAF3AGTLcC7I+s11HuKXDQCBi6bwMXcd5O4BCYAVbrAYNRi8Aj0AesAMvAKzAcZIaGmTrAfWASWIim7ESp89Hh34h73KzZ0ai6pJbUF7gamePlayerdqT3GBjbga/YZwQoAGPAETAEVOs6oN6ql2pR/VaP1YFmDz2kcfVTvVNzLf0O5QcZKy4YNKUs+wAAAABJRU5ErkJggg==);background-repeat:no-repeat;background-position:center;width:15px;height:15px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover span:before{animation:.3s infinite gamePlayerKnock}.gamePlayerPrerollCTA{position:relative}@keyframes gamePlayerKnock{0%{transform:translateX(0)}100%{transform:translateX(-10px)}}.gamePlayerThumb{display:block;position:relative;border-radius:50%;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,.4);width:var(--min22040);height:var(--min22040);transition:.3s;cursor:pointer;margin:auto}.gamePlayerThumb:hover{transform:scale(1.1);box-shadow:-2px -2px 10px 1px #fff,0 5px 40px rgba(0,0,0,.4)}.gamePlayerThumb>div{border-radius:50%;background-image:url(<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm') ?>)}.gamePlayerTitle{font-weight:300;font-size:var(--min364);user-select:none;color:#1c1c1c;line-height:normal;text-transform:capitalize}.gamePlayerTitle:after{content:""!important}.gamePlayerPrerollDescription{font-weight:400;font-size:15px;user-select:none;color:#1c1c1c}.gamePlayerBg .gamePlayerBgImage{background-image:url('<?php echo \helper\image::get_thumbnail($game->image, 180, 135, 'm') ?>')!important}@media only screen and (max-width:480px){.gamePlayerThumb{display:none}}
            </style>
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

                    if (document.getElementById("gamePlayermw1jclueedb9wbbpdztq")) {
                        await document.getElementById("gamePlayermw1jclueedb9wbbpdztq").remove();
                    }
                    document.body.append(frame_game);
                }
            </script>

            <div id="gamePlayermw1jclueedb9wbbpdztq" data-gamePlayerplayer="true" class="">
                <div class="gamePlayerSplashPreroll gamePlayerSplash">
                    <div class="gamePlayerBg">
                        <div class="gamePlayerBgImage"></div>
                    </div>
                    <div class="gamePlayerSplashContent">
                        <div class="gamePlayerCenterContent">
                            <div>
                                <div class="gamePlayerPrerollInfo">
                                    <div class="gamePlayerButtons">
                                        <div class="gamePlayerPrerollCTA" id="btn_playgame" onclick="start_game_frame()">
                                            <span>Play game</span>
                                        </div>
                                    </div>
                                    <div class="gamePlayerTitle"><?php echo $game->name; ?></div>
                                    <div class="gamePlayerPrerollDescription"><?php echo $game->excerpt; ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="gamePlayerThumb">
                                    <div onclick="start_game_frame()"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <style>
                .gamePlayerSplash .gamePlayerBg .gamePlayerBgImage,.gamePlayerThumb>div{position:absolute;top:0;left:0;width:100%;height:100%;background-size:cover}.gamePlayerSplash,.gamePlayerThumb>div{background-repeat:no-repeat;background-position:center}#gamePlayermw1jclueedb9wbbpdztq{width:100%;background-color:#000;padding:inherit;box-sizing:border-box;overflow:hidden;position:relative;z-index:9999}#gamePlayermw1jclueedb9wbbpdztq>div:first-child{z-index:2147483647}:root{--min5050:50px;--min202:20px;--min203:20px;--min405:40px;--min255:25px;--min143:14px;--min22040:150px;--min15015:150px;--min505:50px;--min364:36px;--min202:20px}@supports (padding:min(12px,13vw)){:root{--min5050:min(50px, 5vw);--min202:min(20px, 2vw);--min405:40px;--min203:min(20px, 3vh);--min405:min(40px, 5vw);--min255:min(25px, 5vw);--min143:min(14px, 3vw);--min22040:min(220px, 40vw);--min15015:min(150px, 15vw);--min505:min(50px, 5vw);--min364:min(36px, 4vh);--min202:min(20px, 2vw)}}.gamePlayerSplash *{font-family:Roboto,sans-serif!important;font-weight:300}.gamePlayerSplash{display:block;padding:var(--min5050);overflow:hidden;width:100%;height:100%;position:relative;outline:0!important;transition:opacity .4s;opacity:1}.gamePlayerSplash .gamePlayerBg{display:block;width:100%;height:100%;position:absolute;top:0;left:0;z-index:1}.gamePlayerSplash .gamePlayerBg .gamePlayerBgImage{filter:blur(45px);transform:scale(1.3)}.gamePlayerSplash .gamePlayerSplashContent{background:rgba(255,255,255,.4);border-radius:50px;display:block;width:100%;height:100%;z-index:10;box-shadow:0 0 0 0 #fff,10px 20px 21px rgba(0,0,0,.4);position:relative;transition:box-shadow .2s}.gamePlayerSplash .gamePlayerSplashContent:hover{box-shadow:-2px -2px 10px 1px #fff,10px 20px 21px rgba(0,0,0,.4)}.gamePlayerSplashContent .gamePlayerCenterContent{display:grid;width:100%;height:100%;grid-template-columns:2fr 1fr;box-sizing:border-box;place-items:center;padding:var(--min202)}.gamePlayerSplashContent .gamePlayerCenterContent>div{text-align:center;padding:var(--min202);width:100%}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollInfo{display:grid;width:100%;text-align:left;row-gap:20px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerButtons{display:inline-block;text-align:center;display:grid;row-gap:20px;width:max-content;padding:20px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA{transition:.2s;position:relative;cursor:pointer}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover{transform:scale(1.1)}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA span{display:grid;grid-template-columns:auto auto;grid-gap:10px;background-color:#1c1c1c;color:#fff;border-radius:100px;padding:var(--min203) var(--min405);font-weight:400;font-size:var(--min255);box-shadow:0 0 20px rgba(0,0,0,.8);align-items:center;cursor:pointer;transition:.3s;text-transform:uppercase;user-select:none;pointer-events:none}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover span{background-color:#91000a}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA span:before{display:block;content:" ";background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAPCAYAAADUFP50AAABKklEQVQokY2TvyvEcRjHX75dDFIGFhmuFFaLC7NFERkNBvInuCubhdtsBsUimVx28iPJarHSme4kAyU/6qVPPur6du7uqc+zPJ/3834/7+fzQR1Un9RzNavSykmAXaAMVIB7YAvopVmoFXU9skypD+qbuqZm/mMPqaxupAp59V2tqrNqkgYmUVBbSlgR6Ab2gBJwBeRqLyQNJvkA8kBPnP8GOAGyzYB/8QzMARNAF3AGTLcC7I+s11HuKXDQCBi6bwMXcd5O4BCYAVbrAYNRi8Aj0AesAMvAKzAcZIaGmTrAfWASWIim7ESp89Hh34h73KzZ0ai6pJbUF7gamePlayerdqT3GBjbga/YZwQoAGPAETAEVOs6oN6ql2pR/VaP1YFmDz2kcfVTvVNzLf0O5QcZKy4YNKUs+wAAAABJRU5ErkJggg==);background-repeat:no-repeat;background-position:center;width:15px;height:15px}.gamePlayerSplashContent .gamePlayerCenterContent .gamePlayerPrerollCTA:hover span:before{animation:.3s infinite gamePlayerKnock}.gamePlayerPrerollCTA{position:relative}@keyframes gamePlayerKnock{0%{transform:translateX(0)}100%{transform:translateX(-10px)}}.gamePlayerThumb{display:block;position:relative;border-radius:50%;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,.4);width:var(--min22040);height:var(--min22040);transition:.3s;cursor:pointer;margin:auto}.gamePlayerThumb:hover{transform:scale(1.1);box-shadow:-2px -2px 10px 1px #fff,0 5px 40px rgba(0,0,0,.4)}.gamePlayerThumb>div{border-radius:50%;background-image:url(<?php echo \helper\image::get_thumbnail($game->image, 200, 200, 'm') ?>)}.gamePlayerTitle{font-weight:300;font-size:var(--min364);user-select:none;color:#1c1c1c;line-height:normal;text-transform:capitalize}.gamePlayerTitle:after{content:""!important}.gamePlayerPrerollDescription{font-weight:400;font-size:15px;user-select:none;color:#1c1c1c}.gamePlayerBg .gamePlayerBgImage{background-image:url('<?php echo \helper\image::get_thumbnail($game->image, 180, 135, 'm') ?>')!important}@media only screen and (max-width:480px){.gamePlayerThumb{display:none}}
            </style>
            <script>
                let height2 = window.innerHeight || 600;
                let width2 = window.innerWidth || 600;
                async function openInNewWindow() {
                    const myWindow = window.open("<?php echo $game->source_html ?>", "", "width=" + width2 + ",height=" + height2);
                }
            </script>

            <div id="gamePlayermw1jclueedb9wbbpdztq" data-gamePlayerplayer="true" class="">
                <div class="gamePlayerSplashPreroll gamePlayerSplash">
                    <div class="gamePlayerBg">
                        <div class="gamePlayerBgImage"></div>
                    </div>
                    <div class="gamePlayerSplashContent">
                        <div class="gamePlayerCenterContent">
                            <div>
                                <div class="gamePlayerPrerollInfo">
                                    <div class="gamePlayerButtons">
                                        <div class="gamePlayerPrerollCTA" id="btn_playgame" onclick="openInNewWindow()">
                                            <span>Play game</span>
                                        </div>
                                    </div>
                                    <div class="gamePlayerTitle"><?php echo $game->name; ?></div>
                                    <div class="gamePlayerPrerollDescription"><?php echo $game->excerpt; ?>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="gamePlayerThumb">
                                    <div onclick="openInNewWindow()"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </body>

    </html>
<?php endif; ?>