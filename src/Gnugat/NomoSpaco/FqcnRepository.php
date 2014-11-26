<?php

namespace Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\Fqcn\FqcnFactory;
use Exception;
use ReflectionClass;

/**
 * Retrieves a list of fully qualified classnames.
 *
 * @api
 */
class FqcnRepository
{
    /**
     * @var FileRepository
     */
    private $fileRepository;

    /**
     * @param FileRepository $fileRepository
     *
     * @api
     */
    public function __construct(FileRepository $fileRepository, FqcnFactory $fqcnFactory)
    {
        $this->fileRepository = $fileRepository;
        $this->fqcnFactory = $fqcnFactory;
    }

    /**
     * @param string $projectRoot
     *
     * @return array
     *
     * @api
     */
    public function findIn($projectRoot)
    {
        $files = $this->fileRepository->findPhp($projectRoot);
        $projectFqcns = $this->fqcnFactory->makeFromFiles($files);
        $loadedFqcns = $this->fqcnFactory->makeFromLoaded();
        $duplicatedFqcns = array_merge($projectFqcns, $loadedFqcns);
        $unindexedFqcns = array_unique($duplicatedFqcns);
        $fqcns = array_values($unindexedFqcns);

        return $fqcns;
    }

    /**
     * @param string $projectRoot
     * @param string $classname
     *
     * @return array
     *
     * @api
     */
    public function findInFor($projectRoot, $classname)
    {
        $files = $this->fileRepository->findPhp($projectRoot);
        $projectFqcns = $this->fqcnFactory->makeFromFilesFor($files, $classname);
        $loadedFqcns = $this->fqcnFactory->makeFromLoadedFor($classname);
        $duplicatedFqcns = array_merge($projectFqcns, $loadedFqcns);
        $unindexedFqcns = array_unique($duplicatedFqcns);
        $fqcns = array_values($unindexedFqcns);

        return $fqcns;
    }
}
