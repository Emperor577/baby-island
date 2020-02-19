<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/13/2019
 * Time: 23:47
 */
namespace App\Services\AboutUs\Contracts;

interface AboutUsService
{
    public function store (array $data);

    public function update (array $data, $id);


}
