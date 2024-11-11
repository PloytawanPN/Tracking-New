<?php

namespace App\Livewire\Users\Page;

use App\Models\Owner;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Str;

class Profile extends Component
{
    use WithFileUploads;
    public $users, $image_owner;

    public $email, $fullname, $nickname, $phone, $address, $ownerID;

    public $email_st,$fullname_st,$nickname_st,$phone_st,$image_st;

    public function mount()
    {
        $this->ownerID = Crypt::decrypt(Session::get('ownerID'));
        $this->users = Owner::where('id', $this->ownerID)->first();
        $this->email = $this->users->email;
        $this->fullname = $this->users->fullname;
        $this->nickname = $this->users->nickname;
        $this->phone = $this->users->contact;
        $this->address = $this->users->address;

        $this->email_st = $this->users->email_show_st;
        $this->fullname_st = $this->users->fullname_show_st;
        $this->nickname_st = $this->users->nickname_show_st;
        $this->phone_st = $this->users->contact_show_st;
        $this->image_st = $this->users->owner_image_show_st;
    }

    public function updatedImageOwner()
    {
        if (!$this->image_owner || !in_array($this->image_owner->getMimeType(), ['image/jpeg', 'image/png'])) {
            $this->image_owner=null;
            $this->dispatch('False', [
                'message' => __('messages.file_type_not_supported'),
            ]);
        }
    }
    public function save()
    {
        try {
            $this->validate([
                'email' => 'required|email|unique:owners,email,' . $this->ownerID,
                'fullname' => 'required|string',
                'nickname' => 'required|string',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
                'address' => 'required',
            ], [
                'email.required' => __('messages.user_email.required'),
                'email.email' => __('messages.user_email.email'),
                'email.unique' => __('messages.email.unique'),
                'fullname.required' => __('messages.user_fullname.required'),
                'fullname.string' => __('messages.user_fullname.string'),
                'nickname.required' => __('messages.user_nickname.required'),
                'nickname.string' => __('messages.user_nickname.string'),
                'phone.required' => __('messages.user_phoneNumber.required'),
                'phone.regex' => __('messages.user_phoneNumber.regex'),
                'phone.min' => __('messages.user_phoneNumber.min'),
                'phone.max' => __('messages.user_phoneNumber.max'),
                'address.required' => __('messages.user_address.required'),
            ]);
            $data = [
                'email' => $this->email,
                'fullname' => $this->fullname,
                'nickname' => $this->nickname,
                'contact' => $this->phone,
                'address' => $this->address,
                'email_show_st'=>$this->email_st,
                'fullname_show_st'=>$this->fullname_st,
                'nickname_show_st'=>$this->nickname_st,
                'contact_show_st'=>$this->phone_st,
                'owner_image_show_st'=>$this->image_st,
            ];
            if ($this->image_owner) {
                $fileName = time() . '_' . Str::random(20) . '.png';
                $path = $this->image_owner->storeAs('ProfileImage/Owns', $fileName, 'public');
                Storage::disk('public')->delete('ProfileImage/Owns/' . $this->users->owner_image);
                $data['owner_image'] = $fileName;
            }

            Owner::where('id', $this->ownerID)->update($data);

            return redirect()->route('profile.user')->with('success', __('messages.operation_success'));

        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.profile');
    }
}
