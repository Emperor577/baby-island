<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/17/2019
 * Time: 22:57
 */

namespace App\Services\Gallery;
use App\Models\Gallery;
use App\Services\Gallery\Contracts\GalleryService as GalleryServiceInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class GalleryService implements GalleryServiceInterface
{

    public function store(array $data)
    {
        $gallery = new Gallery();
        if (is_file(Arr::get($data, 'photo'))) {
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/gallery',$images);
            $gallery->photo = $images;
        }
        $gallery->save();

        $uz_data = array('title' => $data['title_uz']);
        $ru_data = array('title' => $data['title_ru']);

        $setTranslation = Gallery::where('id', $gallery->id)->first();
        $setTranslation->getNewTranslation('uz')->fill($uz_data);
        $setTranslation->getNewTranslation('ru')->fill($ru_data);

        $setTranslation->save();
    }

    public function update(array $data, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->translate('ru')->title = $data['title_ru'];
        $gallery->translate('uz')->title = $data['title_uz'];


        if (is_file(Arr::get($data, 'photo'))) {
            Storage::disk('public')->delete('gallery/'.$gallery->photo);
            $images = Arr::get($data, 'photo')->getClientOriginalName();
            $images = time().'_'.$images; // Add current time before image name
            Arr::get($data, 'photo')->storeAs('public/gallery',$images);
            $gallery->photo = $images;
        }
        $gallery->save();
    }
}