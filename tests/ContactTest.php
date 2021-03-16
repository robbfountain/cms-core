<?php

namespace Onethirtyone\Core\Tests;

use Livewire\Livewire;
use Onethirtyone\Core\Livewire\ContactUs;

class ContactTest extends TestCase
{
    /** @test */
    public function it_sends_an_email_when_the_contact_form_is_submitted()
    {
        $this->withoutExceptionHandling();

        Livewire::test(ContactUs::class)
            ->set('name', 'Pam Beasley')
            ->set('email', 'pam@dundermifflin.com')
            ->set('phone', '5705551212')
            ->set('message', 'I love Jim Halpert')
            ->call('submitContactForm')
            ->assertHasNoErrors();
    }

}
