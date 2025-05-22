<?php

namespace App\Enums;

enum AdvertisementTypeEnum: string
{
    case TRAINING = 'إعلان تدريب';
    case TENDER = 'إعلان مناقصة';
    case TRAINER_NEED = 'إعلان عن احتياج مدرب';
    case TRAINER_ASSISTANT = 'إعلان عن احتياج مساعد مدرب';
} 