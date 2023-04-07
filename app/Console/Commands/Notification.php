<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notification extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:notification';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Send email notify for users every minute';

  /**
   * Execute the console command.
   */
  public function handle(): void
  {
    // $data = ['title' => 'send email', 'type' => 'hadra 9as7a'];
    // $user = User::select('email')->get();
    $emails = User::pluck('email')->toArray();
    foreach ($emails as $email) {
      Mail::to($email)->send(new NotifyEmail());
    }
  }
}