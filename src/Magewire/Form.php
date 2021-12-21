<?php declare(strict_types=1);
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

namespace Magewirephp\MagewireExamples\Magewire;

class Form extends \Magewirephp\Magewire\Component\Form
{
    // Nested properties.
    public $customer = [
        'credentials' => [
            'firstname' => '',
            'lastname'  => '',
            'email'     => '',
        ]
    ];

    // Rules for nested properties.
    protected $rules = [
        'customer.credentials.firstname' => 'required|min:2',
        'customer.credentials.lastname'  => 'required|min:2',
        'customer.credentials.email'     => 'required|email',
    ];

    // :attribute & :value are available within each message.
    protected $messages = [
        'customer.credentials.firstname:required'  => 'Your firstname is required',
        'customer.credentials.firstname:min'       => 'Your firstname minimum is 2',

        'customer.credentials.lastname:required'  => 'Your lastname is required',
        'customer.credentials.lastname:min'       => 'Your lastname minimum is 2',

        'customer.credentials.email:required' => 'Your email is required',
        'customer.credentials.email:email'    => 'Your email is not valid email',
    ];

    public function save()
    {
        $this->validate();
        // Will only dispatch when all customer credentials are valid.
        $this->dispatchSuccessMessage('Validation success!');
    }
}
