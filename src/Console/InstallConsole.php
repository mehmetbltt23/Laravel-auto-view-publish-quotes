<?php

namespace Quotes\Console;

use Illuminate\Console\Command;

class InstallConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quotes:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the commands install quotes';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'quotes-config']);
    }
}
