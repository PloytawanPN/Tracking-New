<?php

namespace App\Livewire\Pets;

use Crypt;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Str;


class FirstRegster extends Component
{
    use WithFileUploads;

    public $image;
    public $species, $name, $breed, $gender, $birthday, $color, $lat = null, $lng = null, $other;
    public $old_image;

    public $image_owner, $HAccount;
    protected $listeners = ['next_to_step2'];

    public function mount()
    {
        $checkCode = Session::get('pet-code');
        if(!$checkCode){
            return redirect()->route('error_code');
        }

        $oldData = Session::get('RegisterPet_1');
        if (Session::get('RegisterPet_1')) {
            $this->old_image = $oldData['pet_image'];
            $this->name = $oldData['pet_name'];
            $this->species = $oldData['pet_species'];
            $this->other = $oldData['species_other'];
            $this->breed = $oldData['pet_breed'];
            $this->gender = $oldData['pet_gender'];
            $this->birthday = $oldData['pet_birthday'];
            $this->color = $oldData['pet_color'];
            $this->lat = $oldData['lat'];
            $this->lng = $oldData['lng'];
            $oldSession = Session::get('RegisterPet_1');
            $oldSession['status'] = false;
            Session::put('RegisterPet_1', $oldSession);
        }
    }

    public function next_to_step2($lat, $lng)
    {
        try {
            $this->lat = $lat;
            $this->lng = $lng;

            if ($this->image == null && $this->old_image == null) {
                $this->validate(
                    [
                        'image' => 'required',
                    ],
                    [
                        'image.required' => __('messages.image.required'),
                    ]
                );
            }

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
                'image.required' => __('messages.image.required'),
                'name.required' => __('messages.name.required'),
                'species.required' => __('messages.species.required'),
                'breed.required' => __('messages.breed.required'),
                'gender.required' => __('messages.gender.required'),
                'birthday.required' => __('messages.birthday.required'),
                'color.required' => __('messages.color.required'),
                'other.required' => __('messages.other.required'),
            ]);

            if (!$this->image && $this->old_image) {
                $fileName = $this->old_image;
            } else {
                $code = Crypt::decryptString(Session::get('pet-code'));
                $fileName = $code.'_'.time() . '_' . Str::random(20) . '.png';
                $path = $this->image->storeAs('petsProfile', $fileName, 'public');
            }

            Session::put(
                'RegisterPet_1',
                [
                    'pet_image' => $fileName,
                    'pet_name' => $this->name,
                    'pet_species' => $this->species,
                    'species_other' => $this->other,
                    'pet_breed' => $this->breed,
                    'pet_gender' => $this->gender,
                    'pet_birthday' => $this->birthday,
                    'pet_color' => $this->color,
                    'lat' => $this->lat,
                    'lng' => $this->lng,
                    'status' => true,
                ]

            );

            return redirect()->route('register.pet.2');
        } catch (\Throwable $th) {
            $this->dispatch('stepFalse', [
                'message' => $th->getMessage(),
            ]);
        }


    }

    public function render()
    {

        return view('livewire.pets.first-regster');
    }
}
