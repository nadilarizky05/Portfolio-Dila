-- Mengisi slug project di TiDB agar sama dengan database lokal.
-- Jalankan di TablePlus pada koneksi TiDB Portfolio (ONLINE).
UPDATE projects SET slug = 'keepfire' WHERE title = 'KeepFire';
UPDATE projects SET slug = 'dropto' WHERE title = 'dropTo';
UPDATE projects SET slug = 'homey' WHERE title = 'Homey';
UPDATE projects SET slug = 'codelonized' WHERE title = 'CODELONIZED';
UPDATE projects SET slug = 'nookio' WHERE title = 'Nookio';
UPDATE projects SET slug = 'handson' WHERE title = 'HandsOn';
UPDATE projects SET slug = 'childsafety' WHERE title = 'ChildSafety';
UPDATE projects SET slug = 'education-festival-website' WHERE title = 'Education Festival Website';
UPDATE projects SET slug = 'niec-psychotest' WHERE title = 'NIEC Psychotest';
UPDATE projects SET slug = 'lms-mathesia' WHERE title = 'LMS Mathesia';
UPDATE projects SET slug = 'otw' WHERE title = 'Otw';
UPDATE projects SET slug = 'tech-explorer' WHERE title = 'Tech Explorer';
UPDATE projects SET slug = 'i-believe-i-can-code' WHERE title = 'I Believe I Can Code';

-- Cek hasil (harus 0 baris kosong):
SELECT COUNT(*) AS slug_kosong FROM projects WHERE slug IS NULL OR slug = '';
