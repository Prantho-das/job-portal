<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;
   

    protected function mutateFormDataBeforeSave(array $data): array
{
    \Log::info('🧩 Raw form data before save', $data);

    $type = $data['type'] ?? null;

    if ($type === 'text' && isset($data['value_text'])) {
        $data['value'] = $data['value_text'];
    }

    if ($type === 'textarea' && isset($data['value_textarea'])) {
        $data['value'] = $data['value_textarea'];
    }

    if ($type === 'richtext' && isset($data['value_richtext'])) {
        $data['value'] = $data['value_richtext'];
    }

    if ($type === 'image' && isset($data['value_image'])) {
        $data['value'] = $data['value_image'];
    }

    \Log::info('✅ Final data before save', $data);

    return $data;
}


    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}