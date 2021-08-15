<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PaymentTypeTest extends WebTestCase
{
    private $baseUrl = 'http://localhost:8012';
    public function shouldRenderSuccess(): void
    {
        $client = static::createClient();
        $client->request('GET', "{$this->baseUrl}/payment/type");

        $this->assertResponseStatusCodeSame(200);
        $this->assertSelectorTextContains('#title-page', 'pagamento');
    }
}
