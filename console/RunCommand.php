<?php namespace alekseypavlov\chat\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use LeoCavalcante\WebSockets\Classes\ServerFactory;

class RunCommand extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'chat-server:run';

    /**
     * @var string The console command description.
     */
    protected $description = 'Runs the WebSocket server.';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $port = $this->option('port');
        $this->info("Server listening on $port");
        ServerFactory::create($port)->run();
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['port', null, InputOption::VALUE_OPTIONAL, 'WS server port.', 8080],
        ];
    }

}
