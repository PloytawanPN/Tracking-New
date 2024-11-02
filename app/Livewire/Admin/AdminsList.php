<?php

namespace App\Livewire\Admin;

use Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class AdminsList extends Component
{
    use WithPagination;
    public $email, $password,$search,$password_change,$email_change;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->search = null;
    }

    public function delete($userId){
        User::destroy($userId);
    }

    public function create()
    {
        try {
            $this->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
            $user = new User();
            $user->name = 'admin';
            $user->email = $this->email;
            $user->password = Hash::make($this->password);

            $user->save();

            $this->dispatch('AdminCreated', [
                'message' => 'New Account created successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('AdminFalse', [
                'message' => $th->getMessage(),
            ]);
        }

    }
    public function render()
    {
        $query = User::orderBy('id');
        if ($this->search) {
            $query->where('email', 'like', '%' . $this->search . '%');
        }
        $datalist = $query->paginate(15);



        return view('livewire.admin.admins-list', [
            'datalist' => $datalist
        ]);

    }
}
