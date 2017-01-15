<?php

namespace Foggyline\Console\Command;

use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Output\OutputInterface
};

class CustomerExportCommand extends Command
{
    protected function configure()
    {
        $this->setName('customer:export')
            ->setDescription('Exports one or more customers.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Fake data source
        $customers = [
            ['John Doe', 'john.doe@mail.loc', '1983-01-16'],
            ['Samantha Smith', 'samantha.smith@mail.loc', '1986-10-23'],
            ['Robert Black', 'robert.black@mail.loc', '1978-11-18'],
        ];

        // Progress Bar Helper
        $progress = new \Symfony\Component\Console\Helper\ProgressBar($output, count($customers));

        $progress->start();

        for ($i = 1; $i <= count($customers); $i++) {
            sleep(5);
            $progress->advance();
        }

        $progress->finish();

        // Table Helper
        $table = new \Symfony\Component\Console\Helper\Table($output);
        $table->setHeaders(['Name', 'Email', 'DON'])
            ->setRows($customers)
            ->render();
    }
}