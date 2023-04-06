<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

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
    // $user = User::select('email')->get();
    $emails = User::pluck('email')->toArray();

    foreach ($emails as $email) {
      // how to send emails in laravel
    }
  }
}