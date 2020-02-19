<?php


namespace App\Services\Service\Contracts;


interface ServiceService
{
    public function store (array $data);

    public function update (array $data, $id);

    public function destroy($id);
}
