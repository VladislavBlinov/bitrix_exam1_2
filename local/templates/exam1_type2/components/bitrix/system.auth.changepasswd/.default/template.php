<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\Json;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>

<!-- CHANGEPASSWD FORM -->
<div class="row justify-content-center">
	<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
		<div class="card mb-3">
			<div class="card-body">
				<? if (!empty($arParams["~AUTH_RESULT"])): ?>
					<div class="pt-4 pb-2">
						<p class="small"><? ShowMessage($arParams["~AUTH_RESULT"]); ?></p>
					</div>
				<? endif; ?>

				<? if ($arResult["SHOW_FORM"]): ?>
				<form
						class="row g-3 needs-validation" novalidate method="post" action="<?=$arResult["AUTH_URL"]?>"
						name="bform">

					<? if ($arResult["BACKURL"] <> ''): ?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
					<? endif ?>
					<input type="hidden" name="AUTH_FORM" value="Y">
					<input type="hidden" name="TYPE" value="CHANGE_PWD">

					<div class="col-12">
						<label class="form-label"><?=Loc::getMessage('LOGIN')?></label>
						<div class="input-group has-validation">
							<input class="form-control" required type="text" name="USER_LOGIN" maxlength="50"
									value="<?=$arResult["LAST_LOGIN"]?>"/>
							<div class="invalid-feedback"><?=Loc::getMessage('LOGIN_EMPTY')?></div>
						</div>
					</div>

					<div class="col-12">
						<label class="form-label"><?=Loc::getMessage('CHECKWORD')?></label>
						<div class="input-group has-validation">
							<input class="form-control" required type="text" name="USER_CHECKWORD" maxlength="50"
									value="<?=$arResult["USER_CHECKWORD"]?>"/>
							<div class="invalid-feedback"><?=Loc::getMessage('CHECKWORD_EMPTY')?></div>
						</div>
					</div>

					<? endif ?>
					<div class="col-12">
						<label class="form-label"><?=Loc::getMessage('NEW_PASSWORD')?></label>
						<div class="input-group has-validation">
							<input class="form-control" required type="password" name="USER_PASSWORD" maxlength="255"
									value="<?=$arResult["USER_PASSWORD"]?>"/>
							<div class="invalid-feedback"><?=Loc::getMessage('NEW_PASSWORD_EMPTY')?></div>
						</div>
					</div>

					<div class="col-12">
						<label class="form-label"><?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?></label>
						<div class="input-group has-validation">
							<input class="form-control" type="password" required name="USER_CONFIRM_PASSWORD"
									maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>"/>
							<div class="invalid-feedback"><?=Loc::getMessage('NEW_PASSWORD_CONFIRM_EMPTY')?></div>
						</div>
					</div>


					<? if ($arResult["USE_CAPTCHA"]): ?>
						<!-- IF USED CAPTCHA -->
						<div class="col-12">
							<label class="form-label"><?=Loc::getMessage('CAPTCHA')?>
							</label>
							<div class="input-group has-validation">
								<input required class="form-control" type="text" name="captcha_word" maxlength="50"/>
								<div class="invalid-feedback"><?=Loc::getMessage('CAPTCHA_EMPTY')?></div>
							</div>
						</div>
						<div class="col-12">
							<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>"/>
							<!-- CAPTCHA_CODE -->
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180"
									height="40" alt="CAPTCHA"/> <!-- IMG CAPTCHA_CODE -->
						</div>
						<!-- END CAPTCHA -->

					<? endif ?>
					<div class="col-12">
						<button class="btn btn-primary w-100" type="submit" name="change_pwd"
								value="<?=Loc::getMessage('CHANGE')?>"><?=Loc::getMessage('CHANGE')?></button>
					</div>

					<div class="col-12">
						<p class="small"><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
						<!-- GROUP_POLICY / PASSWORD_REQUIREMENTS-->
					</div>

					<div class="field">
						<p class="small"><a
									href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=Loc::getMessage('AUTH')?></b></a></p>
						<!-- AUTH_URL -->
					</div>

				</form>

				<script type="text/javascript">
					document.bform.USER_LOGIN.focus();
				</script>

			</div>
		</div>

	</div>
</div>
<!-- END CHANGEPASSWD FORM -->





