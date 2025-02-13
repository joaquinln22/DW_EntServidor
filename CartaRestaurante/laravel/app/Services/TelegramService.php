<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    protected $botToken;
    protected $chatId;

    public function __construct()
    {
        $this->botToken = config('services.telegram.bot_token');
        $this->chatId = config('services.telegram.chat_id');

        if (empty($this->botToken) || empty($this->chatId)) {
            throw new \Exception('El token de Telegram o el chat_id están vacíos.');
        }
    }

    public function sendMessage(string $message)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";

        // Datos que se enviarán a Telegram
        $data = [
            'chat_id' => $this->chatId,
            'text' => $message,
            'parse_mode' => 'HTML'
        ];

        // Log para depuración
        \Log::info('Enviando mensaje a Telegram:', ['url' => $url, 'data' => $data]);

        $response = Http::post($url, $data);

        // Registrar la respuesta para ver qué devuelve Telegram
        \Log::info('Respuesta de Telegram:', ['body' => $response->body()]);

        if (!$response->successful()) {
            \Log::error('Error al enviar mensaje a Telegram', [
                'response' => $response->body()
            ]);
        }

        return $response->successful();
    }

}