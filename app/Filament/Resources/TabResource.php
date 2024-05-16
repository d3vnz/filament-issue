<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TabResource\Pages;
use App\Filament\Resources\TabResource\RelationManagers;
use App\Livewire\CustomTabComponent1;
use App\Livewire\CustomTabComponent2;
use App\Livewire\CustomTabComponent3;
use App\Models\Tab as TabModel;
use Filament\Forms;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TabResource extends Resource
{
    protected static ?string $model = TabModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tab')
                    ->tabs([
                        Tab::make('Tab1')
                            ->schema([
                                Forms\Components\TextInput::make('name'),

                            ]),
                        Tab::make('Tab2')
                            ->schema([

                                Forms\Components\TextInput::make('slug'),
                            ]),
                        Tab::make('Tab3')
                            ->schema([

                               Livewire::make(CustomTabComponent1::class)->key('custom-1')->id('cst1')
                            ]),
                        Tab::make('Tab4')
                            ->schema([

                                Livewire::make(CustomTabComponent2::class)->key('custom-2')->id('cst2')
                            ]),
                        Tab::make('Tab5')
                            ->schema([

                                Livewire::make(CustomTabComponent3::class)->key('custom-3')->id('cst3')
                            ]),
                    ])
                    ->contained(false)
                    ->persistTabInQueryString('tab')
                    ->columnSpanFull()
                    ->id('event-tabs'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTabs::route('/'),
            'create' => Pages\CreateTab::route('/create'),
            'edit' => Pages\EditTab::route('/{record}/edit'),
        ];
    }
}
