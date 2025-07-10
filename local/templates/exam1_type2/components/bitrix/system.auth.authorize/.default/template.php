<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Main\Localization\Loc;

?>

<div class="row justify-content-center">
	<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
		<div class="card mb-3">
			<div class="card-body">

				<div class="pt-4 pb-2">
					<p class="text-center small"><?=Loc::getMessage("PLEASE_AUTH");?></p>
				</div>

				<form
						class="row g-3 needs-validation" novalidate
						name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>"
				>

					<input type="hidden" name="AUTH_FORM" value="Y"/>
					<input type="hidden" name="TYPE" value="AUTH"/>
					<? if ($arResult["BACKURL"] <> ''): ?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
					<? endif ?>
					<? foreach ($arResult["POST"] as $key => $value): ?>
						<input type="hidden" name="<?=$key?>" value="<?=$value?>"/>
					<? endforeach ?>

					<div class="col-12">
						<label for="yourUsername" class="form-label"><?=Loc::getMessage("LOGIN");?></label>
						<div class="input-group has-validation">
							<input
									type="text" class="form-control" id="yourUsername" required
									name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>"
							>
							<div class="invalid-feedback"><?=Loc::getMessage("LOGIN_EMPTY");?></div>
						</div>
					</div>

					<div class="col-12">
						<label for="yourPassword" class="form-label"><?=Loc::getMessage("PASSWORD");?></label>
						<input
								class="form-control" id="yourPassword" required
								type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off"
						>
						<div class="invalid-feedback"><?=Loc::getMessage("PASSWORD_EMPTY");?></div>
					</div>

					<div class="col-12">
						<div class="form-check">
							<input
									class="form-check-input"
									type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y"
							>
							<label class="form-check-label"
									for="USER_REMEMBER"><?=Loc::getMessage("REMEMBER_ME");?></label>
						</div>
					</div>

					<? if ($arResult["CAPTCHA_CODE"]): ?>
						<!-- IF USED CAPTCHA -->
						<div class="col-12">
							<label class="form-label"><?=Loc::getMessage("CAPTCHA");?></label>
							<div class="input-group has-validation">
								<input required class="form-control" type="text" name="captcha_word" maxlength="50"/>
								<div class="invalid-feedback"><?=Loc::getMessage("CAPTCHA_EMPTY");?></div>
							</div>
						</div>
						<div class="col-12">
							<input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
							<!-- CAPTCHA_CODE -->
							<img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
									width="180" height="40" alt="CAPTCHA"/> <!-- IMG CAPTCHA_CODE -->
						</div>
						<!-- END CAPTCHA -->
					<? endif; ?>

					<div class="col-12">
						<button
								class="btn btn-primary w-100" type="submit"
								name="Login"><?=Loc::getMessage("AUTHORIZE");?>
						</button>
					</div>

					<? if ($arParams["NOT_SHOW_LINKS"] != "Y" && $arResult["NEW_USER_REGISTRATION"] == "Y"): ?>
						<noindex>
							<div class="col-12">
								<p class="small mb-0"><?=Loc::getMessage("FIRST_ONE");?>
									<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow">
										<?=Loc::getMessage("REGISTER");?>
									</a>
								</p>
							</div>
						</noindex>

					<? endif ?>

					<? if ($arParams["NOT_SHOW_LINKS"] != "Y"): ?>
						<noindex>
							<div class="col-12">
								<p class="small mb-0">
									<?=Loc::getMessage("FORGOT_PASSWORD");?>
									<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow">
										<?=Loc::getMessage("RECOVER");?>
									</a>
								</p>
							</div>
						</noindex>

					<? endif ?>

				</form>

			</div>
		</div>


	</div>
</div>
<!-- END AUTH FORM -->
