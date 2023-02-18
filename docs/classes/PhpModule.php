<?php

class PhpModule
{
    public function __construct(private string $folder)
    {
    }

    public function existsAction(string $action): bool
    {
        return file_exists($this->getActionPath($action));
    }

    public function execute(string $action, array $params = []): mixed
    {
        if ($this->existsAction($action)) {
            throw new LogicException('');
        }

        return require $this->getActionPath($action);
    }

    private function getActionPath(string $action): string
    {
        return $this->folder . DIRECTORY_SEPARATOR . $action;
    }
}
