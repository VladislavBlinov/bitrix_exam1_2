<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

if ($arResult["FORM_TYPE"] == "logout"):?>
	<ul class="d-flex align-items-center">

		<li class="nav-item dropdown pe-3">

			<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
				<span class="d-none d-md-block dropdown-toggle ps-2"><?=$arResult['USER_LOGIN']?></span>
			</a><!-- End Profile Iamge Icon -->

			<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
				<li class="dropdown-header">
					<h6><?=$arResult['USER_LOGIN']?></h6>
				</li>
				<li>
					<hr class="dropdown-divider">
				</li>

				<li>
					<a class="dropdown-item d-flex align-items-center" href="<?=$arResult['PROFILE_URL']?>">
						<i class="bi bi-person"></i>
						<span><?=Loc::getMessage("MY_PROFILE")?></span>
					</a>
				</li>
				<li>
					<hr class="dropdown-divider">
				</li>
				<li>
					<div class="col-12 mb-3 mt-3 d-flex justify-content-center">
						<form action="" method="post">
							<?=bitrix_sessid_post()?>
							<input type="hidden" name="logout" value="yes">
							<button
									class="btn btn-secondary btn-sm"
									type="submit"
									name="logout_butt"
									value="<?=Loc::getMessage("LOGOUT")?>"
							>
								<?=Loc::getMessage("LOGOUT")?>
							</button>
						</form>
					</div>
				</li>

			</ul><!-- End Profile Dropdown Items -->
		</li><!-- End Profile -->

	</ul>

<? endif ?>
