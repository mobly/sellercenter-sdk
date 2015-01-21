<?php

namespace SellerCenter\SDK\Console;

use SellerCenter\SDK\Sdk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\PropertyGenerator;

class VersionCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('sdk:version')
            ->setDescription('Update SDK version number')
            ->addArgument(
                'update',
                InputArgument::OPTIONAL,
                'What kind of version do you want to update? [major,minor,patch]'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $currentVersion = Sdk::VERSION;

        list($major, $minor, $patch) = explode('.', $currentVersion);

        // add this to retrieve tag details from git command: git describe --abbrev=4 --dirty --always --tags
        // list($patch, $pendingCommits, $lastCommit, $dirty) = explode('-', $patch);

        if ($input->getArgument('update') == 'major') {
            $major++;
            $minor = 0;
            $patch = 0;
        } elseif ($input->getArgument('update') == 'minor') {
            $minor++;
            $patch = 0;
        } elseif ($input->getArgument('update') == 'patch') {
            $patch++;
        }
        $finalVersion = implode('.', [$major, $minor, $patch]);

        $output->writeln('<info>Updating <comment>' . $input->getArgument('update') . '</comment> version</info>');
        $output->writeln('Previous version: <comment>'.$currentVersion.'</comment>');
        $output->writeln('Next version: <comment>'.$finalVersion.'</comment>');

        $bytes = file_put_contents(
            getcwd() . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Version.php',
            '<?php' . PHP_EOL . PHP_EOL . $this->generateFileContent($finalVersion)
        );
        if ($bytes) {
            $output->writeln('<info>Class <comment>SellerCenter\SDK\Version</comment> updated</info>');
        }
    }

    /**
     * @param $version
     *
     * @return string
     */
    protected function generateFileContent($version)
    {
        $docBlock = new DocBlockGenerator(
            'SellerCenter SDK Version Class',
            'This file is auto generated, please do not edit it manually!!!'
        );
        $property = new PropertyGenerator('VERSION_NUMBER', $version, PropertyGenerator::FLAG_CONSTANT);
        $class = new ClassGenerator('Version', 'SellerCenter\SDK', null, null, [], [$property], [], $docBlock);

        return $class->generate();
    }
}
