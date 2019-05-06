<?php

namespace App\Console\Commands;

use App\User;
use Artisan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cosst:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the installation process for COSST';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Running this installer will drop all tables in the configured database'
            . ' effectively starting the database from scratch. Do you wish to continue?')) {

            try {
                Artisan::call('key:generate');
                Artisan::call('migrate:fresh');
            } catch (\Exception $e) {
                $this->error('Something went wrong whilst running the migration. Please contact Support.');
            }

            $this->line('- Created Database Tables / Default Data');
            $this->line('- Requesting initial Administrator details...');

            $data['name'] = $this->ask('What is your name?');
            $data['email'] = $this->ask('What is your email address?');
            $data['password'] = $this->secret('Type a password:');
            $data['confirm_password'] = $this->secret('Confirm your password:');
            $data['role'] = 'admin';

            if ($data['password'] === $data['confirm_password']) {
                try {
                    unset($data['confirm_password']);
                    $data['password'] = Hash::make($data['password']);

                    $user = User::create($data);
                    $user->email_verified_at = date('Y-m-d H:i:s');
                    $user->save();

                    $this->info('The installation has been completed.');
                } catch(\Exception $e) {
                    $this->error('Unable to create the Administrator user. Please contact Support.');
                }
            } else {
                $this->error('Your passwords did not match. Exiting the installer. '
                    . 'Please run the installer again.');
            }
        } else {
            $this->error('The installation has been cancelled.');
        }
    }
}
