<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Jobs\Workspaces\CreateDefaultChannels;
use App\Livewire\Concerns\HasUser;
use App\Models\Workspace;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;

/**
 * @property-read Form $form
 */
final class OnboardingForm extends Component implements HasForms
{
    use HasUser;
    use InteractsWithForms;

    public array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make(name: 'name')->label(label: 'Workspace Name')->string()->required()->maxLength(255),
            TextInput::make(name: 'description')->label(label: 'Workspace Description')->string()->maxLength(255),
        ])->statePath(
            path: 'data',
        );
    }

    public function submit(): void
    {
        /** @var Workspace $workspace */
        $workspace = $this->user()->workspaces()->create(
            attributes: $this->form->getState(),
        );

        $this->user()->update(
            attributes: [
                'onboarded' => true,
                'current_workspace_id' => $workspace->id,
            ],
        );

        Bus::dispatchSync(
            command: new CreateDefaultChannels(
                workspace: $workspace,
            ),
        );

        $this->redirect(
            url: route('pages:channels:show', 'general'),
        );
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.auth.onboarding-form',
        );
    }
}
