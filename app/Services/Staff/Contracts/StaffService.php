<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/17/2019
 * Time: 21:55
 */

namespace App\Services\Staff\Contracts;

interface StaffService
{
    public function store (array $data);

    public function update (array $data, $id);
}