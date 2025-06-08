<?php
$companyName = "DigiMedia Co., Ltd.";
$startYear = 2022;
$currentYear = date("Y");
$designerName = "TemplateMo";
$designerLink = "https://templatemo.com";
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>
                    &copy; <?= $startYear === $currentYear ? $currentYear : $startYear . " - " . $currentYear ?> <?= htmlspecialchars($companyName) ?>. All Rights Reserved.
                    <br>Design: <a href="<?= htmlspecialchars($designerLink) ?>" target="_parent" title="free css templates"><?= htmlspecialchars($designerName) ?></a>
                </p>
            </div>
        </div>
    </div>
</footer>
