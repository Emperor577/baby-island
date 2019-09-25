<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/4/2019
 * Time: 18:38
 */
namespace App\Services\Slider\Contracts;
interface SliderService
{
    public function store (array $data);

    public function update (array $data, $id);
}