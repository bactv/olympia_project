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
<div id="header">   <!-- ==================  START HEADER =================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="#" id="logo">OLYMPIA</a>
            </div>
            <div class="col-md-9">
                <form class="form-inline" id="form-search">
                    <input type="text" class="form-control" placeholder="Text input">
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
                <ul id="navbar">
                    <li><a href="#">Tin tức</a></li>
                    <li><a href="#">Cuộc thi đang diễn ra</a></li>
                    <li id="child-menu">
                        <a href="#">Luyện tập</a>
                        <ul>
                            <li><a href="#">Khởi động</a></li>
                            <li><a href="#">Vượt chướng ngại vật</a></li>
                            <li><a href="#">Tăng tốc</a></li>
                            <li><a href="#">Về đích</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Thi đấu</a></li>
                    <li><a href="#">Phản hồi</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul>
                    <li><a href="#">Đăng ký</a></li>
                    <li><a href="#">Đăng nhập</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>          <!-- ==================  END HEADER =================== -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
