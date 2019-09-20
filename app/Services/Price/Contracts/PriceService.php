<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/18/2019
 * Time: 22:32
 */

namespace App\Services\Price\Contracts;


interface PriceService
{
    public function store (array $data);

    public function update (array $data, $id);
}