# Jacoto Fotografía

Modern Laravel 13 rebuild of a legacy PHP photography portfolio site, deployed on Hostalia shared hosting (FTP only).

## Tech
- Laravel 13 + Flux UI v2 + Vite + Tailwind
- MySQL (prod) / SQLite (local)
- PHP 8.3 (Hostalia)

## Structure
- **Public pages**: Home, /clientes (password galleries), /jacoto, /contacto
- **Admin panel**: /admin/login — CRUD clients & books, photo upload, message management, SMTP settings
- **Photo storage**: FTP originals in `public/{nombrebook}/`, admin uploads in `storage/app/public/books/{id}/`

## Key Details
- Covers: `foto_portada.jpg` per book folder, set via admin (POST with photo+source fields)
- Book passwords per book (e.g. @boda, @golf, @tania...)
- Rate limited login (5 attempts/60min)
- Mail config via DB settings table (configurable in admin)

## Deployment
1. `npm run build` → `public/build/`
2. Upload zip (exclude .env, vendor, node_modules, storage)
3. Upload .env and public/build/ separately
4. Symlink: `public/storage → storage/app/public`

Full context in `docs/prompt.txt`.
