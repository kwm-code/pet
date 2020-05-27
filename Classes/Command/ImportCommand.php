<?php
declare(strict_types=1);

namespace GeorgRinger\Pet\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ImportCommand extends Command
{
    protected function configure()
    {
        $this->setDescription('Import pets')
//            ->addArgument('type', InputArgument::REQUIRED, 'Type')
            ->addArgument('file', InputArgument::REQUIRED, 'Path to import file')
            ->addArgument('pageId', InputArgument::OPTIONAL, 'Page Id', 123);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $file = PATH_site . $input->getArgument('file') ?? '';
        $pageId = $input->getArgument('pageId') ?? 0;

//         possible type to check
//        $type = $input->getArgument('type') ?? '';

        $this->importPet($file, $io, $pageId);
    }

    /**
     * @param $file
     * @param int $pageId
     * @return array
     */
    protected function import($file, $pageId = 0): array
    {
        $count = [
            'update' => 0,
            'insert' => 0,
        ];
        $content = file_get_contents($file);
        $importData = json_decode($content, true);

        $petTypes = $this->getIdOfType();

        $tableName = 'tx_pet_domain_model_pet';
        $connection = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($tableName);
        foreach ($importData as $item) {
            $existingRow = BackendUtility::getRecord($tableName, $item['id']);
            if ($existingRow) {
                $update = [
                    'pid' => $pageId,
                    'name' => $item['name'],
                    'weight' => $item['weight'],
                    'cuteness' => $item['cuteness'],
                    'pet_type' => $petTypes[$item['type']] ?? 0
                ];
                $connection->update($tableName, $update, ['uid' => $item['id']]);
                $count['update']++;
            } else {
                $insert = [
                    'uid' => $item['id'],
                    'pid' => $pageId,
                    'name' => $item['name'],
                    'weight' => $item['weight'],
                    'cuteness' => $item['cuteness'],
                    'pet_type' => $petTypes[$item['type']] ?? 0
                ];
                $connection->insert($tableName, $insert);
                $count['insert']++;
            }
        }

        return $count;
    }

    protected function getIdOfType(): array
    {
        $tableName = 'tx_pet_domain_model_pettype';
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($tableName);

        $rows = $queryBuilder->select('uid', 'name')
            ->from($tableName)
            ->execute()
            ->fetchAll();


        $simple = [];
        foreach ($rows as $row) {
            $simple[$row['name']] = $row['uid'];
        }

        return $simple;
    }

    /**
     * @param string $file
     * @param SymfonyStyle $io
     * @param $pageId
     */
    protected function importPet(string $file, SymfonyStyle $io, $pageId): void
    {
        if (is_file($file)) {
            $io->title('Import von ' . $file . ' in Seite ' . $pageId);

            $count = $this->import($file, $pageId);
            $io->success(sprintf('Import von Tieren: %s neu, %s aktualisiert', $count['insert'], $count['update']));
        } else {
            $io->error(sprintf('Datei %s nicht gefunden', $file));
        }
    }


}
