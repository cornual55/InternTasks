<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

$this->setFrameMode(true);
?>


<div class="article-list">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
      <?= $arResult["NAV_STRING"] ?><br />
    <? endif; ?>

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
      <?
      $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
      $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
      ?>

      <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
        <a class="article-item article-list__item" href="<?=$arItem["DETAIL_PAGE_URL"]?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" data-anim="anim-3">
      <?else:?>
        <div class="article-item article-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
      <?endif;?>
          <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
            <div class="article-item__background">
              <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" />
            </div>
          <?endif;?>
          <div class="article-item__wrapper">
              <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
              <div class="article-item__title">
                  <?echo $arItem["NAME"]?>
              </div>
              <?endif;?>
              <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
              <div class="article-item__content">
                  <?echo $arItem["PREVIEW_TEXT"];?>
              </div>
              <?endif;?>
          </div>
      <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
        </a>
      <?else:?>
        </div>
      <?endif;?>
    <?endforeach;?>
</div>