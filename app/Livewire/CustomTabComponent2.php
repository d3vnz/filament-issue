<?php

namespace App\Livewire;

use App\Models\Tab;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class CustomTabComponent2 extends Component implements HasForms, HasTable
{

    use InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.custom-tab-component2');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Tab::query())
            // ->recordTitleAttribute('serial_number')
            ->columns([
                TextColumn::make('tab')->label('Tab Name'),

            ]);
            }
}
