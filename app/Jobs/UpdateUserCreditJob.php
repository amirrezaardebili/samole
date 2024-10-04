<?php

namespace App\Jobs;

use App\Models\User_Attributes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateUserCreditJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public User_Attributes $model;
    public int $amount;
    public array $filters;
    public function __construct(int $amount, array $filters = [])
    {
        $this->model =new User_Attributes();
        $this->filters=$filters;
        $this->amount=$amount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->model->updateCredit($this->amount,$this->filters);
    }
}
