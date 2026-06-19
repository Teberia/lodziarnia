<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    private string $baseUrl = 'http://localhost:3000';

    // boilerplate przetwarzania requestu i odpowiedzi HTTP
    private function postLogin(string $login, string $password): array
    {
        $ch = curl_init($this->baseUrl . '/login');

        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query([
                'login'      => $login,
                'haslo_hash' => $password,
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_TIMEOUT        => 5,
        ]);

        $response = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $headers  = substr($response, 0, $headerSize);
        $body     = substr($response, $headerSize);
        $location = '';

        if (preg_match('/^Location:\s*(.+)$/mi', $headers, $m)) {
            $location = trim($m[1]);
        }

        return [
            'status'   => $statusCode,
            'location' => $location,
            'body'     => $body,
        ];
    }

    // Logowanie poprawnymi danymi
    public function test_logowanie_poprawnymi_danymi(): void
    {
        $result = $this->postLogin('test', 'test');

        $this->assertSame(302, $result['status']);
        $this->assertStringContainsString('welcome', $result['location']);
    }

    // Logowanie błędnym hasłem
    public function test_logowanie_blednym_haslem(): void
    {
        $result = $this->postLogin('test', 'blednehaslo');

        $this->assertSame(200, $result['status']);
        $this->assertEmpty($result['location']);
        $this->assertStringContainsString('Zaloguj', $result['body']);
    }
}
