<?php

namespace App\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RandomSpellCommand extends Command
{
    protected static $defaultName = 'app:random-spell';
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Lancez un sort au hasard!')
            ->addArgument('votre-nom', InputArgument::OPTIONAL, 'Votre nom')
            ->addOption('yell', null, InputOption::VALUE_NONE, 'Yell?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $votreNom = $input->getArgument('votre-nom');

        if ($votreNom) {
            $io->note(sprintf('Hi %s!', $votreNom));
        }

        $spells = [
                'alohomora',
                'confundo',
                'engorgio',
                'expecto patronum',
                'expelliarmus',
                'impedimenta',
                'reparo',
            ];
        $spell = $spells[array_rand($spells)];

        if ($input->getOption('yell')) {
            $spell = strtoupper($spell);
        }

        $this->logger->info('Casting spell: ' . $spell);
        $io->success($spell);

        return 0;
    }
}
