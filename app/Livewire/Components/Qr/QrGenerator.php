<?php

namespace App\Livewire\Components\Qr;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Livewire\Component;

class QrGenerator extends Component
{
    public $input;
    public $output;

    public function mount($input)
    {
        $this->input = $input;
    }

    public function render()
    {
        $options = new QROptions([
            'version' => 5,
            'outputType' => QRCode::OUTPUT_MARKUP_SVG,
            'eccLevel' => QRCode::ECC_L,
            'bgColor' => '#000000',
            'quietzoneSize' => 4,
        ]);
        $this->output = (new QRCode($options))->render($this->input);

        return view('livewire.components.qr.qr-generator');
    }
}
