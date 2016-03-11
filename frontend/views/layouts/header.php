<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<nav id="ddmenu">
    <div class="menu-icon"></div>
    <ul>
        <li class="no-sub"><a class="top-heading" href="<?= Url::to(['site/index']) ?>">Trang chủ</a></li>
        <li class="no-sub"><a class="top-heading">Giới thiệu</a></li>
        <li>
            <span class="top-heading"><a href="<?= Url::to(['product/index']) ?>">Dịch vụ tiệc cưới</a></span>
            <i class="caret"></i>           
            <div class="dropdown offset300">
                <div class="dd-inner">
                    <div class="column">
                        <h3>Áo cưới</h3>
                        <div>
                            <a href="#">Áo cưới</a>
                            <a href="#">Duis ut mauris</a>
                            <a href="#">Quisque tempor</a>
                        </div>
                        <h3>Volutpat</h3>
                        <div>
                            <a href="#">Quisque dictum</a>
                            <a href="#">Nulla scelerisque</a>
                            <a href="#">hendrerit tincidunt</a>
                        </div>
                    </div>
                    <div class="column">
                        <h3>Suspendisse</h3>
                        <div>
                            <a href="#">Suspendisse potenti</a>
                            <a href="#">Curabitur in mauris</a>
                            <a href="#">Phasellus ultrices</a>
                            <a href="#">Quisque ornare</a>
                            <a href="#">Vestibulum</a>
                            <a href="#">Vitae tempus risus</a>
                            <a href="#">Proin sed magna</a>
                            <a href="#">Etiam aliquet</a>
                        </div>
                    </div>
                    <div class="column">
                        <h3>Suspendisse</h3>
                        <div>
                            <a href="#">Suspendisse potenti</a>
                            <a href="#">Curabitur in mauris</a>
                            <a href="#">Phasellus ultrices</a>
                            <a href="#">Quisque ornare</a>
                            <a href="#">Vestibulum</a>
                            <a href="#">Vitae tempus risus</a>
                            <a href="#">Proin sed magna</a>
                            <a href="#">Etiam aliquet</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="top-heading" href="http://www.microsoft.com">Dịch vụ chụp ảnh cưới</a>
			<i class="caret"></i>           
            <div class="dropdown">
                <div class="dd-inner">
                    <div class="column">
                        <a href="#">Chụp ảnh cưới phim trường</a>
                        <a href="#">Chụp ảnh cưới ngoại cảnh thành phố</a>
                        <a href="#">Chụp ảnh cưới ngoại cảnh xa</a>
                        <a href="#">Chụp hình gia đình</a>
                        <a href="#">Chụp hình thời trang</a>
                    </div>
                </div>
            </div>
        </li>
        <!-- <li>
            <span class="top-heading">Accusantium</span>
			<i class="caret"></i>           
            <div class="dropdown offset300">
                <div class="dd-inner">
                    <div class="column">
                        <h3>Pellentesque</h3>
                        <div>
                            <a href="#">Fermentum ut nulla</a>
                            <a href="#">Duis ut mauris</a>
                            <a href="#">Quisque tempor</a>
                        </div>
                        <h3>Volutpat</h3>
                        <div>
                            <a href="#">Quisque dictum</a>
                            <a href="#">Nulla scelerisque</a>
                            <a href="#">hendrerit tincidunt</a>
                        </div>
                    </div>
                    <div class="column">
                        <h3>Suspendisse</h3>
                        <div>
                            <a href="#">Suspendisse potenti</a>
                            <a href="#">Curabitur in mauris</a>
                            <a href="#">Phasellus ultrices</a>
                            <a href="#">Quisque ornare</a>
                            <a href="#">Vestibulum</a>
                            <a href="#">Vitae tempus risus</a>
                            <a href="#">Proin sed magna</a>
                            <a href="#">Etiam aliquet</a>
                        </div>
                    </div>
                    <div class="column">
                        <h3>Suspendisse</h3>
                        <div>
                            <a href="#">Suspendisse potenti</a>
                            <a href="#">Curabitur in mauris</a>
                            <a href="#">Phasellus ultrices</a>
                            <a href="#">Quisque ornare</a>
                            <a href="#">Vestibulum</a>
                            <a href="#">Vitae tempus risus</a>
                            <a href="#">Proin sed magna</a>
                            <a href="#">Etiam aliquet</a>
                        </div>
                    </div>
                </div>
            </div>
        </li> -->
        <li class="no-sub">
            <a class="top-heading" href="<?= Url::to(['wedding/index']) ?>">Tổ chức tiệc cưới</a>
        </li>
        <li class="no-sub">
            <a class="top-heading" href="#">Liên hệ</a>
        </li>
    </ul>
</nav>