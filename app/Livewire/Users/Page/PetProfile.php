<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use Carbon\Carbon;
use Livewire\Component;
use Crypt;
use Livewire\WithFileUploads;
use Storage;
use Str;

class PetProfile extends Component
{
    use WithFileUploads;
    public $code, $petInfo, $lat, $lng, $image;

    public $name,$species,$other,$breed,$gender,$birthday,$color,$EmergencyContact,$missing;

    protected $listeners = ['save']; 

    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->petInfo = Pet::where('pet_code', $this->code)->first();
            if (!$this->petInfo) {
                return redirect()->route('notFound.user');
            } else {
                $this->lat = $this->petInfo->pet_lat;
                $this->lng = $this->petInfo->pet_lng;
                $this->name = $this->petInfo->pet_name;
                $this->species = $this->petInfo->pet_type;
                $this->other = $this->petInfo->species_other;
                $this->breed = $this->petInfo->pet_breed;
                $this->gender = $this->petInfo->pet_gender;
                $this->birthday = Carbon::parse($this->petInfo->pet_birthday)->toDateString();
                $this->color = $this->petInfo->pet_colorMark;
                $this->EmergencyContact = $this->petInfo->emergency_contact;
                $this->missing= $this->petInfo->missing_st;

            }
        } catch (\Throwable $th) {
            return redirect()->route('notFound.user');
        }
    }

    public function updatedImage()
    {
        if (!$this->image || !in_array($this->image->getMimeType(), ['image/jpeg', 'image/png'])) {
            $this->image = null;
            $this->dispatch('False', [
                'message' => __('messages.file_type_not_supported'),
            ]);
        }
    }

    
    public function save($lat, $lng)
    {
        try {
            $this->lat = $lat; 
            $this->lng = $lng;

            if ($this->species == 'other') {
                $validate_rule = [
                    'name' => 'required',
                    'other' => 'required',
                    'species' => 'required',
                    'breed' => 'required',
                    'gender' => 'required',
                    'birthday' => 'required',
                    'color' => 'required',
                ];
            } else {
                $validate_rule = [
                    'name' => 'required',
                    'species' => 'required',
                    'breed' => 'required',
                    'gender' => 'required',
                    'birthday' => 'required',
                    'color' => 'required',
                ];
            }
            $this->validate($validate_rule, [
                'name.required' => __('messages.name.required'),
                'species.required' => __('messages.species.required'),
                'breed.required' => __('messages.breed.required'),
                'gender.required' => __('messages.gender.required'),
                'birthday.required' => __('messages.birthday.required'),
                'color.required' => __('messages.color.required'),
                'other.required' => __('messages.other.required'),
            ]);

            $data=[
                'pet_name'=>$this->name,
                'pet_type'=>$this->species,
                'species_other'=>($this->species=='other'?$this->other:null),
                'pet_breed'=>$this->breed,
                'pet_gender'=>$this->gender,
                'pet_birthday'=>$this->birthday,
                'pet_colorMark'=>$this->color,
                'pet_lat'=>$this->lat,
                'pet_lng'=>$this->lng,
                'emergency_contact'=>$this->EmergencyContact,
                'missing_st'=>$this->missing,
            ];

            if($this->image){
                $fileName = time() . '_' . Str::random(20) . '.png';
                $path = $this->image->storeAs('ProfileImage/Pets', $fileName, 'public');
                Storage::disk('public')->delete('ProfileImage/Pets/' . $this->petInfo->pet_image);
                $data['pet_image']=$fileName;
            }

            Pet::where('pet_code', $this->code)->update($data);

            return redirect(url()->previous())->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.pet-profile');
    }
}
