# GreenMirror — Kozmetik Sürdürülebilirlik Karar Destek Sistemi

20 kozmetik markasını cruelty-free, vegan politika, ambalaj ve karbon taahhüdü kriterlerine göre karşılaştıran PHP/MySQL tabanlı interaktif dashboard.

VeriCos platformunun akademik ve backend versiyonudur.

## Özellikler

### Dashboard (index.php)
- **4 KPI Kartı:** Toplam marka, ortalama skor, en yüksek skor, düşük skorlu marka sayısı
- **5 Filtre:** Marka grubu, cruelty-free durumu, vegan politika, ambalaj, karbon taahhüdü
- **6 Grafik (Chart.js):**
  - Marka bazlı sürdürülebilirlik skorları (çubuk)
  - Kriter ağırlık dağılımı (halka)
  - Skor kategorisi dağılımı — Yüksek/Orta/Düşük (pasta)
  - Cruelty-free durumuna göre ortalama skor (yatay çubuk)
  - Marka grubuna göre ortalama skor (çubuk)
  - Kriter bazlı radar analizi
- **Marka listesi tablosu** — renk kodlu Yüksek/Orta/Düşük rozetleri

### Uyarı Mekanizması (uyari.php)
- Skoru 50 altında kalan markalar otomatik uyarı listesi
- Kırmızı kart görünümü ile uyarı
- 4 uyarılı marka: La Roche-Posay (40), Huda Beauty (35), La Mer (30), Vichy (30)

## Tasarım Süreci
Kullanıcı arayüzünü uçtan uca kendim tasarladım — wireframe'den nihai prototipe kadar tüm süreç Figma'da bana ait. UI, veri görselleştirme mantığı, ekran akışı ve etkileşim tasarımı dahil projenin her katmanı kendi çalışmamdır.

## Skorlama Sistemi
| Kriter | Ağırlık | Certified | Self-claim | No |
|---|---|---|---|---|
| Cruelty-Free | %30 | 30p | 15p | 0p |
| Vegan Politika | %20 | 20p | 10p | 0p |
| Ambalaj | %25 | 25p | 15p | 5p |
| Karbon | %25 | 25p | 15p | 5p |

**En yüksek:** e.l.f. ve Lush — 100/100
**En düşük:** Vichy — 30/100

## Kurulum
1. XAMPP kur ve başlat (Apache + MySQL)
2. Bu klasörü `/Applications/XAMPP/htdocs/greenmirror/` içine koy
3. phpMyAdmin → `greenmirror_db.sql` dosyasını import et
4. Tarayıcıda `http://localhost/greenmirror/` aç

## Teknolojiler
PHP · MySQL · Chart.js · HTML · CSS · JavaScript · AJAX · Figma (UX/UI Design)

## İlgili Proje
Bu projenin frontend/ürün versiyonu için: [VeriCos](https://github.com/semanurcevirme/vericos)
