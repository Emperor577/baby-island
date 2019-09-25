<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/17/2019
 * Time: 22:56
 */

namespace App\Services\Gallery\Contracts;


interface GalleryService
{
    public function store (array $data);

    public function update (array $data, $id);
}