<?php

namespace App\Livewire\Components\Qr;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class QrGenerator extends Component
{
    use WithFileUploads;

    public $input;
    public $output;
    public $size = 300;
    public $margin = 10;
    public $label = 'Scan the code';
    public $labelFontSize = 20;
    public $logo;

    public function mount($input)
    {
        $this->input = $input;
    }

    public function render()
    {
        $this->output = Builder::create()
            ->writer(new SvgWriter())
            ->writerOptions([])
            ->data($this->input)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size($this->size)
            ->margin($this->margin)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText($this->label)
            ->labelFont(new NotoSans($this->labelFontSize))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
        ;

        if ($this->logo) {
            $this->output->logoPath($this->logo->getRealPath())
                ->logoResizeToWidth(50)
                ->logoResizeToHeight(50)
            ;
        }

        $this->output = $this->output->build()->getDataUri();
        return view('livewire.components.qr.qr-generator');
    }
}
