<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class GetPersonalDataCommand extends Command
{
  protected function configure()
  {
    $this->setName('get_personal_data')->setDescription('Modified input string');
    // ->addArgument('string', InputArgument::REQUIRED, 'String');;
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {

    $helper = $this->getHelper('question');

    $question1 = new Question('Введите Ваше имя: ', 'AcmeDemoBundle');
    $question2 = new Question('Введите Ваш возраст: ', 'AcmeDemoBundle');

    $question3 = new ChoiceQuestion(
      'Ваш пол (м): ',
      ['м', 'ж'],
      0
    );
    $question3->setErrorMessage('Недопустимый пол');

    $name = $helper->ask($input, $output, $question1);
    $age = $helper->ask($input, $output, $question2);
    $gender = $helper->ask($input, $output, $question3);

    $output->writeln('Здравствуйте, ' . sprintf($name) . '. Ваш возраст: ' . sprintf($age) . ' Ваш пол: ' . $gender);

    return Command::SUCCESS;
  }
}
