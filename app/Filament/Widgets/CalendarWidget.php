<?php

namespace App\Filament\Widgets;
 
use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Saade\FilamentFullCalendar\Actions;
// use Saade\FilamentFullCalendar\Data\EventData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
 
class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Task::class;
 

    public function fetchEvents(array $fetchInfo): array
    {
        return Task::query()
            ->where('Start', '>=', $fetchInfo['start'])
            ->where('End', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Task $event) => [
                    'Title' => $event->title,
                    'Descriptions' => $event->desc,
                    'Start' => $event->start,
                    'End' => $event->end,
                ]
            )
            ->all();
    }

    protected function headerActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function modalActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    // protected function viewAction(): Action
    // {
    //     return Actions\ViewAction::make();
    // }    
   
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('Title'),
            Forms\Components\Textarea::make('Descriptions'),
            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\DateTimePicker::make('Start'),
                    Forms\Components\DateTimePicker::make('Ends'),
                ]),
        ];
    }

 
    public static function canView(): bool
    {
        return false;
    }
}