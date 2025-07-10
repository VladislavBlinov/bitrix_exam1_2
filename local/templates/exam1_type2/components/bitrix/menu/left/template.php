<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
} ?>

<? if (!empty($arResult)): ?>

	<ul class="sidebar-nav" id="sidebar-nav">

	<?
	$previousLevel = 0;
foreach ($arResult

	as $arItem): ?>

	<? if ($previousLevel && $arItem["DEPTH_LEVEL"]<$previousLevel): ?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<? endif ?>

	<? if ($arItem["PERMISSION"]>"D"): ?>
	<? if ($arItem["IS_PARENT"]): ?>

	<? if ($arItem["DEPTH_LEVEL"] == 1): ?>
	<li class="nav-item">
	<a class="nav-link <?=!$arItem['SELECTED'] ? 'collapsed' : ''?>"
			data-bs-target="#<?=$arItem['ITEM_INDEX']?>-nav"
			data-bs-toggle="collapse" href="<?=$arItem["LINK"]?>">
		<i class="bi <?=$arItem['PARAMS']['menu_ico'] ?? 'bi-layout-text-window-reverse'?>">
		</i>
		<span><?=$arItem["TEXT"]?></span>
		<i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="<?=$arItem['ITEM_INDEX']?>-nav" class="nav-content <?=!$arItem['SELECTED'] ? 'collapse' : ''?>"
			data-bs-parent="#sidebar-nav">

	<? endif ?>

	<? else: ?>

		<? if ($arItem["DEPTH_LEVEL"] == 1): ?>
			<li class="nav-item">
				<a class="nav-link <?=!$arItem['SELECTED'] ? 'collapsed' : ''?>" href="<?=$arItem["LINK"]?>">
					<i class="bi <?=$arItem['PARAMS']['menu_ico'] ?? 'bi-layout-text-window-reverse'?>"></i>
					<span><?=$arItem["TEXT"]?></span>
				</a>
			</li>
		<? else: ?>
			<li>
				<a <?=$arItem['SELECTED'] ? 'class="active"' : ''?> href="<?=$arItem["LINK"]?>">
					<i class="bi bi-circle"></i>
					<span><?=$arItem["TEXT"]?></span>
				</a>
			</li>
		<? endif ?>

	<? endif ?>

	<? endif ?>

	<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

<? endforeach ?>

	<? if ($previousLevel>1)://close last item tags?>
		<?=str_repeat("</ul></li>", ($previousLevel - 1));?>
	<? endif ?>

	</ul>
<? endif ?>