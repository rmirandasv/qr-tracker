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

    public function mount($input, $size = 300, $margin = 10, $label = 'Scan the code', $labelFontSize = 20)
    {
        $this->input = $input;
        $this->size = $size;
        $this->margin = $margin;
        $this->label = $label;
        $this->labelFontSize = $labelFontSize;
    }

    protected function buildQrCode()
    {
        $qrCode = Builder::create()
            ->writer(new PngWriter())
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

        return $qrCode->build();
    }

    public function download()
    {
        $qrName = 'qr-code-' . time() . '.png';
        $this->buildQrCode()->saveToFile(public_path($qrName));
        $this->dispatch('qr-downloaded', [
            'size' => $this->size,
            'margin' => $this->margin,
            'label' => $this->label,
            'label_size' => $this->labelFontSize,
        ]);
        return response()->download(public_path($qrName))->deleteFileAfterSend(true);
    }

    public function render()
    {
        $this->output = $this->buildQrCode()->getDataUri();
        return view('livewire.components.qr.qr-generator');
    }
}
