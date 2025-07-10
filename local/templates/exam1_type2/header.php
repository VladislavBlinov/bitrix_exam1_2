<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Page\Asset;

?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">

<head>
	<? $APPLICATION->ShowHead(); ?>

	<title><? $APPLICATION->ShowTitle() ?></title>

	<!-- Favicons -->
	<link href="<?=SITE_TEMPLATE_PATH?>/assets/img/favicon.png" rel="icon">

	<!-- Vendor CSS Files -->
	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap-icons/bootstrap-icons.css");
	?>

	<!-- Template Main CSS File -->
	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/style.css");
	?>

	<?
	Asset::getInstance()->addString('<meta content="width=device-width, initial-scale=1.0" name="viewport">');
	?>

</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
	<div class="d-flex align-items-center justify-content-between">
		<a href="/statistic_na/" class="logo d-flex align-items-center">
			<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.png" alt="">
			<span class="d-none d-lg-block">Статистика</span>
		</a>
		<i class="bi bi-list toggle-sidebar-btn"></i>
	</div><!-- End Logo -->

	<nav class="header-nav ms-auto">

		<? $APPLICATION->IncludeComponent(
			"bitrix:system.auth.form",
			"auth",
			array(
				"FORGOT_PASSWORD_URL" => "",
				"PROFILE_URL" => "/statistic_na/profile/",
				"REGISTER_URL" => "",
				"SHOW_ERRORS" => "N"
			)
		); ?>
	</nav><!-- End Icons Navigation -->

</header><!-- End Header -->


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<? $APPLICATION->IncludeComponent(
		"bitrix:menu",
		"left",
		array(
			"ALLOW_MULTI_SELECT" => "Y",
			"CHILD_MENU_TYPE" => "st_second",
			"DELAY" => "N",
			"MAX_LEVEL" => "2",
			"MENU_CACHE_GET_VARS" => [""],
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_TYPE" => "Y",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"ROOT_MENU_TYPE" => "st_first",
			"USE_EXT" => "N"
		)
	); ?>

</aside><!-- End Sidebar-->

<main id="main" class="main">

	<div class="pagetitle mb-4">
		<h1><? $APPLICATION->ShowTitle(false) ?></h1>
	</div><!-- End Page Title -->

	<section class="section <? $APPLICATION->ShowProperty('page_css_class') ?>">