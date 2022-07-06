<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;


class ShowStringCommand extends Command
{
  protected function configure()
  {
    $this->setName('show_string')->setDescription('Show input string repeatedly')
    ->addArgument('string', InputArgument::REQUIRED, 'String')
    ->addArgument('times', InputArgument::OPTIONAL, 'Times');
  }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
      $times = $input->getArgument('times') ? (int) $input->getArgument('times') : 2;

      for ($i = 0; $i < $times; $i++) {
        $output->writeln(sprintf($input->getArgument('string')));
      }
     
      return Command::SUCCESS;
    }

}