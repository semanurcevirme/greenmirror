<?php
require 'db.php';

// ---- Uyarı eşiği ----
// Sürdürülebilirlik skoru 50'nin altında olan markalar "uyarı" statüsünde kabul edilir.
$esik = 50;

$uyarili = $baglanti->query("SELECT brand, brand_group, sustainability_score, cruelty_free, vegan_policy 
    FROM brands WHERE sustainability_score < $esik ORDER BY sustainability_score ASC");

$guvenli = $baglanti->query("SELECT COUNT(*) AS adet FROM brands WHERE sustainability_score >= $esik");
$guvenli_sayi = $guvenli->fetch_assoc()['adet'];

$uyarili_sayi_sorgu = $baglanti->query("SELECT COUNT(*) AS adet FROM brands WHERE sustainability_score < $esik");
$uyarili_sayi = $uyarili_sayi_sorgu->fetch_assoc()['adet'];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>GreenMirror - Uyarı Mekanizması</title>
<style>
    * { box-sizing: border-box; }
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f3f6f4;
        margin: 0;
        padding: 24px;
        color: #1b2e1f;
    }
    h1 { color: #c62828; margin-bottom: 4px; }
    .subtitle { color: #5a6b5d; margin-bottom: 24px; }
    .nav-link { display:inline-block; margin-bottom:18px; color:#2e7d32; font-weight:600; text-decoration:none; }

    .info-box {
        background: #fff8e1;
        border-left: 5px solid #f9a825;
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 24px;
    }

    .summary-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }
    .summary-card {
        background: #fff;
        border-radius: 10px;
        padding: 18px 20px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
    }
    .summary-card.danger { border-left: 5px solid #c62828; }
    .summary-card.ok { border-left: 5px solid #2e7d32; }
    .summary-card .value { font-size: 28px; font-weight: 700; }
    .summary-card.danger .value { color: #c62828; }
    .summary-card.ok .value { color: #2e7d32; }

    .alert-item {
        background: #fff;
        border-radius: 10px;
        padding: 16px 20px;
        margin-bottom: 12px;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        border-left: 6px solid #c62828;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .alert-item .brand-name { font-weight: 700; font-size: 16px; }
    .alert-item .meta { color: #5a6b5d; font-size: 13px; margin-top: 2px; }
    .alert-item .score-badge {
        background: #c62828;
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 700;
        font-size: 18px;
    }
    .icon { font-size: 20px; margin-right: 8px; }
    .no-alert { background: #e8f5e9; border-left: 5px solid #2e7d32; padding: 16px 20px; border-radius: 10px; color: #2e7d32; font-weight: 600; }
</style>
</head>
<body>

<h1>⚠️ Uyarı Mekanizması</h1>
<p class="subtitle">Sürdürülebilirlik skoru eşik değerin altında kalan markalar</p>
<a class="nav-link" href="index.php">← Dashboard'a Dön</a>

<div class="info-box">
    <strong>Karar Kuralı:</strong> Sürdürülebilirlik skoru <strong><?= $esik ?> puanın altında</strong> olan markalar
    otomatik olarak "uyarı" statüsüne alınır ve kullanıcıya bildirim gösterilir.
    Bu kural, cruelty-free durumu, vegan politika, ambalaj sürdürülebilirliği ve karbon taahhüdü
    kriterlerinin ağırlıklı toplamına dayanmaktadır.
</div>

<div class="summary-row">
    <div class="summary-card danger">
        <div>Uyarı Verilen Marka Sayısı</div>
        <div class="value"><?= $uyarili_sayi ?></div>
    </div>
    <div class="summary-card ok">
        <div>Güvenli Eşik Üzerindeki Marka Sayısı</div>
        <div class="value"><?= $guvenli_sayi ?></div>
    </div>
</div>

<h3>Uyarı Listesi</h3>
<?php if ($uyarili_sayi == 0): ?>
    <div class="no-alert">✅ Şu anda eşik altında marka bulunmamaktadır.</div>
<?php else: ?>
    <?php while ($row = $uyarili->fetch_assoc()): ?>
    <div class="alert-item">
        <div>
            <div class="brand-name"><span class="icon">🔴</span><?= htmlspecialchars($row['brand']) ?></div>
            <div class="meta">
                Grup: <?= htmlspecialchars($row['brand_group']) ?> ·
                Cruelty-Free: <?= htmlspecialchars($row['cruelty_free']) ?> ·
                Vegan Politika: <?= htmlspecialchars($row['vegan_policy']) ?>
            </div>
        </div>
        <div class="score-badge"><?= $row['sustainability_score'] ?> / 100</div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

</body>
</html>
