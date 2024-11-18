<?php

namespace App\Livewire\Users\Page;

use App\Models\CardStyle;
use Crypt;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;
use Storage;
use Str;

class StyleSetting extends Component
{
    use WithFileUploads;

    public $color_header = '#cfcfcf', $color_button = '#cfcfcf', $image_card, $image_bg,$clear_c=false,$clear_bg=false;

    public $header = null, $button = null, $code, $card_style,$encode;

    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->encode =$code;
            $this->card_style = CardStyle::where('pet_code', $this->code)->first();
            if ($this->card_style == null) {
                $this->header = "green";
                $this->button = "green";
                $this->image_card = null;
                $this->image_bg = null;
            } else {
                $this->header = $this->card_style->header_color;
                $this->button = $this->card_style->button_color;
                if ($this->card_style->header_color == 'custom') {
                    $this->color_header = $this->card_style->h_colorcode;
                }
                if ($this->card_style->button_color == 'custom') {
                    $this->color_button = $this->card_style->b_colorcode;
                }
            }

        } catch (\Throwable $th) {
            return redirect()->route('notFound.user');
        }

    }

    public function updatedImageCard()
    {
        if (!$this->image_card || !in_array($this->image_card->getMimeType(), ['image/jpeg', 'image/png'])) {
            $this->image_card = null;
            $this->dispatch('False', [
                'message' => __('messages.file_type_not_supported'),
            ]);
        }
        $this->clear_c=false;
    }
    public function updatedImageBg()
    {
        if (!$this->image_bg || !in_array($this->image_bg->getMimeType(), ['image/jpeg', 'image/png'])) {
            $this->image_bg = null;
            $this->dispatch('False', [
                'message' => __('messages.file_type_not_supported'),
            ]);
        }
        $this->clear_bg =false;
    }

    public function clearcard()
    {
        $this->image_card = 'empty';
        $this->clear_c =true;
    }
    public function clearbg()
    {
        $this->image_bg = 'empty';
        $this->clear_bg =true;
    }
    public function updatedSelectedColor($value)
    {
        $this->color = $value;
    }

    public function save()
    {
        if ($this->header == 'green') {
            $h_color = 'linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12)';
        } elseif ($this->header == 'pink') {
            $h_color = 'linear-gradient(45deg, #686FFF, #F7ACFF)';
        } elseif ($this->header == 'orage') {
            $h_color = 'linear-gradient(45deg, #FF1178, #F89928)';
        } else {
            $h_color = $this->color_header;
        }
        if ($this->button == 'green') {
            $b_color = 'linear-gradient(45deg, #004D7A, #008793, #00BF72, #ABEB12)';
        } elseif ($this->button == 'pink') {
            $b_color = 'linear-gradient(45deg, #686FFF, #F7ACFF)';
        } elseif ($this->button == 'orage') {
            $b_color = 'linear-gradient(45deg, #FF1178, #F89928)';
        } else {
            $b_color = $this->color_button;
        }

        if ($this->image_card) {
            $folderPath = 'style/card';
            $files = Storage::disk('public')->files($folderPath);
            foreach ($files as $file) {
                if (strpos(basename($file), $this->code) === 0) {
                    Storage::disk('public')->delete($file);
                }
            }

            $fileNameCard = $this->code . '_' . now()->format('Ymd_His') . '_' . Str::random(10) . '.' . '.png';
            $imagePath = $this->image_card->storeAs('style/card', $fileNameCard, 'public');
        }

        if ($this->image_bg) {
            $folderPath = 'style/bg';
            $files = Storage::disk('public')->files($folderPath);
            foreach ($files as $file) {
                if (strpos(basename($file), $this->code) === 0) {
                    Storage::disk('public')->delete($file);
                }
            }

            $fileNameBg = $this->code . '_' . now()->format('Ymd_His') . '_' . Str::random(10) . '.' . '.png';
            $imagePath = $this->image_bg->storeAs('style/bg', $fileNameBg, 'public');
        }

        if ($this->card_style == null) {
            $cardStyle = CardStyle::create([
                'pet_code' => $this->code,
                'header_color' => $this->header,
                'h_colorcode' => $h_color,
                'button_color' => $this->button,
                'b_colorcode' => $b_color,
                'card_image' => $this->image_card ? $fileNameCard : null,
                'bg_image' => $this->image_bg ? $fileNameBg : null,
            ]);
        } else {
            $data = [
                'header_color' => $this->header,
                'h_colorcode' => $h_color,
                'button_color' => $this->button,
                'b_colorcode' => $b_color,
            ];
            if($this->image_card){
                $data['card_image'] = $this->image_card ? $fileNameCard : null;
            }
            if($this->image_bg){
                $data['bg_image'] = $this->image_bg ? $fileNameBg : null;
            }
            $cardStyle = CardStyle::where('pet_code', $this->code)->update($data);
        }
        
        return redirect()->route('StyleSetting.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
    }
    public function render()
    {
        return view('livewire.users.page.style-setting');
    }
}
