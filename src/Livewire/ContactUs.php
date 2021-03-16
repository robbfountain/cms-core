<?php

namespace Onethirtyone\Core\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use Onethirtyone\Core\Notifications\SendContactFormNotification;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'message' => 'required|string|min:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function submitContactForm()
    {
        $this->validate();

        Notification::route('mail', config('cms.core.owner.email'))
            ->notify(new SendContactFormNotification($this->name, $this->email, $this->phone, $this->message));

        session()->flash('core::contact-success','Thank you');

        $this->reset();

    }

    public function render()
    {
        return view('core::livewire.contact-us');
    }
}
