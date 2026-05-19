<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('settings')->insert([
            ['key' => 'notify_email', 'value' => ''],
            ['key' => 'mail_mailer', 'value' => 'smtp'],
            ['key' => 'mail_host', 'value' => 'smtp.gmail.com'],
            ['key' => 'mail_port', 'value' => '587'],
            ['key' => 'mail_username', 'value' => ''],
            ['key' => 'mail_password', 'value' => ''],
            ['key' => 'mail_encryption', 'value' => 'tls'],
            ['key' => 'mail_from_address', 'value' => ''],
            ['key' => 'mail_from_name', 'value' => 'Jacoto Fotografía'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
