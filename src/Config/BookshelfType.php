<?php
namespace App\Config;

enum BookshelfType: string
{
    case Favorites = 'Favorites';
    case EBooks = 'Ebooks';
    case ToRead = 'To Read';
    case ReadingNow = 'Reading Now';
    case Reviewed = 'Reviewed';
}