<?php

namespace App\Enums;

enum ReceiptStatus: string
{
    case New = 'new';
    case Done = 'done';

    public static function toArray(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }
    public function labelAttribute(): string
    {
        return match($this) {
            ReceiptStatus::New => 'Новый',
            ReceiptStatus::Done => 'Выполнен',
        };
    }


    public static function toSelectList(): array
    {
         return array_combine(self::toArray(), array_map( fn($val) => ReceiptStatus::from($val)->labelAttribute(), self::toArray()));
    }



    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
