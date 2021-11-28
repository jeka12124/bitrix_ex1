<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$IMG =  SITE_TEMPLATE_PATH."/img/rew/no_photo.jpg";
?>
<hr>
<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">
            <?= $arResult["DETAIL_TEXT"];?>
        </div>
        <div class="review-autor">
            <?= $arResult["NAME"];?>,
            <?= $arResult["DISPLAY_ACTIVE_FROM"];?> <?= GetMessage("YEAR")?>.,
            <?= $arResult["PROPERTIES"]["POSITION"]["VALUE"];?>,
            <?= $arResult["PROPERTIES"]["COMPANY"]["VALUE"];?>.
        </div>
    </div>
    <?php if(isset($arResult["DETAIL_PICTURE"]["SRC"])){
        $IMG = $arResult["DETAIL_PICTURE"]["SRC"];
    }?>
    <div style="clear: both;" class="review-img-wrap"><img src="<?=$IMG;?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"];?>"></div>
</div>
<?php if($arResult["PROPERTIES"]["FILE"]["VALUE"]){?>
<div class="exam-review-doc">
    <p><?= GetMessage("TITLE_FILE");?>:</p>
    <?php foreach ($arResult["PROPERTIES"]["FILE"]["VALUE"] as $idFile){ ?>
        <?php
                $srcFile = CFile::GetPath($idFile);
                $objFile = CFile::GetByID($idFile);
                $arFile = $objFile->Fetch();
        ?>
    <div  class="exam-review-item-doc">
        <img class="rew-doc-ico" src="<?= SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png">
        <a href="<?=$srcFile;?>" download>
            <?=$arFile["ORIGINAL_NAME"];?>
        </a>
    </div>
    <?php }?>
</div>
<?php }?>
<hr>

