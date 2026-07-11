-- GreenMirror — Kozmetik Sürdürülebilirlik Veritabanı
-- Semanur Çevirme — 95220045

CREATE DATABASE IF NOT EXISTS greenmirror_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE greenmirror_db;

CREATE TABLE IF NOT EXISTS brands (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(100),
    brand_group VARCHAR(100),
    cruelty_free VARCHAR(50),
    vegan_policy VARCHAR(50),
    packaging_policy VARCHAR(50),
    carbon_commitment VARCHAR(50),
    cruelty_score INT(11) DEFAULT 0,
    vegan_score INT(11) DEFAULT 0,
    packaging_score INT(11) DEFAULT 0,
    carbon_score INT(11) DEFAULT 0,
    sustainability_score INT(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO brands (brand, brand_group, cruelty_free, vegan_policy, packaging_policy, carbon_commitment, cruelty_score, vegan_score, packaging_score, carbon_score, sustainability_score) VALUES
('e.l.f.', 'clean / ethical', 'certified', 'vegan', 'strong', 'strong', 30, 20, 25, 25, 100),
('lush', 'clean / ethical', 'certified', 'vegan', 'strong', 'strong', 30, 20, 25, 25, 100),
('the body shop', 'clean / ethical', 'certified', 'partial', 'strong', 'strong', 30, 10, 25, 25, 90),
('garnier', 'l\'oreal group', 'certified', 'partial', 'strong', 'strong', 30, 10, 25, 25, 90),
('rare beauty', 'gen z / premium', 'self_claim', 'partial', 'strong', 'moderate', 15, 10, 25, 15, 65),
('the ordinary', 'clean / ethical', 'self_claim', 'partial', 'strong', 'moderate', 15, 10, 25, 15, 65),
('yves rocher', 'clean / ethical', 'self_claim', 'partial', 'strong', 'moderate', 15, 10, 25, 15, 65),
('shiseido', 'shiseido group', 'no', 'partial', 'strong', 'strong', 0, 10, 25, 25, 60),
('estee lauder', 'estee lauder group', 'no', 'partial', 'strong', 'strong', 0, 10, 25, 25, 60),
('fenty beauty', 'gen z / premium', 'self_claim', 'partial', 'moderate', 'moderate', 15, 10, 15, 15, 55),
('nars', 'shiseido group', 'no', 'partial', 'strong', 'moderate', 0, 10, 25, 15, 50),
('l\'oreal paris', 'l\'oreal group', 'no', 'no', 'strong', 'strong', 0, 0, 25, 25, 50),
('clinique', 'estee lauder group', 'no', 'partial', 'strong', 'moderate', 0, 10, 25, 15, 50),
('mac', 'estee lauder group', 'no', 'partial', 'strong', 'moderate', 0, 10, 25, 15, 50),
('kiehl\'s', 'l\'oreal group', 'no', 'partial', 'strong', 'moderate', 0, 10, 25, 15, 50),
('maybelline new york', 'l\'oreal group', 'no', 'partial', 'strong', 'moderate', 0, 10, 25, 15, 50),
('huda beauty', 'gen z / premium', 'self_claim', 'partial', 'weak', 'weak', 15, 10, 5, 5, 35),
('la roche-posay', 'l\'oreal group', 'no', 'no', 'strong', 'moderate', 0, 0, 25, 15, 40),
('la mer', 'estee lauder group', 'no', 'no', 'moderate', 'moderate', 0, 0, 15, 15, 30),
('vichy', 'l\'oreal group', 'no', 'no', 'moderate', 'moderate', 0, 0, 15, 15, 30);
