<?php

namespace App\Livewire\Pages\QrLinks;

use App\Livewire\Forms\QrLinkForm;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\Writer\PngWriter;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreateQrLink extends Component
{
    public QrLinkForm $form;

    public function save()
    {
        DB::beginTransaction();

        try {
            $this->form->store();

            $qr = Builder::create()
                ->writer(new PngWriter())
                ->labelText('Scan the code')
                ->labelFont(new NotoSans(10))
                ->margin(10)
                ->size(300)
                ->data(config('app.url') . '/qr/' . $this->form->qrLink->uuid)
                ->build();

            $qr->saveToFile(storage_path('app/public/qr-codes/' . $this->form->qrLink->uuid . '.png'));

            $this->form->getQrLink()->qr()->create([
                'disk' => 'public',
                'path' => 'qr-codes/' . $this->form->qrLink->uuid . '.png',
                'size' => 300,
                'margin' => 10,
                'label' => 'Scan the code',
                'label_size' => 10,
            ]);

            DB::commit();

            return redirect()->route('qr-links.edit', $this->form->qrLink->id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->addError('global', __('Something went wrong'));
        }

    }

    public function render()
    {
        return view('livewire.pages.qr-links.create-qr-link');
    }
}
