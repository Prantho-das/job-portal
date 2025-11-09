<?php

namespace App\Filament\Resources\Settings\Pages;

use App\Filament\Resources\Settings\SettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;
   

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['type'] === 'image' && empty($data['value'])) {
            $data['value'] = $data['value_image'] ?? null;
            \Log::info('🛠 Fixing missing value', ['fixed_value' => $data['value']]);
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