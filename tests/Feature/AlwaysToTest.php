<?php

use Illuminate\Support\Facades\Mail;

it('does not work', function () {
    Mail::fake();
    Mail::alwaysTo('test@test.com');
    config()->set('mail.from.address', 'foo@bar.com');

    $mailer = app('mail.manager');
    $mailer = invade($mailer->manager)->mailers['array'];

    expect(invade($mailer)->from['address'])->toEqual('foo@bar.com');
});

it('works', function () {
    Mail::fake();

    config()->set('mail.from.address', 'foo@bar.com');

    Mail::alwaysTo('test@test.com');

    $mailer = app('mail.manager');
    $mailer = invade($mailer->manager)->mailers['array'];

    expect(invade($mailer)->from['address'])->toEqual('foo@bar.com');
});
