<?php
$logo = \helper\options::options_by_key_type('logo');
$title = \helper\options::options_by_key_type('site_name');
$menu_header = \helper\menu::find_menu_by_menugroup('menu_header');
$menu_header = \helper\menu::to_menu_directory_style($menu_header);
?>
<header class="header fixed">
	<div class="container-fluid">
		<div class="header__content">
			<button class="header__btn" type="button" aria-label="header__nav">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H4ZM3 12C3 11.4477 3.44772 11 4 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H4C3.44772 13 3 12.5523 3 12ZM3 18C3 17.4477 3.44772 17 4 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H4C3.44772 19 3 18.5523 3 18Z" />
				</svg>
			</button>
			<div class="header__logo--wrap">
				<a href="/" class="header__logo" title="<?php echo $title ?>">
					<img src="<?php echo \helper\image::get_thumbnail($logo, '', 50, 'h') ?>" width="" height="50" title="<?php echo $title ?>" alt="<?php echo $title ?>">
				</a>
			</div>
			<button class="header__btn header__btn2" type="button" aria-label="header__nav">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
					<path d="m795.904 750.72 124.992 124.928a32 32 0 0 1-45.248 45.248L750.656 795.904a416 416 0 1 1 45.248-45.248zM480 832a352 352 0 1 0 0-704 352 352 0 0 0 0 704z" />
				</svg>
			</button>

			<div class="nav-right">
				<ul class="header__nav">
					<?php foreach ($menu_header as $k => $menu) : ?>
						<?php if ($k < 6) : ?>
							<?php if ($menu->child_items) : ?>
								<li class="header__dropdown">
									<a class="dropdown-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php echo $menu->title ?>"><?php echo $menu->title ?>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
											<path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" />
										</svg>
									</a>

									<ul class="dropdown-menu header__dropdown-menu">
										<?php foreach ($menu->child_items as $item) : ?>
											<li>
												<a href="<?php echo $item->url ?>" title="<?php echo $item->title ?>"><?php echo $item->title ?></a>
											</li>
										<?php endforeach ?>
									</ul>
								</li>
							<?php else : ?>
								<li>
									<a href="<?php echo $menu->url ?>" title="<?php echo $menu->title ?>"><?php echo $menu->title ?></a>
								</li>
							<?php endif ?>
						<?php endif ?>
					<?php endforeach ?>


					<?Php if (count($menu_header) > 7 || $external) : ?>
						<li class="header__dropdown">
							<a class="dropdown-link dropdown-link--menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" title="list-menu">
									<path d="M12,10a2,2,0,1,0,2,2A2,2,0,0,0,12,10ZM5,10a2,2,0,1,0,2,2A2,2,0,0,0,5,10Zm14,0a2,2,0,1,0,2,2A2,2,0,0,0,19,10Z" />
								</svg></a>

							<ul class="dropdown-menu header__dropdown-menu">
								<?php foreach ($menu_header as $k => $menu) : ?>
									<?php if ($k >= 6) : ?>
										<li>
											<a href="<?php echo $menu->url ?>" title="<?php echo $menu->title ?>"><?php echo $menu->title ?></a>
										</li>
									<?php endif ?>
								<?php endforeach ?>

								<?php foreach ($external as $k => $menu) : ?>
									<li <?php echo $k == 0 ? 'style="padding-top: 6px; border-top: 1px solid #f1f1f1"' : '' ?>>
										<a href="<?php echo $menu->url ?>" target="<?php echo $menu->target ?>" rel="<?php echo $menu->nofollow ? 'nofollow' : 'dofollow' ?>" title="<?php echo $menu->title ?>"><?php echo $menu->title ?></a>
									</li>
								<?php endforeach ?>
							</ul>
						</li>
					<?php endif ?>
				</ul>
				<div class="dark_mode">
					<div class="dark_item">
						<button class="light-on">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon-color" viewBox="0 0 24 24" width="24" height="24">
								<path fill="none" d="M0 0h24v24H0z"></path>
								<path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"></path>
							</svg>
						</button>
						<button class="light-off">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon-color" viewBox="0 0 24 24" width="24" height="24">
								<path fill="none" d="M0 0h24v24H0z"></path>
								<path d="M11.38 2.019a7.5 7.5 0 1 0 10.6 10.6C21.662 17.854 17.316 22 12.001 22 6.477 22 2 17.523 2 12c0-5.315 4.146-9.661 9.38-9.981z"></path>
							</svg>
						</button>
					</div>
				</div>

				<div class="filter__search">
					<div class="search-form">
						<div class="flex-sb search-wrap">
							<input id="game-search" class="button search-term" type="text" value="<?php echo $keywords; ?>" placeholder="Search" autocomplete="off">
							<div class="btn-search">
								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M10 0.5C4.75329 0.5 0.5 4.75329 0.5 10C0.5 15.2467 4.75329 19.5 10 19.5C12.082 19.5 14.0076 18.8302 15.5731 17.6944L20.2929 22.4142C20.6834 22.8047 21.3166 22.8047 21.7071 22.4142L22.4142 21.7071C22.8047 21.3166 22.8047 20.6834 22.4142 20.2929L17.6944 15.5731C18.8302 14.0076 19.5 12.082 19.5 10C19.5 4.75329 15.2467 0.5 10 0.5ZM3.5 10C3.5 6.41015 6.41015 3.5 10 3.5C13.5899 3.5 16.5 6.41015 16.5 10C16.5 13.5899 13.5899 16.5 10 16.5C6.41015 16.5 3.5 13.5899 3.5 10Z" />
								</svg>
							</div>

							<!-- search-more -->
							<div class="search-more" id="search-ajax"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</header>

<script>
	function setLocalStorage(key, value) {
		localStorage.setItem(key, value);
	}

	function getLocalStorage(key) {
		return localStorage.getItem(key);

	}

	function checkValueOfThemeMode() {
		let theme_mode = getLocalStorage('theme_mode'); // value == lightmode / darkmode ==  name_class(js)
		document.querySelector('body').classList.add(theme_mode);
		if (theme_mode && theme_mode == "lightmode") {
			document.querySelector('.light-on').setAttribute("style", "display: none");
			document.querySelector('.light-off').setAttribute("style", "display:flex!important");
		}
	}
	checkValueOfThemeMode();
</script>