<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap4');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'collapse');


/**
 * GET LOGO
 */
$logo = get_field('logo', 'options');
$logo_header = $logo['header_logo'];
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mohave:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bayon&family=Mohave:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
	<?php do_action('wp_body_open'); ?>

	<div class="site" id="page">


		<nav class="top-nav">
			<div class="container py-2">
				<div class="text-center text-uppercase">
					Free Shipping on Order over $250
				</div>
			</div>
		</nav>


		<header class="main__header">
			<div class="container py-2">
				<div class="row justify-content-between align-items-center">
					<?php if ($logo_header) : ?>
						<div class="col-6 col-md-2">
							<div class="logo me-5">
								<a href="<?php echo home_url() ?>">
									<img src="<?php echo $logo_header['sizes']['square_1'] ?>" alt="<?php echo $logo_header['alt'] ?>">
								</a>
							</div>
						</div>
					<?php endif ?>
					<div class="col-md-8 search">
						<div class="d-flex justify-content-center">
							<?php echo get_search_form() ?>
						</div>
					</div>
					<div class="col-6 col-md-2 account-detail">
						<div class="d-flex justify-content-end">
							<div class="cart me-3">
								<a href="<?php echo home_url() . '/cart/' ?>">
									<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M0 0.666667C0 0.489856 0.0702401 0.320286 0.195268 0.195262C0.320296 0.0702379 0.489871 0 0.666687 0H2.66675C2.81546 4.1082e-05 2.95989 0.0498009 3.07707 0.141366C3.19425 0.232932 3.27745 0.361045 3.31344 0.505333L3.85345 2.66667H19.3339C19.4318 2.66676 19.5285 2.6884 19.6171 2.73007C19.7057 2.77173 19.784 2.83239 19.8465 2.90774C19.909 2.98308 19.9541 3.07127 19.9787 3.16602C20.0032 3.26078 20.0066 3.35978 19.9886 3.456L17.9886 14.1227C17.96 14.2754 17.8789 14.4134 17.7593 14.5127C17.6398 14.6121 17.4893 14.6665 17.3339 14.6667H5.3335C5.17807 14.6665 5.02758 14.6121 4.90803 14.5127C4.78849 14.4134 4.70741 14.2754 4.67881 14.1227L2.68008 3.476L2.14673 1.33333H0.666687C0.489871 1.33333 0.320296 1.2631 0.195268 1.13807C0.0702401 1.01305 0 0.843478 0 0.666667ZM4.13613 4L5.88685 13.3333H16.7805L18.5312 4H4.13613ZM6.66687 14.6667C5.95961 14.6667 5.28131 14.9476 4.7812 15.4477C4.28108 15.9478 4.00012 16.6261 4.00012 17.3333C4.00012 18.0406 4.28108 18.7189 4.7812 19.219C5.28131 19.719 5.95961 20 6.66687 20C7.37414 20 8.05244 19.719 8.55255 19.219C9.05266 18.7189 9.33362 18.0406 9.33362 17.3333C9.33362 16.6261 9.05266 15.9478 8.55255 15.4477C8.05244 14.9476 7.37414 14.6667 6.66687 14.6667ZM16.0005 14.6667C15.2932 14.6667 14.6149 14.9476 14.1148 15.4477C13.6147 15.9478 13.3337 16.6261 13.3337 17.3333C13.3337 18.0406 13.6147 18.7189 14.1148 19.219C14.6149 19.719 15.2932 20 16.0005 20C16.7078 20 17.3861 19.719 17.8862 19.219C18.3863 18.7189 18.6672 18.0406 18.6672 17.3333C18.6672 16.6261 18.3863 15.9478 17.8862 15.4477C17.3861 14.9476 16.7078 14.6667 16.0005 14.6667ZM6.66687 16C7.02051 16 7.35965 16.1405 7.60971 16.3905C7.85977 16.6406 8.00025 16.9797 8.00025 17.3333C8.00025 17.687 7.85977 18.0261 7.60971 18.2761C7.35965 18.5262 7.02051 18.6667 6.66687 18.6667C6.31324 18.6667 5.97409 18.5262 5.72403 18.2761C5.47398 18.0261 5.3335 17.687 5.3335 17.3333C5.3335 16.9797 5.47398 16.6406 5.72403 16.3905C5.97409 16.1405 6.31324 16 6.66687 16ZM16.0005 16C16.3541 16 16.6933 16.1405 16.9433 16.3905C17.1934 16.6406 17.3339 16.9797 17.3339 17.3333C17.3339 17.687 17.1934 18.0261 16.9433 18.2761C16.6933 18.5262 16.3541 18.6667 16.0005 18.6667C15.6469 18.6667 15.3077 18.5262 15.0577 18.2761C14.8076 18.0261 14.6671 17.687 14.6671 17.3333C14.6671 16.9797 14.8076 16.6406 15.0577 16.3905C15.3077 16.1405 15.6469 16 16.0005 16Z" fill="black" />
									</svg>
								</a>
							</div>
							<div class="profile me-3 me-lg-0">
								<a href="<?php echo home_url() . '/my-account/' ?>">
									<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.375 17.5C19.55 17.5 23.75 19.4625 23.75 21.875V25H5V21.875C5 19.4625 9.2 17.5 14.375 17.5ZM22.5 21.875C22.5 20.15 18.8625 18.75 14.375 18.75C9.8875 18.75 6.25 20.15 6.25 21.875V23.75H22.5V21.875ZM14.375 6.25C15.5353 6.25 16.6481 6.71094 17.4686 7.53141C18.2891 8.35188 18.75 9.46468 18.75 10.625C18.75 11.7853 18.2891 12.8981 17.4686 13.7186C16.6481 14.5391 15.5353 15 14.375 15C13.2147 15 12.1019 14.5391 11.2814 13.7186C10.4609 12.8981 10 11.7853 10 10.625C10 9.46468 10.4609 8.35188 11.2814 7.53141C12.1019 6.71094 13.2147 6.25 14.375 6.25ZM14.375 7.5C13.5462 7.5 12.7513 7.82924 12.1653 8.41529C11.5792 9.00134 11.25 9.7962 11.25 10.625C11.25 11.4538 11.5792 12.2487 12.1653 12.8347C12.7513 13.4208 13.5462 13.75 14.375 13.75C15.2038 13.75 15.9987 13.4208 16.5847 12.8347C17.1708 12.2487 17.5 11.4538 17.5 10.625C17.5 9.7962 17.1708 9.00134 16.5847 8.41529C15.9987 7.82924 15.2038 7.5 14.375 7.5Z" fill="black" />
									</svg>
								</a>
							</div>
							<div class="open-mobile-menu" id="openMobile">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0,0,256,256">
									<g fill="#001524" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
										<g transform="scale(5.12,5.12)">
				
										<path d="M3,9c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h44c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587zM3,24c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h44c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587zM3,39c-0.36064,-0.0051 -0.69608,0.18438 -0.87789,0.49587c-0.18181,0.3115 -0.18181,0.69676 0,1.00825c0.18181,0.3115 0.51725,0.50097 0.87789,0.49587h44c0.36064,0.0051 0.69608,-0.18438 0.87789,-0.49587c0.18181,-0.3115 0.18181,-0.69676 0,-1.00825c-0.18181,-0.3115 -0.51725,-0.50097 -0.87789,-0.49587z"></path>
										</g>
									</g>
								</svg>
							</div>
						</div>
					</div>
				</div>

				<div class="header__main-menu" id="mainMenu">
					<div class="wrapper py-2 d-flex justify-content-center d-md-block">
						<?php wp_nav_menu(array(
							'theme_location' => 'main_menu',
							'menu_class' => 'main-menu',
							'container' => 'false'
						)); ?>
					</div>
				</div>

			</div>
		</header>