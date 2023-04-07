<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'app:expiration';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'expire the users every 5 minute automatically';

  /**
   * Execute the console command.
   */
  public function handle(): void
  {
    $users = User::where('expire', 1)->get();
    foreach ($users as $user) {
      $user->update(['expire' => 0]);
    }
  }
}