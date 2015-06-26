<?php

namespace SellerCenter\SDK\Console;

use SellerCenter\SDK\Sdk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\PropertyGenerator;

class VersionCommand extends Command
{
    /**
     * @var InputInterface
     */
    protected $input;

    /**
     * @var OutputInterface
     */
    protected $output;

    protected function configure()
    {
        $this
            ->setName('sdk:version')
            ->setDescription('Update SellerCenter SDK version numbers')
            ->addOption(
                'part',
                'p',
                InputOption::VALUE_REQUIRED,
                'Part of version to update [major,minor,patch]'
            )
            ->addOption(
                'api',
                'a',
                InputOption::VALUE_OPTIONAL,
                'Current SellerCenter API version',
                Sdk::API
            )
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

        $sdkVersion = $this->processSdkVersion();
        $apiVersion = $this->processApiVersion();

        $this->writeClassFile($sdkVersion, $apiVersion);
    }

    /**
     * @param $version
     * @param $api
     *
     * @return string
     */
    private function generateFileContent($version, $api)
    {
        $docBlock = new DocBlockGenerator(
            'SellerCenter SDK Version Class',
            'This file is auto generated, please do not edit it manually!!!'
        );

        $properties = [
            new PropertyGenerator('VERSION_NUMBER', $version, PropertyGenerator::FLAG_CONSTANT),
            new PropertyGenerator('API', $api, PropertyGenerator::FLAG_CONSTANT)
        ];

        $class = new ClassGenerator('Version', 'SellerCenter\SDK', null, null, [], $properties, [], $docBlock);

        return $class->generate();
    }

    /**
     * @return string
     */
    private function processSdkVersion()
    {
        $sdkVersion = Sdk::VERSION;
        $updateSdk = true;

        list($major, $minor, $patch) = explode('.', $sdkVersion);

        if ($this->input->getOption('part') == 'major') {
            $major++;
            $minor = 0;
            $patch = 0;
        } elseif ($this->input->getOption('part') == 'minor') {
            $minor++;
            $patch = 0;
        } elseif ($this->input->getOption('part') == 'patch') {
            $patch++;
        } else {
            $updateSdk = false;
        }

        if ($updateSdk) {
            $previousSdkVersion = $sdkVersion;
            $sdkVersion = implode('.', [$major, $minor, $patch]);

            $this->output->writeln('<info>Updating <comment>' . $this->input->getOption('part') . '</comment> SDK version</info>');
            $this->output->writeln('Previous SDK version: <comment>'.$previousSdkVersion.'</comment>');
            $this->output->writeln('Current SDK updated version: <comment>'.$sdkVersion.'</comment>');
        }

        return $sdkVersion;
    }

    /**
     * @return string
     */
    private function processApiVersion()
    {
        $apiVersion = Sdk::API;

        if ($this->input->getOption('api') !== null && $this->input->getOption('api') != $apiVersion) {
            $previousApiVersion = $apiVersion;
            $apiVersion = $this->input->getOption('api');

            $this->output->writeln('<info>Updating <comment>API</comment> version</info>');
            $this->output->writeln('Previous API version: <comment>'.$previousApiVersion.'</comment>');
            $this->output->writeln('Current API version: <comment>'.$apiVersion.'</comment>');
        }

        return $apiVersion;
    }

    private function writeClassFile($sdkVersion, $apiVersion)
    {
        if ($sdkVersion == Sdk::VERSION && $apiVersion == Sdk::API) {
            $this->output->writeln('Current SDK version: <comment>'.$sdkVersion.'</comment>');
            $this->output->writeln('Current API version: <comment>'.$apiVersion.'</comment>');
            $this->output->writeln('<info>Nothing to change</info>');
            return false;
        }

        $fileName = getcwd() . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Version.php';
        $data = '<?php' . PHP_EOL . PHP_EOL . $this->generateFileContent($sdkVersion, $apiVersion);

        if (file_put_contents($fileName, $data)) {
            $this->output->writeln('<info>Class <comment>SellerCenter\SDK\Version</comment> updated</info>');
        } else {
            $this->output->writeln('<error>Class <comment>SellerCenter\SDK\Version</comment> was not changed</error>');
        }
    }
}
