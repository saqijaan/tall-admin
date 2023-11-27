<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Form;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class ResetForm extends Form
{
    public string $token = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function rules(): array
    {
        return [
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function resetPassword()
    {
        $this->validate();

        $user = User::findByResetPasswordToken($this->token);

        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($this->password),
        ]);
    }
}
