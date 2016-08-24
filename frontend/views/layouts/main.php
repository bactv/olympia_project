<?php
use yii\helpers\Url;
use yii\helpers\Html;
use backend\assets\AppAsset;
use common\components\AssetApp;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags() ?>

    <title><?php echo Html::encode($this->title); ?></title>

    <?php echo AssetApp::regCssFile('style.css') ?>

    <?php $this->head() ?>
</head>
<body>
<div class="wrapper">
</div>
<!-- END: box-wrap -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
