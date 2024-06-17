<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BudgetControllerTest extends WebTestCase
{
    public function testCreate(): void
    {
        $this->expectNotToPerformAssertions();
        $client = static::createClient();
        $crawler = $client->request('GET', '/budget/new');

        // select the button
        $buttonCrawlerNode = $crawler->selectButton('Save');

        // retrieve the Form object for the form belonging to this button
        $form = $buttonCrawlerNode->form();

        // set values on a form object
        $form['budget[nom]'] = 'Téléphonie';

        // submit the Form object
        $client->submit($form);
    }
}
