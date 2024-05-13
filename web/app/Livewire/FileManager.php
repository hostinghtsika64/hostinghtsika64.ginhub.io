<?php

namespace App\Livewire;

use App\Models\Domain;
use App\Models\HostingSubscription;
use Illuminate\Support\Str;
use Livewire\Component;

class FileManager extends Component
{
    public $hostingSubscriptionId;

    public $hostingSubscriptionSystemUsername;

    public $domainHomeRoot;

    public $currentRealPath;

    public $currentPath;

    public function mount($hostingSubscriptionId)
    {
        $this->hostingSubscriptionId = $hostingSubscriptionId;

        $findHostingSubscription = HostingSubscription::where('id', $this->hostingSubscriptionId)->first();
        $findDomain = Domain::where('hosting_subscription_id', $this->hostingSubscriptionId)
            ->where('is_main', 1)
            ->first();

        if (!$findHostingSubscription || !$findDomain) {
            throw new \Exception('Hosting subscription not found');
        }

        $this->hostingSubscriptionSystemUsername = $findHostingSubscription->system_username;
        $this->domainHomeRoot = $findDomain->home_root;

    }

    public function goto($dirOrFile)
    {
        $newPath = $this->currentRealPath . '/' . $dirOrFile;
        if (is_dir($newPath)) {
            $this->currentRealPath = $newPath;
        }

    }

    public function back()
    {
        $newRealPath = dirname($this->currentRealPath);

        if (Str::startsWith($newRealPath, $this->domainHomeRoot)) {
            $this->currentRealPath = $newRealPath;
        }
    }

    public function canIAccess($realPath, $systemUsername)
    {
        $checkOwner = posix_getpwuid(fileowner($realPath));

        if (isset($checkOwner['name']) && $checkOwner['name'] == $systemUsername) {
            return true;
        }

        return false;

    }

    public function render()
    {
        if (!$this->currentRealPath) {
            $this->currentRealPath = $this->domainHomeRoot;
        }

        $all = [];
        $files = [];
        $folders = [];
        if ($this->currentRealPath) {

            $scanFiles = scandir($this->currentRealPath);
            foreach ($scanFiles as $scanFile) {
                if ($scanFile == '.' || $scanFile == '..') {
                    continue;
                }
                try {
                    $append = [
                        'extension' => pathinfo($scanFile, PATHINFO_EXTENSION),
                        'name' => $scanFile,
                        'path' => $this->currentRealPath . '/' . $scanFile,
                        'is_dir' => is_dir($this->currentRealPath . '/' . $scanFile),
                        'permission' => substr(sprintf('%o', fileperms($this->currentRealPath . '/' . $scanFile)), -4),
                        'owner' => posix_getpwuid(fileowner($this->currentRealPath . '/' . $scanFile))['name'],
                        'group' => posix_getgrgid(filegroup($this->currentRealPath . '/' . $scanFile))['name'],
                        'size' => filesize($this->currentRealPath . '/' . $scanFile),
                        'last_modified' => filemtime($this->currentRealPath . '/' . $scanFile),
                        'type' => filetype($this->currentRealPath . '/' . $scanFile),
                    ];
                    if ($append['is_dir']) {
                        $folders[] = $append;
                    } else {
                        $files[] = $append;
                    }
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        $all = array_merge($folders, $files);

        return view('livewire.file-manager.index', [
            'files'=>$all
        ]);
    }
}
