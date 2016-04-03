<?php
/**
 * NewUserControllerTest.php
 * Copyright (C) 2016 thegrumpydictator@gmail.com
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */


/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-19 at 15:39:28.
 */
class NewUserControllerTest extends TestCase
{

    /**
     * @covers FireflyIII\Http\Controllers\NewUserController::index
     * @covers FireflyIII\Http\Controllers\NewUserController::__construct
     */
    public function testIndex()
    {
        $this->be($this->emptyUser());
        $this->call('GET', '/');
        $this->assertResponseStatus(302);
        $this->assertRedirectedToRoute('new-user.index');
    }

    /**
     * @covers FireflyIII\Http\Controllers\NewUserController::index
     */
    public function testIndexGo()
    {
        $this->be($this->emptyUser());
        $this->call('GET', '/new-user');
        $this->assertResponseStatus(200);
    }

    /**
     * @covers FireflyIII\Http\Controllers\NewUserController::submit
     * @covers FireflyIII\Http\Requests\NewUserFormRequest::authorize
     * @covers FireflyIII\Http\Requests\NewUserFormRequest::rules
     */
    public function testSubmit()
    {
        $this->be($this->emptyUser());

        $args = [
            'bank_name'         => 'New bank',
            'bank_balance'      => 100,
            'savings_balance'   => 200,
            'credit_card_limit' => 1000,
        ];

        $this->call('POST', '/new-user/submit', $args);
        $this->assertResponseStatus(302);
        $this->assertSessionHas('success');
    }
}
