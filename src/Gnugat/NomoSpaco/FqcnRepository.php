<?php

namespace Gnugat\NomoSpaco;

use Gnugat\NomoSpaco\File\FileRepository;
use Gnugat\NomoSpaco\Token\FqcnCollection;
use Gnugat\NomoSpaco\Token\ParserFactory;

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
     * @var ParserFactory
     */
    private $parserFactory;

    /**
     * @param FileRepository $fileRepository
     * @param ParserFactory  $parserFactory
     *
     * @deprecated 0.4 ParserFactory becomes mandatory
     */
    public function __construct(FileRepository $fileRepository, ParserFactory $parserFactory = null)
    {
        $this->fileRepository = $fileRepository;
        $this->parserFactory = $parserFactory ?: new ParserFactory();
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
        $fqcnCollection = new FqcnCollection();
        $allParser = $this->parserFactory->makeAll($fqcnCollection);
        foreach ($files as $file) {
            $content = $file->getContent();
            $allParser->parse($content);
        }

        return $fqcnCollection->all();
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
        $fqcnCollection = new FqcnCollection();
        $forParser = $this->parserFactory->makeFor($fqcnCollection, $classname);
        foreach ($files as $file) {
            $content = $file->getContent();
            $forParser->parse($content);
        }

        return $fqcnCollection->all();
    }
}
