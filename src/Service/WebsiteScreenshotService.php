<?php

namespace App\Service;

use App\Entity\Website;
use Spatie\Browsershot\Browsershot;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\String\Slugger\SluggerInterface;

class WebsiteScreenshotService
{
    public function __construct(
        private string $projectDir,
        private SluggerInterface $slugger,
    ) {
    }

    public function capture(Website $website): string
    {
        $filesystem = new Filesystem();

        $directory = $this->projectDir . '/public/uploads/website-screenshots';
        $filesystem->mkdir($directory);

        $filename = sprintf(
            '%s-%s.jpg',
            $website->getId(),
            strtolower($this->slugger->slug($website->getName()))
        );

        $absolutePath = $directory . '/' . $filename;

        Browsershot::url($website->getUrl())
            ->setChromePath('/usr/bin/chromium')
            ->noSandbox()
            ->windowSize(1440, 1000)
            ->waitUntilNetworkIdle()
            ->setScreenshotType('jpeg', 85)
            ->save($absolutePath);

        return '/uploads/website-screenshots/' . $filename;
    }
}