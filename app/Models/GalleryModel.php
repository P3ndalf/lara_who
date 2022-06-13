<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;

    private $data = [
        [
            "photo" => '../assets/imgs/gallery/FirstImage.jpg',
            "title" => 'Название1',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/SecondImage.jpg',
            "title" => 'Название2',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/ThirdImage.jpg',
            "title" => 'Название3',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/FourthImage.jpg',
            "title" => 'Название4',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/FifthImage.jpg',
            "title" => 'Название5',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/SixthImage.jpg',
            "title" => 'Название6',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/SeventhImage.jpg',
            "title" => 'Название7',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/EigthsImage.jpg',
            "title" => 'Название8',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/NinethImage.jpg',
            "title" => 'Название9',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/TenthImage.jpg',
            "title" => 'Название10',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/EleventhImage.jpg',
            "title" => 'Название11',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/TwelveImage.jpg',
            "title" => 'Название12',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/ThirteenImage.jpg',
            "title" => 'Название13',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/FourtheenImage.jpg',
            "title" => 'Название14',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/FifteenthImage.jpg',
            "title" => 'Название15',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
        [
            "photo" => '../assets/imgs/gallery/SixteenthImage.jpg',
            "title" => 'Название16',
            "alt" => "Альтернативный текст",
            "comment" => "Прекрасный комментарий"
        ],
    ];

    public function getData()
    {
        return $this->data;
    }
}
