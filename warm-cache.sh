#!/bin/bash
# Membuka semua halaman DAN foto-fotonya satu kali supaya tersimpan di cache CDN Vercel.
# Jalankan setelah setiap deploy (status Ready):  ./warm-cache.sh
# Setelah ini, semua pengunjung langsung mendapat halaman cepat.

BASE="https://portfoliodila.vercel.app"

PAGES=(
  /
  /about
  /projects/coding-mentor
  /projects/curriculum-maker
  /projects/curriculum-maker/i-believe-i-can-code
  /projects/curriculum-maker/tech-explorer
  /projects/ios-developer
  /projects/ios-developer/codelonized
  /projects/ios-developer/dropto
  /projects/ios-developer/handson
  /projects/ios-developer/homey
  /projects/ios-developer/keepfire
  /projects/ios-developer/nookio
  /projects/web-developer
  /projects/web-developer/education-festival-website
  /projects/web-developer/lms-mathesia
  /projects/web-developer/niec-psychotest
  /projects/web-developer/otw
)

TMP=$(mktemp -d)

echo "1/2 Memanaskan halaman..."
for i in "${!PAGES[@]}"; do
  page="${PAGES[$i]}"
  (
    curl -s "$BASE$page" -o "$TMP/$i.html" -w "%{http_code}  %{time_total}s  $page\n"
  ) &
done
wait

echo
echo "2/2 Memanaskan foto, CSS, dan JS..."
cat "$TMP"/*.html 2>/dev/null \
  | grep -oE "(src|href)=\"[^\"]+\.(png|jpe?g|JPG|PNG|webp|svg|css|js)[^\"]*\"" \
  | sed -E 's/^(src|href)="//; s/"$//' \
  | grep -E "^(https://portfoliodila\.vercel\.app|/)" \
  | sed -E "s|^/|$BASE/|" \
  | sort -u > "$TMP/assets.txt"

TOTAL=$(wc -l < "$TMP/assets.txt" | tr -d ' ')
xargs -P 8 -I{} curl -s -o /dev/null -w "%{http_code} {}\n" "{}" < "$TMP/assets.txt" > "$TMP/assets_result.txt"
FAILED=$(grep -vc "^200" "$TMP/assets_result.txt")
echo "$TOTAL file diperiksa, gagal: $FAILED"
grep -v "^200" "$TMP/assets_result.txt"

rm -rf "$TMP"
echo
echo "Selesai. Semua halaman sudah di-cache."
