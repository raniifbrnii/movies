<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class DebugDBCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug database schema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $columns = Schema::getColumnListing('movies');
        $this->info('Columns in movies table:');
        $this->line(implode(', ', $columns));
    }
}
