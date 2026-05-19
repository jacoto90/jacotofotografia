<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }

    public static function applyMailConfig(): void
    {
        $host = static::get('mail_host');
        if ($host) {
            config([
                'mail.default' => static::get('mail_mailer', 'smtp'),
                'mail.mailers.smtp.host' => $host,
                'mail.mailers.smtp.port' => static::get('mail_port', '587'),
                'mail.mailers.smtp.username' => static::get('mail_username'),
                'mail.mailers.smtp.password' => static::get('mail_password'),
                'mail.mailers.smtp.encryption' => static::get('mail_encryption', 'tls'),
                'mail.from.address' => static::get('mail_from_address'),
                'mail.from.name' => static::get('mail_from_name', 'Jacoto Fotografía'),
            ]);
        }
    }
}
