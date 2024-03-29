<?php

namespace Tests\Unit;

use App\Models\Mail\MailFactory;
use App\Exceptions\InvalidArgumentException;
use Illuminate\Mail\Mailable;
use PHPUnit\Framework\TestCase;

class MailFactoryTest extends TestCase
{

    public function test_eventRegistrationTest_FalseMethodName_shouldFail(): void
    {
        $factory = new MailFactory();
        $this->expectException(InvalidArgumentException::class);
        $factory->createMail('', ['name' => 'test', 'event_id' => 1]);
    }

    public function test_eventRegistrationTest_EmptyArguments_shouldFail(): void
    {
        $factory = new MailFactory();
        $this->expectException(InvalidArgumentException::class);
        $mail = $factory->createMail('eventRegistration', []);
    }
}
