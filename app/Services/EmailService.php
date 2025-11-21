<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class EmailService
{
    protected $serviceId;
    protected $templateId;
    protected $publicKey;
    protected $adminEmail;

    public function __construct()
    {
        // You can also move these to config/env later
        $this->serviceId   = env('EMAILJS_SERVICE_ID', 'service_6fzo6jm');
        $this->templateId  = env('EMAILJS_TEMPLATE_ID', 'template_n4c8k9m');
        $this->publicKey   = env('EMAILJS_PUBLIC_KEY', '0I2JufUykkyF4nAjD');
        $this->adminEmail  = env('ADMIN_EMAIL', 'UJJWAL@HYPERHIRE.IN');
    }

    /**
     * Send notification to admin when a user is popular
     *
     * @param  array  $payload  (name, user_id, likes_count)
     * @return \Illuminate\Http\Client\Response
     */
    public function sendPopularUserNotification(array $payload)
    {
        $body = [
            'service_id' => $this->serviceId,
            'template_id' => $this->templateId,
            'user_id' => $this->publicKey,
            'template_params' => [
                'admin_email' => $this->adminEmail,
                'user_name' => $payload['name'] ?? '',
                'user_id' => $payload['user_id'] ?? '',
                'likes_count' => $payload['likes_count'] ?? 0,
            ],
        ];

        return Http::post('https://api.emailjs.com/api/v1.0/email/send', $body);
    }
}
