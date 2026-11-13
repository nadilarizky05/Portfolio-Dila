<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Website portofolio ini hanya berisi halaman publik (tanpa login/form).
 * Middleware ini membuat CDN Vercel menyimpan HTML selama 1 jam, sehingga
 * database tidak perlu dipanggil di setiap kunjungan.
 *
 * Cookie session dibuang karena response yang membawa cookie tidak di-cache.
 */
class CachePublicPages
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->isMethodCacheable() && $response->isSuccessful()) {
            foreach ($response->headers->getCookies() as $cookie) {
                $response->headers->removeCookie($cookie->getName(), $cookie->getPath(), $cookie->getDomain());
            }

            $response->headers->set(
                'Cache-Control',
                'public, max-age=0, s-maxage=3600, stale-while-revalidate=86400'
            );
        }

        return $response;
    }
}
